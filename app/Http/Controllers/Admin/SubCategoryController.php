<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\subCategory;
use App\Models\Category;

class SubCategoryController extends Controller
{
    public function __construct( Category $category)
    {
        $this->middleware('auth');
        $this->Category = $category;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $this->data['category'] = Category::query()->get();
        return view('Admin.sub_category', $this->data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $search = $request->get('search')['value'] ?? ''; // Get the search input
        $start = $request->get('start', 0); // Start index
        $length = $request->get('length', 10); // Records per page

        // Start the query
        $query = subCategory::with('category');

        // Add search functionality
        if ($search) {
            $query->where('name', 'like', '%' . $search . '%')
                ->orWhere('category_id', 'like', '%' . $search . '%');
        }

        // Get total count before pagination
        $totalRecords = $query->count();

        // Apply pagination
        $subCategory = $query->offset($start)
                            ->limit($length)
                            ->orderBy('id', 'desc')
                            ->get();

        // Prepare response in DataTable format
        return response()->json([
            'data' => $subCategory,
            'recordsTotal' => $totalRecords,
            'recordsFiltered' => $totalRecords,
        ]);
    }

    public function category()
    {
        return $this->data['category'] = Category::get();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'category' => 'required|string|max:11',
            'subCategory' => 'required|string|max:255',
        ]);

        $subCategory = new subCategory();
        $subCategory->category_id = $request->category;
        $subCategory->name = $request->subCategory;
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
        return response()->json($subCategory);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'category' => 'required|string|max:11',
            'subCategory' => 'required|string|max:255',
        ]);
        $subCategory =  subCategory::find($id);
        $subCategory->name = $request->subCategory;
        $subCategory->category_id = $request->category;
        $subCategory->save();
        if ($subCategory->save()) {
            return response()->json([
                'success' => true,
                'message' => 'Subcategory updated successfully!',
            ]);
        }
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
