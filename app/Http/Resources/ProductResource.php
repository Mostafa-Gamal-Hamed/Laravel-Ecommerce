<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            "name"=>$this->name,
            "description"=>$this->description,
            "smallDesc"=>$this->smallDesc,
            "price"=>$this->price,
            "offerPrice"=>$this->offerPrice,
            "image"=>asset("storage")."/".$this->image,
            "quantity"=>$this->quantity,
            "category_id"=>$this->category_id,
        ];
    }
}
