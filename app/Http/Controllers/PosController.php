<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PosController extends Controller
{
    public function index()
    {
        $products = DB::table('products')
                ->join('departments', 'products.department_id', '=', 'departments.id')
                ->join('brands', 'products.brand_id', '=', 'brands.id')
                ->join('categories', 'products.category_id', '=', 'categories.id')
                ->join('sub_categories', 'products.sub_category_id', '=', 'sub_categories.id')
                ->join('suppliers', 'products.supplier_id', '=', 'suppliers.id')
                ->join('countries', 'products.country_id', '=', 'countries.id')
                ->select(
                    'products.*',
                    'departments.name as department_name',
                    'brands.name as brand_name',
                    'categories.name as category_name',
                    'sub_categories.name as sub_category_name',
                    'suppliers.name as supplier_name',
                    'countries.name as country_name'
                )->orderByDesc('products.updated_at')->get()->toArray();

        return view('pages.pos.index', compact('products'));
    }

    public function searchProduct(Request $request)
    {
        $request->validate(['search' => 'required|string']);
        $products = DB::table('products')->where(function ($query) {
                $query->where('code', 'like', '%' . request()->search . '%')->orWhere('name', 'like', '%' . request()->search . '%');
            })->get()->toArray();

        return response()->json(compact('products'));
    }
}
