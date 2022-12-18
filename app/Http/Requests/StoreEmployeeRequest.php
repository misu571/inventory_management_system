<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreEmployeeRequest extends FormRequest
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
            'email' => 'required|email|unique:users,email',
            'phone' => 'required|string',
            'nid' => 'nullable|string',
            'salary' => 'nullable|integer|min:0',
            'position' => 'required|string',
            'role' => 'required|exists:roles,id|not_in:1',
            'address' => 'nullable|string|max:200',
            'image' => 'sometimes|file|image|max:2000',
        ];
    }
}
