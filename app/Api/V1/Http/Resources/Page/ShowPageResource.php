<?php

namespace App\Api\V1\Http\Resources\Page;

use Illuminate\Http\Resources\Json\JsonResource;

class ShowPageResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'slug' => $this->slug,
            'content' => $this->content,
            'title_seo' => $this->title_seo,
            'desc_seo' => $this->desc_seo
        ];
    }
}
