<?php

namespace Modules\User\Transformers\Api;

use  Illuminate\Http\Resources\Json\JsonResource;
use Modules\User\Transformers\Api\OfficeResource;

class UserResource extends JsonResource
{
    public function toArray($request)
    {

        return [
            'id'            => $this->id,
            'name'          => $this->name,
            'image'         => url($this->image),
            "email"         => $this->email ?? "",
            "phone_code"    => $this->phone_code,
            'mobile'        => $this->mobile,
            "is_active"     => $this->is_active ? 1 : 0,
            "type"          => $this->type,
            "number_of_free" => $this->number_of_free,
            "is_verified"   => $this->is_verified ? 1 : 0,
            "admin_verified" => $this->admin_verified ? 1 : 0,
            "office"        => new OfficeResource($this->whenLoaded("office")),
            "company"       => new CompanyResource($this->whenLoaded("company")),
            "ads_count"     => $this->when(!is_null($this->ads_allow_count), $this->ads_allow_count),
            "firebase_uuid" => $this->firebase_uuid,
            "rates_avg"     => $this->when(!is_null($this->rates_avg), (float)$this->rates_avg),
            "rates_count"    => $this->when(!is_null($this->rates_count), $this->rates_count),
            'code_verified' => $this->when(config("app.env") != "production", $this->code_verified),

        ];
    }
}
