<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoaisanphamRequest extends FormRequest
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
            'tenloai' => 'required',
        ];
    }
    public function messages(){
		return [
			'tenloai.required' => 'Phải nhập tên loại',
		];
	}
}
