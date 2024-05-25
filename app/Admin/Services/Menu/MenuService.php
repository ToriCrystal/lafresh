<?php

namespace App\Admin\Services\Menu;

use App\Admin\Services\Menu\MenuServiceInterface;
use App\Admin\Repositories\Menu\MenuRepositoryInterface;
use App\Admin\Repositories\Menu\MenuItemRepositoryInterface;
use App\Admin\Repositories\Menu\MenuLocationRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MenuService implements MenuServiceInterface
{

    protected $repository;
    protected $repoMenuItem;
    protected $repoMenuLocation;

    public function __construct(
        MenuRepositoryInterface $repository,
        MenuItemRepositoryInterface $repoMenuItem,
        MenuLocationRepositoryInterface $repoMenuLocation
    ) {
        $this->repository = $repository;
        $this->repoMenuItem = $repoMenuItem;
        $this->repoMenuLocation = $repoMenuLocation;
    }

    public function store(Request $request)
    {

        $data = $request->validated();

        return $this->repository->create($data);
    }

    public function update(Request $request)
    {

        $data = $request->validated();
        $data['locations'] = $data['locations'] ?? [];
        $collect_menu_items = collect(json_decode($data['json_menu_items'], true));
        $newIds = [];

        DB::beginTransaction();
        try {

            $menu = $this->repository->update($data['menu']['id'], $data['menu'])->load(['locations']);

            if ($menu->locations) {

                foreach ($menu->locations as $key => $item) {

                    if (in_array($item->location, $data['locations'])) {

                        unset($data['locations'][$key]);
                    } else {
                        $item->delete();
                    }
                }
            }

            if (!empty($data['locations'])) {

                foreach ($data['locations'] as $location) {

                    $this->repoMenuLocation->updateOrCreate(['location' => $location], [
                        'menu_id' => $menu->id,
                        'name' => config('custom.menu.locations.' . $location)
                    ]);
                }
            }

            if (isset($data['reference_id']) && !empty($data['reference_id'])) {

                $this->repoMenuItem->deleteBy(['menu_id' => $menu->id, ['id', 'not_in', array_keys($data['reference_id'])]]);

                foreach ($data['reference_id'] as $key => $value) {
                    if (gettype($key) == 'string') {
                        $newItems = $menu->items()->create([
                            'reference_id' => $value,
                            'reference_type' => $data['reference_type'][$key],
                            'url' => $data['url'][$key] ?? null,
                            'title' => $data['title'][$key]
                        ]);
                        $newIds[$key] = $newItems->id;
                    }
                }
            }
            $collect_menu_items = $collect_menu_items->map(function ($item, $key) use ($newIds, $data) {

                if (in_array($item['id'], array_keys($data['reference_id'])) || gettype($item['id']) == 'string') {

                    $dataMenuItem['id'] = $newIds[$item['id']] ?? $item['id'];
                    $dataMenuItem['parent_id'] = $newIds[$item['parent_id']] ?? $item['parent_id'];
                    $dataMenuItem['position'] = $key;
                    $dataMenuItem['_lft'] = $item['lft'];
                    $dataMenuItem['_rgt'] = $item['rgt'];

                    if (gettype($item['id']) == 'integer') {

                        $dataMenuItem['title'] = $data['title'][$item['id']];

                        if ($data['reference_type'][$item['id']] == null) {

                            $dataMenuItem['url'] = $data['url'][$item['id']];
                        }
                    }
                    $this->repoMenuItem->update($dataMenuItem['id'], $dataMenuItem);
                }
                // return $dataMenuItem;
            });

            DB::commit();

            return $menu;
        } catch (\Throwable $th) {
            DB::rollBack();
            throw $th;
            return false;
        }
    }

    public function delete($id)
    {
        return $this->repository->delete($id);
    }
}
