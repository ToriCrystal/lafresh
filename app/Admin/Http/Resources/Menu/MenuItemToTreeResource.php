<?php

namespace App\Admin\Http\Resources\Menu;

use Illuminate\Http\Resources\Json\ResourceCollection;

class MenuItemToTreeResource extends ResourceCollection
{
    /**
     * The "data" wrapper that should be applied.
     *
     * @var string|null
     */
    public static $wrap = 'product';
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return $this->collection->map(function($menuItem){
            
            return $this->recursive($menuItem);
            
        });
    }

    private function recursive($menuItem){
        $data = [
            'id' => $menuItem->id,
            'title' => $menuItem->title,
            'url' => $menuItem->url,
            'titleType' => $menuItem->titleReferenceType(),
            'reference_id' => $menuItem->reference_id == null ? '' : $menuItem->reference_id,
            'reference_type' => $menuItem->reference_type == null ? '' : $menuItem->reference_type
        ];
        if($menuItem->children && $menuItem->children->count() > 0){
            $data['children'] = $menuItem->children->map(function($menuItem){
                return $this->recursive($menuItem);
            });
        }
        return $data;
    }
    
}
