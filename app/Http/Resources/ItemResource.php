<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ItemResource extends JsonResource
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
            'itemId'     => $this->id,
            'itemName'   => $this->name,
            'itemImage'  => $this->image,
            'itemPrice'  => $this->price
        ];
    }
}
