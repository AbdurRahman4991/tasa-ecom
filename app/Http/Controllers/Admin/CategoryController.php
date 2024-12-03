<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
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
        return view('Admin.category');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $search = $request->get('search')['value'] ?? ''; // Get the search input
        $start = $request->get('start', 0); // Start index
        $length = $request->get('length', 10); // Records per page

        $query = Category::query();

        // Add search functionality
        if ($search) {
            $query->where('name', 'like', '%' . $search . '%');
        }

        // Get total count before pagination
        $totalRecords = $query->count();

        // Apply pagination
        $categories = $query->offset($start)->limit($length)->orderBy('id','desc')->get();

        // Prepare response in DataTable format
        return response()->json([
            'data' => $categories,
            'recordsTotal' => $totalRecords,
            'recordsFiltered' => $totalRecords,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'categoryName' => 'required|string|max:255',
        ]);

        try {
            $category = new Category();
            $category->name = $request->categoryName;
            $category->save();

            return response()->json(['success' => true, 'message' => 'Category added successfully!']);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => $e->getMessage()], 500);
        }
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // Validate the request data
        $validated = $request->validate([
            'categoryName' => 'required|string|max:255',
        ]);

        // Find the category and update the name
        $category = Category::findOrFail($id);
        $category->name = $validated['categoryName'];

        // Save and return a response
        if ($category->save()) {
            return response()->json(['success' => true]);
        }

        return response()->json(['success' => false]);
    }





    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $delete = Category::find($id);
        $delete->delete();
        return response()->json(['success' => true]);

    }
}
