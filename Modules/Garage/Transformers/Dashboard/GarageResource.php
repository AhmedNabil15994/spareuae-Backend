<?php

namespace Modules\Garage\Transformers\Dashboard;

use Illuminate\Http\Resources\Json\JsonResource;
use Modules\Course\Transformers\Dashboard\CourseResource;

class GarageResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param \Illuminate\Http\Request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'image' => $this->getFirstMediaUrl('images'),
            'status' => $this->status,
            'title' => $this->title,
            'deleted_at' => $this->deleted_at,
            'created_at' => date('d-m-Y', strtotime($this->created_at)),
        ];
    }
}
