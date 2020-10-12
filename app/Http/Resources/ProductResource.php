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
            'model_no'=>$this->model_no,
            'brand'=>$this->brand,
            'mrp'=>$this->price->mrp,
            'selling_price'=>$this->price->selling_price,
            'sellers'=>PriceResource::collection($this->sellers),
        ];
    }
}
