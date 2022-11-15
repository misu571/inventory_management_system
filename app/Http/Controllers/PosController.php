<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PosController extends Controller
{
    public function index()
    {
        $products = DB::table('products')
            ->join('categories', 'products.category_id', '=', 'categories.id')
            ->join('sub_categories', 'products.sub_category_id', '=', 'sub_categories.id')
            ->join('suppliers', 'products.supplier_id', '=', 'suppliers.id')
            ->select('products.*', 'categories.name as category_name', 'sub_categories.name as sub_category_name', 'suppliers.name as supplier_name')
            ->orderByDesc('products.updated_at')->get()->toArray();

        return view('pages.pos.index', compact('products'));
    }
}
