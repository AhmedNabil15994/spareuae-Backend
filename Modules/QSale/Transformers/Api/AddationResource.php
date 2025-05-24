<?php

namespace Modules\QSale\Transformers\Api;

use  Illuminate\Http\Resources\Json\JsonResource;

class AddationResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request
     * @return array
     */
    public function toArray($request)
    {
        return [
            "id"            => $this->id,
            "name"          => $this->name,
            "icon"          => url($this->icon),
            "description"   => $this->description,
            "price"         => $this->price,
            "addition_type" => $this->type,
            "days"          => $this->days,
        ];
    }
}
