<?php

namespace Modules\Apps\Http\Requests\Frontend;

use Illuminate\Foundation\Http\FormRequest;

class SubscribeNewsRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        switch ($this->getMethod())
        {
            // handle creates
            case 'post':
            case 'POST':

                return [
                    'email'               => 'required|email|unique:news_subscriptions',
                ];
        }
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
        $v = [
             'email.required'              =>   __('apps::frontend.register.validations.email.required'),
             'email.email'                 =>   __('apps::frontend.register.validations.email.email'),
             'email.unique'                =>   __('authentication::frontend.register.validation.email.unique'),
        ];

        return $v;

    }
}
