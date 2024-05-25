<?php

namespace App\Repositories\Product;

use App\Admin\Repositories\Product\ProductRepository as AdminProductRepository;
use App\Repositories\Product\ProductRepositoryInterface;

class ProductRepository extends AdminProductRepository implements ProductRepositoryInterface
{

    public function view(array $filter, array $relations = [])
    {

        $this->findByOrFail($filter, $relations);

        $this->instance->update([
            'viewed' => $this->instance->viewed + 1
        ]);

        return $this->instance;
    }

    public function paginate(array $filter, array $relationCondition = [], array $relations = [], int $paginate = 10)
    {

        $this->getQueryBuilder();

        $this->applyFilters($filter);

        $this->queryFilter();

        $this->querySort();

        foreach ($relationCondition as $relation => $condition) {
            $this->instance = $this->instance->whereHas($relation, $condition);
        }

        return $this->instance->published()->with($relations)->paginate($paginate);
    }

    public function getByLimit(array $filter, array $filterRelation = [], array $relations = [], int $limit = 10, array $sort = ['id', 'desc'])
    {

        $this->getQueryBuilder();

        $this->applyFilters($filter);

        foreach ($filterRelation as $relation => $condition) {
            $this->instance = $this->instance->whereHas($relation, $condition);
        }

        return $this->instance->published()->with($relations)->limit($limit)->orderBy(...$sort)->get();
    }

    public function queryFilter()
    {
        if (request()->has('attribute')) {

            $variations = array_values(array_filter(request()->get('attribute'), function ($value) {

                return $value !== null;
            }));

            if (!empty($variations)) {

                $this->instance = $this->instance->whereRelation(
                    'productVariations',
                    fn ($query) => $query->whereHas(
                        'attributeVariations',
                        fn ($q) => $q->whereIn('attributes_variations.slug', $variations),
                        '=',
                        count($variations)
                    )
                );
            }
        }
    }

    protected function querySort()
    {
        if (request()->has('sort') && in_array(request()->input('sort'), array_keys(config('custom.product.sort')))) {

            $sort = request()->input('sort');

            $this->$sort();
        } else {

            $this->latest();
        }
    }

    public function latest()
    {
        $this->instance = $this->instance->orderBy('id', 'desc');
    }

    public function oldlest()
    {
        $this->instance = $this->instance->orderBy('id', 'asc');
    }

    public function priceAsc()
    {
        $this->instance = $this->instance->orderBy('price_selling', 'asc');
        $this->instance = $this->instance->orderBy('price_promotion', 'asc');
    }

    public function priceDesc()
    {


        $this->instance = $this->instance->orderBy('price_selling', 'desc');

        $this->instance = $this->instance->orderBy('price_promotion', 'desc');
    }

    public function nameAsc()
    {
        $this->instance = $this->instance->orderBy('name', 'asc');
    }

    public function nameDesc()
    {
        $this->instance = $this->instance->orderBy('name', 'desc');
    }

    public function viewDesc()
    {
        $this->instance = $this->instance->orderBy('viewed', 'desc');
    }

    public function bestSeller()
    {
        $this->instance = $this->instance->withCount('orderDetails')->orderBy('order_details_count', 'desc');
    }


    public function getUnitById($productId)
    {
        $product = $this->model->select('unit')->find($productId);
        if ($product) {
            return $product->unit;
        }
        return null;
    }
}
