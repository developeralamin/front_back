<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FeeCategoryRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'fee'  => 'required|unique:fee_categories',
        ];
    }
}
