<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function category()
    {
        return view('Admin.category');
    }
    public function saveCategory(Request $request)
    {
        $category = Category::find($request->id);
        if($category){
        }else{
            $category = new Category();
        }
        $category->name = $request->categoryName;
        $category->save();
        if($category){
            return response()->json(['category successfull']);
        }
        return response()->json(['category faile']);
    }

    public function edit($id)
    {
        $category = Category::find($id);
        return $category;
    }

    public function delect($id)
    {
        $category = Category::find($id);
        $category->delete();
        if($category){
            return response()->json(['category delete successfully']);
        }
    }
}
