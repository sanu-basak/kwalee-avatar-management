<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CategoryResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'categoryId'    => $this->id,
            'categoryName'  => $this->name,
            'categoryIcon'  => $this->icon,
            'categoryItems' => ItemResource::collection($this->items)
        ];
    }
}
