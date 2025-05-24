<?php

namespace Modules\Garage\Http\Requests\Dashboard;

use Illuminate\Foundation\Http\FormRequest;

class GarageRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title.*'        => 'required',
            'address.*'      => 'required',
            'mobile'         => 'required',
            'image'          => 'nullable|mimes:jpeg,png,jpg,gif,svg|max:10000',
            'info.facebook'  => 'nullable',
            'info.linkedin'  => 'nullable',
            'info.twitter'   => 'nullable',
            'info.instagram' => 'nullable',
            'info.lat'       => 'nullable|required_with:info.long',
            'info.long'      => 'nullable|required_with:info.lat',
        ];
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
}
