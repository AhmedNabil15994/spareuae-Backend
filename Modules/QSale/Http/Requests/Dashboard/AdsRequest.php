<?php

namespace Modules\QSale\Http\Requests\Dashboard;

use Illuminate\Validation\Rule;
use Modules\Category\Entities\Category;
use Modules\User\Enums\UserType;
use Illuminate\Foundation\Http\FormRequest;

class AdsRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {


        $rule =  [
            "title"               => "required|max:255",
            "description"         => "nullable",
            "special_specification"         => "nullable",
            "malfunctions"         => "nullable",

            "settings.model"      => "nullable",
            "settings.user_name"  => "nullable",
            "settings.user_email" => "required",
            "settings.user_phone" => "nullable",
            "settings.user_whatsapp" => "nullable",
            "settings.user_address" => "nullable",
            "settings.user_description" => "nullable",
            "settings.country"    => "nullable",

            "mobile"      => "nullable",
//            "year"        => "required|integer|min:2000|max:" . date('Y'),
            "status"      => "required",
//            "brand_id"        => "nullable|exists:brands,id",
            "hide_private_number" => "nullable",
            "price"             => "nullable|numeric|min:0|regex:/^\d{1,13}(\.\d{1,4})?$/",
            "image"             => "required|image",
            "attachs"           => "nullable|array",
            "attachs.*"         => "file",
            "start_at"          => "nullable",
            "duration"          => "nullable|integer|min:0",
            "user_id"           => "required|exists:users,id",
            "category_id"       => "required|exists:categories,id",
            "country_id"    => ["nullable", "exists:countries,id"],
            "city_id"       => ["nullable", Rule::exists("cities", "id")->where(function ($query) {
                $query->where("country_id", $this->country_id);
            })],
            "state_id"       => ["nullable", Rule::exists("states", "id")->where(function ($query) {
                $query->where("city_id", $this->city_id);
            })],
            "ad_types"             => "nullable|array",
            "ad_types.*"           => "required|exists:ad_types,id",
            "user_type"            => "nullable|in:" . implode(",", UserType::getConstList())
        ];

        $rule = array_merge(
            $rule,
            $this->validationAttraibute(),
            $this->validationAddations(),
            $this->validationAddress()
        );

        if (strtolower($this->getMethod()) == "put") {
            $rule["image"] = "nullable|image";
            $rule["start_at"] = "required|date";
            $rule["end_at"]  = "required|after_or_equal:start_at";
            $rule["ads_price"] = "required|numeric|min:0";
            unset($rule["duration"], $rule["user_id"], $rule["user_type"]);
        }

        return $rule;
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
        $parent_id = null;
        if($this->category_id){
            $parent_id = $this->category_id;
            $categoryObj = Category::find($this->category_id);
            if($categoryObj->parent_id){
                $parent_id = $categoryObj->parent_id;
            }
        }

        return [
            "adsAttributes.*"               => "nullable|array",
            "adsAttributes.*.attribute_id"    => [
                "sometimes",
                Rule::exists("category_attributes", "attribute_id")
                    ->whereIn("category_id", [$parent_id,$this->category_id])
            ],
            "adsAttributes.*.option_id"       => [
                "sometimes",
                Rule::exists("options", "id")
                    ->where("attribute_id", $this->input("adsAttributes.*.attribute_id"))
            ],
            "adsAttributes.*.value"           => "sometimes"
        ];
    }

    public function validationAddations()
    {
        return [
            "addations.*"               => "nullable|exists:addations,id",
        ];
    }

    public function validationAddress()
    {
        return [
            "address.*"               => "nullable|array|distinct|min:1",
        ];
    }

    protected function prepareForValidation()
    {
        $collection = collect($this->address);


        $this->merge(['address' => $collection->unique()->toArray()]);
    }
}
