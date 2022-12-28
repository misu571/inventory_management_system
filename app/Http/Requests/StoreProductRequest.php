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
            'sub_category' => 'required_with:category|exists:sub_categories,id',
            'sub_group' => 'required_with:sub_category|exists:sub_groups,id',
            'supplier' => 'required|exists:suppliers,id',
            'country' => 'required|exists:countries,id',
            'department' => 'required|exists:departments,id',
            'name' => 'required|string',
            'batch_number' => 'required|string',
            'parts_number' => 'required|string|unique:products',
            'quantity' => 'required|integer',
            'condition' => 'required|string|in:new,used,damaged',
            'location' => 'required|string',
            'rack_number' => 'required|string',
            'image' => 'sometimes|file|image|max:2000',
            'purchase_order_number' => 'required|string|unique:products',
            'purchase_price' => 'required|integer',
            'purchase_at' => 'required|date',
            'note' => 'nullable|string',
        ];
    }
}
