<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProductRequest extends FormRequest
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
            'name' => 'required|string',
            'code' => 'required|string|min:6',
            'location' => 'required|string',
            'route' => 'required|string',
            'purchase_at' => 'required|string',
            'expire_at' => 'required|string',
            'purchase_price' => 'required|string',
            'selling_price' => 'required|string',
            'category_id' => 'required|string',
            'sub_category_id' => 'required|string',
            'supplier_id' => 'required|string',
        ];
    }
}
