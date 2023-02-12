<?php

namespace App\Http\Requests;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Http\FormRequest;

class UpdateSupplierRequest extends FormRequest
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
        $exclude = DB::table('suppliers')->where([
            ['id', Route::current()->parameter('supplier')->id],
            ['email', $this->email]
        ])->first() ? 'exclude' : '';
        return [
            'name' => 'required|string',
            'email' => $exclude . '|required|email|unique:suppliers',
            'phone' => 'required|string',
            'address' => 'required|string',
        ];
    }
}
