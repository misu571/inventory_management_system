<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProductRequest extends FormRequest
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
            'purchase_price' => 'required|integer',
            'purchase_at' => 'required|date',
            'expire_at' => 'required|date',
            'selling_price' => 'nullable|integer',
            'category_id' => 'required|exists:categories,id',
            'sub_category_id' => 'required|exists:sub_categories,id',
            'supplier_id' => 'required|exists:suppliers,id',
        ];
    }
}
