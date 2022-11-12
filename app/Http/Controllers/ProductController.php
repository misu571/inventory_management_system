<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Support\Arr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = DB::table('products')
        ->join('categories', 'products.category_id', '=', 'categories.id')
        ->join('sub_categories', 'products.sub_category_id', '=', 'sub_categories.id')
        ->join('suppliers', 'products.supplier_id', '=', 'suppliers.id')
        ->select('products.*', 'categories.name as category_name', 'sub_categories.name as sub_category_name', 'suppliers.name as supplier_name')
        ->orderByDesc('products.updated_at')->get()->toArray();

        return view('pages.product.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = DB::table('categories')->select('id', 'name')->get()->toArray();
        $suppliers = DB::table('suppliers')->select('id', 'name')->get()->toArray();
        
        return view('pages.product.create', compact('categories', 'suppliers'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreProductRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProductRequest $request)
    {
        $array = $request->validated();
        $image = $request->hasFile('image') ? $this->storeFile($request->file('image')) : null;
        data_set($array, 'purchase_at', date_format(date_create($request->purchase_at), 'Y-m-d'));
        data_set($array, 'expire_at', date_format(date_create($request->expire_at), 'Y-m-d'));
        $data = array_replace(Arr::except($array, ['category', 'sub_category', 'supplier']), [
            'image' => $image,
            'category_id' => $request->category,
            'sub_category_id' => $request->sub_category,
            'supplier_id' => $request->supplier
        ]);
        
        Product::create($data);
        $alert = (object) ['status' => 'success', 'message' => 'New record has been created'];

        return redirect()->route('product.index')->with(compact('alert'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        $categories = DB::table('categories')->select('id', 'name')->get()->toArray();
        $subCategories = DB::table('sub_categories')->select('id', 'category_id', 'name')->get()->toArray();
        $suppliers = DB::table('suppliers')->select('id', 'name')->get()->toArray();

        return view('pages.product.edit', compact('product', 'categories', 'subCategories', 'suppliers'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateProductRequest  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProductRequest $request, Product $product)
    {
        $array = $request->validated();
        $image = $request->hasFile('image') ? $this->storeFile($request->file('image'), $product->image) : null;
        data_set($array, 'purchase_at', date_format(date_create($request->purchase_at), 'Y-m-d'));
        data_set($array, 'expire_at', date_format(date_create($request->expire_at), 'Y-m-d'));
        $data = array_replace(Arr::except($array, ['category', 'sub_category', 'supplier']), [
            'image' => $image,
            'category_id' => $request->category,
            'sub_category_id' => $request->sub_category,
            'supplier_id' => $request->supplier
        ]);
        
        $product->update($data);
        $alert = (object) ['status' => 'success', 'message' => 'Record has been updated'];

        return back()->with(compact('alert'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $product->delete();
        $alert = (object) ['status' => 'success', 'message' => 'Record has been deleted'];

        return back()->with(compact('alert'));
    }

    public function subCategories(Request $request)
    {
        $request->validate([
            'category' => ['required', 'exists:categories,id'],
        ]);
        $subCategories = DB::table('sub_categories')->where('category_id', $request->category)->select('id', 'category_id', 'name')->get()->toArray();
        
        return response()->json(compact('subCategories'));
    }

    private function storeFile($file, $updateWith = null)
    {
        $name = $file->hashName();
        try {
            $file->storeAs('products', $name, 'public');
            if ($updateWith) {
                Storage::disk('public')->delete('products/' . $updateWith);
            }
        } catch (\Exception $th) {
            $alert = (object) ['status' => 'warning', 'message' => 'Something went wrong, form not submitted'];
            return back()->with(compact('alert'));
        }

        return $name;
    }
}
