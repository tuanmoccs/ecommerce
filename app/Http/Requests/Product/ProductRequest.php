<?php

namespace App\Http\Requests\Product;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'nameproduct'=>'required',
//            'Saleprice'=>'required|numeric',
//            'Oldprice'=>'required|numeric',
            'thumb'=>'required'
        ];
    }
    public function messages(){
        return [
            'name.required'=>'Vui Lòng nhập tên sản phẩm',
//            'Saleprice.required' => 'Vui long nhap gia ban',
//            'Oldprice.required' => 'Vui long nhap gia goc san pham',
            'thumb.required'=>'Vui long chọn file ảnh',
        ];
    }
}
