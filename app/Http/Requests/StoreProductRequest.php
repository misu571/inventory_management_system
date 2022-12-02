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
            'brand' => 'required|exists:brands,id',
            'category' => 'required|exists:categories,id',
            'sub_category' => 'required|exists:sub_categories,id',
            'supplier' => 'required|exists:suppliers,id',
            'department' => 'required|string',
            'serial_number' => 'required|string',
            'location' => 'required|string',
            'rack_number' => 'required|string',
            'image' => 'sometimes|file|image|max:2000',
            'purchase_price' => 'required|integer',
            'purchase_at' => 'required|date',
            'purchase_order_number' => 'required|string|unique:products',
            'parts_number' => 'required|string',
        ];
    }
}
