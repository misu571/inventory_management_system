<?php

namespace App\Http\Controllers;

use App\Models\SubCategory;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\StoreSubCategoryRequest;
use App\Http\Requests\UpdateSubCategoryRequest;

class SubCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $subCategories = DB::table('sub_categories')
            ->join('categories', 'sub_categories.category_id', '=', 'categories.id')
            ->select('sub_categories.*', 'categories.name as category_name')
            ->orderBy('categories.name')->orderBy('sub_categories.name')->get()->toArray();

        return view('pages.sub_category.index', compact('subCategories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = DB::table('categories')->select('id', 'name')->get()->toArray();

        return view('pages.sub_category.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreSubCategoryRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSubCategoryRequest $request)
    {
        $data = array_replace(Arr::except($request->validated(), ['category']), [
            'category_id' => $request->category
        ]);
        SubCategory::create($data);
        $alert = (object) ['status' => 'success', 'message' => 'New record has been created'];

        return redirect()->route('sub-category.index')->with(compact('alert'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\SubCategory  $subCategory
     * @return \Illuminate\Http\Response
     */
    public function show(SubCategory $subCategory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SubCategory  $subCategory
     * @return \Illuminate\Http\Response
     */
    public function edit(SubCategory $subCategory)
    {
        $categories = DB::table('categories')->select('id', 'name')->get()->toArray();
        
        return view('pages.sub_category.edit', compact('subCategory', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateSubCategoryRequest  $request
     * @param  \App\Models\SubCategory  $subCategory
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateSubCategoryRequest $request, SubCategory $subCategory)
    {
        $data = array_replace(Arr::except($request->validated(), ['category']), [
            'category_id' => $request->category
        ]);
        $subCategory->update($data);
        $alert = (object) ['status' => 'success', 'message' => 'Record has been updated'];

        return back()->with(compact('alert'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SubCategory  $subCategory
     * @return \Illuminate\Http\Response
     */
    public function destroy(SubCategory $subCategory)
    {
        try {
            $subCategory->delete();
            $alert = (object) ['status' => 'success', 'message' => 'Record has been deleted'];
        } catch (\Exception $e) {
            $alert = (object) ['status' => 'danger', 'message' => 'One or more record is being used with this sub-category'];
        }

        return back()->with(compact('alert'));
    }
}
