<?php

namespace Modules\Customer\Transformers\Dashboard;

use Illuminate\Http\Resources\Json\JsonResource;

class CustomerResource extends JsonResource
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
           'id'            => $this->id,
           'image'         => $this->getFirstMediaUrl('images'),
           'status'        => $this->status,
           'created_at'    => date('d-m-Y', strtotime($this->created_at)),
        ];
    }
}
