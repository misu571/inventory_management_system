<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\StoreBrandRequest;
use App\Http\Requests\UpdateBrandRequest;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (auth()->user()->can('brand access')) {
            $brands = DB::table('brands')->orderByDesc('updated_at')->get()->toArray();

            return view('pages.brand.index', compact('brands'));
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
        if (auth()->user()->can('brand create')) {
            return view('pages.brand.create');
        }

        $alert = (object) ['status' => 'warning', 'message' => 'Unauthorized access!'];
        return back()->with(compact('alert'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreBrandRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreBrandRequest $request)
    {
        if (auth()->user()->can('brand store')) {
            Brand::create($request->validated());
            $alert = (object) ['status' => 'success', 'message' => 'New record has been created'];

            return redirect()->route('brand.index')->with(compact('alert'));
        }

        $alert = (object) ['status' => 'warning', 'message' => 'Unauthorized access!'];
        return back()->with(compact('alert'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function show(Brand $brand)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function edit(Brand $brand)
    {
        if (auth()->user()->can('brand edit')) {
            return view('pages.brand.edit', compact('brand'));
        }

        $alert = (object) ['status' => 'warning', 'message' => 'Unauthorized access!'];
        return back()->with(compact('alert'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateBrandRequest  $request
     * @param  \App\Models\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateBrandRequest $request, Brand $brand)
    {
        if (auth()->user()->can('brand update')) {
            $brand->update($request->validated());
            $alert = (object) ['status' => 'success', 'message' => 'Record has been updated'];

            return back()->with(compact('alert'));
        }

        $alert = (object) ['status' => 'warning', 'message' => 'Unauthorized access!'];
        return back()->with(compact('alert'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function destroy(Brand $brand)
    {
        if (auth()->user()->can('brand destroy')) {
            try {
                $brand->delete();
                $alert = (object) ['status' => 'success', 'message' => 'Record has been deleted'];
            } catch (\Exception $e) {
                $alert = (object) ['status' => 'danger', 'message' => 'One or more record is being used'];
            }
            
            return back()->with(compact('alert'));
        }

        $alert = (object) ['status' => 'warning', 'message' => 'Unauthorized access!'];
        return back()->with(compact('alert'));
    }
}
