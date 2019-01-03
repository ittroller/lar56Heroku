<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class HoadonRequest extends FormRequest
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
            'thanhtoan_hoten' => 'nullable',
        ];
    }
    public function messages(){
		return [
			'thanhtoan_hoten.nullable' => 'Phải nhập hoten',
		];
	}
}
