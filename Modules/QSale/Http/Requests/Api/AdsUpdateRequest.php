<?php

namespace Modules\QSale\Http\Requests\Api;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class AdsUpdateRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $rule=  [
            "title"       => "required|max:255",
            "description" => "nullable",
            "mobile"      => "nullable",
            "hide_private_number"=> "required|boolean",
            "price"             => "nullable|numeric|min:0",
            "image"             => "nullable|image",
            "attachs"           => "nullable|array",
            "attachs.*"         => "file",
            "category_id"       => "required|exists:categories,id" ,
            // "country_id"    => ["required", "exists:countries,id"]  ,
            // "city_id"       => ["required",Rule::exists("cities", "id")->where(function($query){
            //     $query->where("country_id", $this->country_id);
            //  }) ],
            //  "state_id"       => ["required",Rule::exists("states", "id")->where(function($query){
            //     $query->where("city_id", $this->city_id);
            //  }) ],
            "address"              => "nullable|array",
            "address.*.country_id" => "nullable|exists:countries,id",
            "address.*.city_id"    => "required|exists:cities,id"    ,
            "address.*.state_id"   => "required|exists:states,id"    ,
            "deleteMedia"      => ["nullable", "array"],
            "deleteMedia.*"    => ["required", Rule::exists("media", "id")->where("model_id", $this->id)] ,
            "deleteAddress"    => "nullable|array",
            "deleteAddress.*"  => "required|exists:ads_addresses,id",
            "ad_types"             => "nullable|array",
            "ad_types.*"           => "required|exists:ad_types,id",

        ];
        

        return array_merge(
            $rule,
            $this->validationAttraibute(),
            $this->validationAddations(),
        );
    }

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    public function validationAttraibute()
    {
        return [
            "adsAttributes.*"               => "nullable|array" ,
            "adsAttributes.*.attribute_id"    => ["sometimes",
                                                        Rule::exists("category_attributes", "attribute_id")
                                                            ->where("category_id", $this->category_id)
                                                 ],
            "adsAttributes.*.option_id"       => ["sometimes",
                                                        Rule::exists("options", "id")
                                                            ->where("attribute_id", $this->input("adsAttributes.*.attribute_id"))
                                                ] ,
            "adsAttributes.*.value"           => "sometimes"
        ];
    }

    public function validationAddations()
    {
        return [
            "addations.*"               => "nullable|exists:addations,id" ,
        ];
    }
}
