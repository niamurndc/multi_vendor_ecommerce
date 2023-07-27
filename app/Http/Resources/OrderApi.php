<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class OrderApi extends JsonResource
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
            'name' => $this->name,
            'phone' => $this->phone,
            'area' => $this->area,
            'address' => $this->address,
            'total' => $this->total,
            'user' => $this->user_id,
            'shipping_cost' => $this->charge,
            'items' => CartApi::collection($this->carts)
        ];
    }
}
