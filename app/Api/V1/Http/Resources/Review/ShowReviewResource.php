<?php

namespace App\Api\V1\Http\Resources\Review;

use Illuminate\Http\Resources\Json\JsonResource;

class ShowReviewResource extends JsonResource
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
            'fullname' => optional($this->user)->fullname,
            'avatar' => asset(optional($this->user)->avatar),
            'content' => $this->content,
            'rating' => $this->rating
        ];
    }
}
