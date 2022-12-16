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
}
