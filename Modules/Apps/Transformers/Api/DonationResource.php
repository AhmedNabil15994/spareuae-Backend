<?php

namespace Modules\Apps\Transformers\Api;

use  Illuminate\Http\Resources\Json\JsonResource;
use Modules\QSale\Transformers\Api\MediaResource;

class DonationResource extends JsonResource
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
            "id"         => $this->id,
            'title'      => $this->title,
            'category'   => $this->category->title,
            'user'       => $this->user->name,
            "attaches"   =>  MediaResource::collection($this->getMedia("attaches")),
            "created_at" => $this->created_at->format("d-m-Y h:i a")
        ];
    }
}
