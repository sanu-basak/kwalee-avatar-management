<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class UserCurrentAvatarStateResource extends JsonResource
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
            'userStateId' => $this->id,
            'userDetails' => new UserResource($this->user),
            'itemDetails' => new ItemResource($this->items)
        ];
    }
}
