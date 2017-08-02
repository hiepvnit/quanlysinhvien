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
            'anh' => 'image|mimes:jpg,png,jpeg,gif,svg|max:2048',
            'ho_lot' => 'required|max:255',
            'ten' => 'required|max:255',
            'congty' => 'required',
            'khoa_hoc' => 'required',
            'lop' => 'required',
            'huyen' => 'required',
            'tinh' => 'required',
            'gioi_tinh' => 'required',
            'chi_nhanh' => 'required'
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
            'anh.image' => 'File được chọn không phải là ảnh',
            'anh.mimes' => 'Chỉ upload được định dạng jpg,png,jpeg,gif,svg',
            'anh.size' => 'File phải nhỏ hơn 2Mb',
            'ho_lot.required' => 'Chưa nhập họ lót',
            'ho_lot.max'  => 'Họ lót quá dài',
            'ten.required' => 'Chưa nhập tên',
            'ten.max' => 'Tên quá dài',
            'congty.required' => 'Chưa chọn công ty tiếp nhận',
            'khoa_hoc.required' => 'Chưa chọn khóa học',
            'lop.required' => 'Chưa chọn lớp',
            'huyen.required' => 'Chưa chọn huyện',
            'tinh.required' => 'Chưa chọn tỉnh',
            'gioi_tinh.required' => 'Chưa chọn giới tính',
            'chi_nhanh.required' => 'Chưa chọn chi nhánh'
        ];
    }
}
