<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
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
            'name' => $this->name,
            'path' => $this->path,
            'price' => $this->price,
            'description' => $this->description,
            'image' => $this->image,
            'user' => $this->user->name,
            'user_id' => $this->user_id,
            'created_at' => $this->created_at->diffForHumans()
        ];
    }
}
