<?php

namespace App\Http\Requests;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Http\FormRequest;

class UpdateSubCategoryRequest extends FormRequest
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
        $exclude = DB::table('sub_categories')->where([
            ['id', Route::current()->parameter('sub_category')->id],
            ['name', $this->name]
        ])->first() ? 'exclude' : '';
        return [
            'category' => 'required|integer|exists:categories,id',
            'name' => $exclude . '|required|string|unique:sub_categories',
        ];
    }
}
