<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Menu;
use App\Models\MenuItem;
use App\Models\MenuLocation;
use App\Enums\DefaultStatus;

class MenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $mainMenu = Menu::create([
            'name' => 'Trang chủ',
            'slug' => 'trang-chu',
            'status' => DefaultStatus::Published->value,
        ]);

        $menuItems = [
            [
                'menu_id' => $mainMenu->id,
                'title' => 'Trang chủ',
                'url' => '/',
                'position' => 0,
                'target' => '_self',
            ],
            [
                'menu_id' => $mainMenu->id,
                'title' => 'Sản phẩm',
                'url' => '/san-pham',
                'position' => 1,
                'target' => '_self',
            ],
            [
                'menu_id' => $mainMenu->id,
                'title' => 'Tin tức',
                'url' => '/tin-tuc',
                'position' => 2,
                'target' => '_self',
            ],
        ];

        foreach ($menuItems as $menuItem) {
            MenuItem::create($menuItem);
        }

        $menuLocation = MenuLocation::firstOrCreate(
            ['location' => 'main-navigation'],
            ['name' => 'Main Navigation', 'menu_id' => $mainMenu->id]
        );
    }
}
