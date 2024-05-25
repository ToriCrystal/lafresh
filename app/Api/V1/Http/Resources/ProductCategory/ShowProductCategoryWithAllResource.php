<?php

namespace App\Api\V1\Http\Resources\ProductCategory;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Api\V1\Repositories\Product\ProductRepositoryInterface;
use App\Api\V1\Http\Resources\Product\AllProductResource;

class ShowProductCategoryWithAllResource extends JsonResource
{
    protected $repositoryProduct;

    public function __construct($resource, ProductRepositoryInterface $repositoryProduct)
    {
        parent::__construct($resource);
        $this->repositoryProduct = $repositoryProduct;
    }
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $data = [
            'id' => $this->id,
            'name' => $this->name,
            'slug' => $this->slug,
            'desc' => $this->desc,
            'title_seo' => $this->title_seo,
            'desc_seo' => $this->desc_seo
        ];
        $data['parents'] = $this->ancestors->map(function($parent){
            return [
                'id' => $parent->id,
                'name' => $parent->name,
                'slug' => $parent->slug
            ];
        });
        $data['childrens'] = $this->descendants->toTree()->map(function($children){
            return $this->recursive($children);
        });
        $array_id = array_column($this->descendants->toArray(), 'id');
        array_push($array_id, $this->id);
        $products = $this->repositoryProduct->getByCategoriesWithRelations($array_id);
        $data['products'] = new AllProductResource($products);
        return $data;
    }

    private function recursive($category){
        $data = [
            'id' => $category->id,
            'name' => $category->name,
            'slug' => $category->slug
        ];
        if($category->children && $category->children->count() > 0){
            $data['children'] = $category->children->map(function($category){
                return $this->recursive($category);
            });
        }
        return $data;
    }
}
