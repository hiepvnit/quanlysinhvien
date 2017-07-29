<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class HocVienRequest extends FormRequest
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
            'ho_lot' => 'required|max:255',
            'ten' => 'required|max:255',
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'ho_lot.required' => 'Chưa nhập họ lót',
            'ho_lot.max'  => 'Họ lót quá dài',
            'ten.required' => 'Chưa nhập tên',
            'ten.max' => 'Tên quá dài'
        ];
    }
}
