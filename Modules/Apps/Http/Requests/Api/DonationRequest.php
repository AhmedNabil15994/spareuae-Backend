<?php

namespace Modules\Apps\Http\Requests\Api;

use Illuminate\Foundation\Http\FormRequest;

class DonationRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title'             => 'required|string|min:3',
            "attaches"          => "nullable|array",
            "attaches.*"        => "file",
            "category_id"       => "required|exists:categories,id"
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
