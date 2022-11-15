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
            'code' => 'required|string|min:6|unique:products,code',
            'location' => 'required|string',
            'route' => 'required|string',
            'image' => 'sometimes|file|image|max:2000',
            'purchase_price' => 'required|integer',
            'purchase_at' => 'required|date',
            'expire_at' => 'required|date|after:purchase_at',
            'selling_price' => 'nullable|integer',
            'category' => 'required|exists:categories,id',
            'sub_category' => 'required|exists:sub_categories,id',
            'supplier' => 'required|exists:suppliers,id',
        ];
    }
}
