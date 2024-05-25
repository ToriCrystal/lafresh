<?php

namespace App\Api\V1\Http\Resources\Post;

use Illuminate\Http\Resources\Json\JsonResource;

class ShowPostResource extends JsonResource
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
            'feature_image' => asset($this->feature_image),
            'excerpt' => $this->excerpt,
            'content' => $this->content,
            'posted_at' => $this->posted_at,
            'title_seo' => $this->title_seo,
            'desc_seo' => $this->desc_seo
        ];
    }
}
