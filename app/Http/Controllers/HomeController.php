<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $productList = DB::table('products');
        $products = $productList->count();
        $totalPurchase = $productList->sum('purchase_price');
        $totalSell = $productList->sum('selling_price');
        $customers = DB::table('customers')->count();
        
        return view('home', compact('products', 'totalPurchase', 'totalSell', 'customers'));
    }

    public function subCategoriesOfCategory(Request $request)
    {
        $request->validate(['category' => 'required|exists:categories,id']);
        $subCategories = DB::table('sub_categories')->where('category_id', $request->category)->get()->toArray();

        return response()->json(compact('subCategories'));
    }

    public function subGroupsOfSubCategory(Request $request)
    {
        $request->validate(['sub_category' => 'required|exists:sub_categories,id']);
        $subGroups = DB::table('sub_groups')->where('sub_category_id', $request->sub_category)->get()->toArray();

        return response()->json(compact('subGroups'));
    }
}
