<?php

namespace Modules\Apps\Transformers\Dashboard;

use  Illuminate\Http\Resources\Json\JsonResource;

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
            "id"   => $this->id,
            'title' => $this->title,
            'category' => $this->category->title,
            'user'      => $this->user->name,
            'image'      => asset($this->image),
            "created_at" => $this->created_at->format("d-m-Y h:i a")
        ];
    }
}
