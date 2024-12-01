<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\subCategory;
use App\Models\Category;

class SubCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('Admin.sub_category');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $this->data['category'] = Category::get();
        return response()->json($this->data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $subCategory = new subCategory();
        $subCategory->name = $request->subCategory;
        $subCategory->category_id = $request->category;
        $subCategory->save();
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $subCategory = subCategory::find($id);
        return $subCategory;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $subCategory = subCategory::find($id);
        $subCategory->delete();
        return response()->json('Delete sub category');
    }
}
