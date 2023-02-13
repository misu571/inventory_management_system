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
            'brand_id' => 'required|exists:brands,id',
            'category_id' => 'required|exists:categories,id',
            'sub_category_id' => 'required_with:category|exists:sub_categories,id',
            'sub_group_id' => 'required_with:sub_category|exists:sub_groups,id',
            'supplier_id' => 'required|exists:suppliers,id',
            'country_id' => 'required|exists:countries,id',
            'department_id' => 'required|exists:departments,id',
            'name' => 'required|string',
            'batch_number' => 'required|string',
            'parts_number' => 'required|string',
            'quantity' => 'required|integer',
            'condition' => 'required|string|in:new,used,damaged',
            'location' => 'required|string',
            'rack_number' => 'required|string',
            'image' => 'sometimes|file|image|max:2000',
            'purchase_order_number' => 'required|string',
            'purchase_price' => 'required|integer',
            'purchase_at' => 'required|date',
            'note' => 'nullable|string',
        ];
    }

    /**
     * Handle a passed validation attempt.
     *
     * @return void
     */
    protected function passedValidation()
    {
        $this->replace(['purchase_at' => date_format(date_create($this->purchase_at), 'Y-m-d')]); // Not working
    }

    /**
     * Get custom attributes for validator errors.
     *
     * @return array
     */
    public function attributes()
    {
        return [
            'department_id' => 'department',
            'brand_id' => 'brand',
            'category_id' => 'category',
            'sub_category_id' => 'sub_category',
            'sub_group_id' => 'sub_group',
            'supplier_id' => 'supplier',
            'country_id' => 'country',
            'purchase_at' => 'purchase date',
        ];
    }
}
