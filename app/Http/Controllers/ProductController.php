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
        if (auth()->user()->can('product access')) {
            $products = DB::table('products')
                ->join('departments', 'products.department_id', '=', 'departments.id')
                ->join('brands', 'products.brand_id', '=', 'brands.id')
                ->join('categories', 'products.category_id', '=', 'categories.id')
                ->join('sub_categories', 'products.sub_category_id', '=', 'sub_categories.id')
                ->join('sub_groups', 'products.sub_group_id', '=', 'sub_groups.id')
                ->join('suppliers', 'products.supplier_id', '=', 'suppliers.id')
                ->join('countries', 'products.country_id', '=', 'countries.id')
                ->select(
                    'products.*',
                    'departments.name as department_name',
                    'brands.name as brand_name',
                    'categories.name as category_name',
                    'sub_categories.name as sub_category_name',
                    'sub_groups.name as sub_group_name',
                    'suppliers.name as supplier_name',
                    'countries.name as country_name'
                )->orderByDesc('products.updated_at')->get()->toArray();
                
            return view('pages.product.index', compact('products'));
        }

        $alert = (object) ['status' => 'warning', 'message' => 'Unauthorized access!'];
        return back()->with(compact('alert'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (auth()->user()->can('product create')) {
            $departments = DB::table('departments')->select('id', 'name')->get()->toArray();
            $brands = DB::table('brands')->select('id', 'name')->get()->toArray();
            $categories = DB::table('categories')->select('id', 'name')->get()->toArray();
            $suppliers = DB::table('suppliers')->select('id', 'name')->get()->toArray();
            $countries = DB::table('countries')->select('id', 'name', 'code_alpha_2')->get()->toArray();
            
            return view('pages.product.create', compact('departments', 'brands', 'categories', 'suppliers', 'countries'));
        }

        $alert = (object) ['status' => 'warning', 'message' => 'Unauthorized access!'];
        return back()->with(compact('alert'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreProductRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProductRequest $request)
    {
        if (auth()->user()->can('product store')) {
            $array = $request->validated();
            $image = $request->hasFile('image') ? $this->storeFile('products', $request->file('image')) : null;
            data_set($array, 'purchase_at', date_format(date_create($request->purchase_at), 'Y-m-d'));
            $data = array_replace(Arr::except($array, [
                'department',
                'brand',
                'category',
                'sub_category',
                'sub_group',
                'supplier',
                'country'
            ]), [
                'department_id' => $request->department,
                'brand_id' => $request->brand,
                'category_id' => $request->category,
                'sub_category_id' => $request->sub_category,
                'sub_group_id' => $request->sub_group,
                'supplier_id' => $request->supplier,
                'country_id' => $request->country,
                'image' => $image
            ]);
            Product::create($data);
            $alert = (object) ['status' => 'success', 'message' => 'New record has been created'];
            
            return redirect()->route('product.index')->with(compact('alert'));
        }

        $alert = (object) ['status' => 'warning', 'message' => 'Unauthorized access!'];
        return back()->with(compact('alert'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        if (auth()->user()->can('product show')) {
            $departments = DB::table('departments')->select('id', 'name')->get()->toArray();
            $brands = DB::table('brands')->select('id', 'name')->get()->toArray();
            $categories = DB::table('categories')->select('id', 'name')->get()->toArray();
            $subCategories = DB::table('sub_categories')->where('category_id', $product->category_id)->select('id', 'name')->get()->toArray();
            $subGroups = DB::table('sub_groups')->where('sub_category_id', $product->sub_category_id)->select('id', 'name')->get()->toArray();
            $suppliers = DB::table('suppliers')->select('id', 'name')->get()->toArray();
            $countries = DB::table('countries')->select('id', 'name', 'code_alpha_2')->get()->toArray();

            return view('pages.product.show', compact(
                'product',
                'departments',
                'brands',
                'categories',
                'subCategories',
                'subGroups',
                'suppliers',
                'countries'
            ));
        }

        $alert = (object) ['status' => 'warning', 'message' => 'Unauthorized access!'];
        return back()->with(compact('alert'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        return redirect()->route('product.index');
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
        if (auth()->user()->can('product update')) {
            $array = $request->validated();
            data_set($array, 'purchase_at', date_format(date_create($request->purchase_at), 'Y-m-d'));
            $data = array_replace(Arr::except($array, [
                'department',
                'brand',
                'category',
                'sub_category',
                'sub_group',
                'supplier',
                'country'
            ]), [
                'department_id' => $request->department,
                'brand_id' => $request->brand,
                'category_id' => $request->category,
                'sub_category_id' => $request->sub_category,
                'sub_group_id' => $request->sub_group,
                'supplier_id' => $request->supplier,
                'country_id' => $request->country
            ]);
            $product->update($data);
            $alert = (object) ['status' => 'success', 'message' => 'Record has been updated'];
            
            return back()->with(compact('alert'));
        }

        $alert = (object) ['status' => 'warning', 'message' => 'Unauthorized access!'];
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
        if (auth()->user()->can('product destroy')) {
            $product->delete();
            Storage::disk('public')->delete('products/' . $product->image);
            $alert = (object) ['status' => 'success', 'message' => 'Record has been deleted'];
            
            return back()->with(compact('alert'));
        }

        $alert = (object) ['status' => 'warning', 'message' => 'Unauthorized access!'];
        return back()->with(compact('alert'));
    }

    public function imageUpdate(Request $request, Product $product)
    {
        if (auth()->user()->can('product update')) {
            request()->validate(['image' => 'sometimes|file|image|max:2000']);
            $image = $request->hasFile('image') ? $this->storeFile('products', $request->file('image'), $product->image) : null;
            $product->update(['image' => $image]);
            $alert = (object) ['status' => 'success', 'message' => 'Product image has been updated'];

            return back()->with(compact('alert'));
        }

        $alert = (object) ['status' => 'warning', 'message' => 'Unauthorized access!'];
        return back()->with(compact('alert'));
    }

    private function storeFile(string $location, $file, $replace = null)
    {
        try {
            $name = $file->hashName();
            $file->storeAs($location, $name, 'public');
            if ($replace) {
                Storage::disk('public')->delete($location . '/' . $replace);
            }
            return $name;
        } catch (\Exception $th) {
            $alert = (object) ['status' => 'warning', 'message' => 'Something went wrong, file not uploaded'];
            return back()->with(compact('alert'));
        }
    }
}
