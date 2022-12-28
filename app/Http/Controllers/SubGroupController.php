<?php

namespace App\Http\Controllers;

use App\Models\SubGroup;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\StoreSubGroupRequest;
use App\Http\Requests\UpdateSubGroupRequest;

class SubGroupController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (auth()->user()->can('sub-group access')) {
            $subGroups = DB::table('sub_groups')
                ->join('categories', 'sub_groups.category_id', '=', 'categories.id')
                ->join('sub_categories', 'sub_groups.sub_category_id', '=', 'sub_categories.id')
                ->select('sub_groups.*', 'categories.name as category_name', 'sub_categories.name as sub_category_name')
                ->orderBy('categories.name')->orderBy('sub_categories.name')->orderBy('sub_groups.name')->get()->toArray();

            return view('pages.sub_group.index', compact('subGroups'));
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
        if (auth()->user()->can('sub-group create')) {
            $categories = DB::table('categories')->select('id', 'name')->get()->toArray();
            $subCategories = DB::table('sub_categories')->select('id', 'name')->get()->toArray();

            return view('pages.sub_group.create', compact('categories', 'subCategories'));
        }

        $alert = (object) ['status' => 'warning', 'message' => 'Unauthorized access!'];
        return back()->with(compact('alert'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreSubGroupRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSubGroupRequest $request)
    {
        if (auth()->user()->can('sub-group store')) {
            $data = array_replace(Arr::except($request->validated(), ['category', 'sub_category']), [
                'category_id' => $request->category,
                'sub_category_id' => $request->sub_category
            ]);
            SubGroup::create($data);
            $alert = (object) ['status' => 'success', 'message' => 'New record has been created'];

            return redirect()->route('sub-group.index')->with(compact('alert'));
        }

        $alert = (object) ['status' => 'warning', 'message' => 'Unauthorized access!'];
        return back()->with(compact('alert'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\SubGroup  $subGroup
     * @return \Illuminate\Http\Response
     */
    public function show(SubGroup $subGroup)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SubGroup  $subGroup
     * @return \Illuminate\Http\Response
     */
    public function edit(SubGroup $subGroup)
    {
        if (auth()->user()->can('sub-group edit')) {
            $categories = DB::table('categories')->select('id', 'name')->get()->toArray();
            $subCategories = DB::table('sub_categories')->select('id', 'name')->get()->toArray();

            return view('pages.sub_group.edit', compact('subGroup', 'categories', 'subCategories'));
        }

        $alert = (object) ['status' => 'warning', 'message' => 'Unauthorized access!'];
        return back()->with(compact('alert'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateSubGroupRequest  $request
     * @param  \App\Models\SubGroup  $subGroup
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateSubGroupRequest $request, SubGroup $subGroup)
    {
        if (auth()->user()->can('sub-group update')) {
            $data = array_replace(Arr::except($request->validated(), ['category', 'sub_category']), [
                'category_id' => $request->category,
                'sub_category_id' => $request->sub_category
            ]);
            $subGroup->update($data);
            $alert = (object) ['status' => 'success', 'message' => 'Record has been updated'];

            return back()->with(compact('alert'));
        }

        $alert = (object) ['status' => 'warning', 'message' => 'Unauthorized access!'];
        return back()->with(compact('alert'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SubGroup  $subGroup
     * @return \Illuminate\Http\Response
     */
    public function destroy(SubGroup $subGroup)
    {
        if (auth()->user()->can('sub-group destroy')) {
            try {
                $subGroup->delete();
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
