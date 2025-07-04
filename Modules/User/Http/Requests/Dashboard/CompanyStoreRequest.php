<?php

namespace Modules\User\Http\Requests\Dashboard;

use Illuminate\Validation\Rule;
use Modules\User\Enums\SocialType;
use Illuminate\Foundation\Http\FormRequest;

class CompanyStoreRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {

        $rule = [
            'name'       => 'required|max:255',
            "phone_code" => "required",
            'mobile'     => [
                'required',
                Rule::unique("users")->where(function ($query) {
                    $query->where("mobile", $this->mobile)
                        ->where("phone_code", $this->phone_code);
                }),
                'numeric', 'digits_between:8,15'
            ],
            'email'          => 'nullable|email|unique:users,email',
            'password'       => 'required|min:6|same:confirm_password',
            "image"          => "nullable|image",
            "package_id" => "required|exists:packages,id",
            "subscription"      => "sometimes|required_if:use_pakcage_info,1",
            "subscription.max_use" => "sometimes|required|integer|min:1",
            "subscription.current_use" => "sometimes|required|integer|max:" . $this->input("subscription.max_use"),
            "subscription.start_at"   => "sometimes|required|date",
            "subscription.end_at"   => "sometimes|required|after_or_equal:subscription.start_at",
            "subscription.money"    => "sometimes|required|numeric|min:0",
            "city_id"               => "required|exists:cities,id",
            "cover"             => "nullable|image",
            "delivery_receive"  => "nullable",
            "socials"      => "nullable|array|distinct",
            "socials.*.key"  => "required|in:" . implode(',', SocialType::getConstList()),
            "socials.*.link"  => "nullable|url",
            'lat' => 'nullable|numeric',
            'long' => 'nullable|numeric'
        ];


        if ($this->getMethod() == "PUT") {
            $id = $this->route("id");
            $rule["email"]      = $rule["email"] . "," . $id;
            $rule["password"]   = str_replace("required", "nullable", $rule["password"]);
            $rule["mobile"][1]  = Rule::unique("users")->where(function ($query) use (&$id) {
                $query->where("mobile", $this->mobile)
                    ->where("phone_code", $this->phone_code)
                    ->where("id", "!=", $id);
            });
            $rule["title"] = "required|string|max:255";
            $rule["description_work"] = "nullable";
            $rule["state_id"]         = "required|exists:states,id";
            $rule["document"]         = "nullable|file";
            $rule["categories"]         = "nullable|array";
            $rule["categories.*"]         = "nullable|exists:categories,id";
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

    public function messages()
    {

        // $v = [
        //     'name.required'           => __('user::dashboard.users.validation.name.required'),
        //     'email.required'          => __('user::dashboard.users.validation.email.required'),
        //     'email.unique'            => __('user::dashboard.users.validation.email.unique'),
        //     'mobile.required'         => __('user::dashboard.users.validation.mobile.required'),
        //     'mobile.unique'           => __('user::dashboard.users.validation.mobile.unique'),
        //     'mobile.numeric'          => __('user::dashboard.users.validation.mobile.numeric'),
        //     'mobile.digits_between'   => __('user::dashboard.users.validation.mobile.digits_between'),
        //     'password.required'       => __('user::dashboard.users.validation.password.required'),
        //     'password.min'            => __('user::dashboard.users.validation.password.min'),
        //     'password.same'           => __('user::dashboard.users.validation.password.same'),
        // ];

        // return $v;
        return [];
    }
}
