<?php

namespace App\Http\Controllers\Admin;

use DB;
use DataTables;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\subCategory;
class ProductController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function product()
    {
        $categories = Category::get();

        $query = DB::table('products');
        return view('Admin.product', compact('categories'));
    }

    public function index() {
        $productList = Product::query();
        return DataTables::eloquent($productList)
                    ->toJson();
    }
    public function dependencyCategory(Request $request)
    {
        $subcategories = Subcategory::where('category_id', $request->category_id)->get();
        return response()->json($subcategories);
    }

    public function store(Request $request)
    {
        // Validate the incoming request
        // $request->validate([
        //     'category' => 'required|exists:categories,id',
        //     'subcategory' => 'required|exists:sub_categories,id',
        //     'title' => 'required|string|max:255',
        //     'brand' => 'required|string|max:255',
        //     'price' => 'required|numeric|min:0',
        //     'color' => 'nullable|string|max:50',
        //     'size' => 'nullable|string|max:50',
        //     'material' => 'nullable|string|max:255',
        //     'discountPrice' => 'nullable|numeric|min:0',
        //     'quantity' => 'required|integer|min:1',
        //     'features' => 'nullable|array',
        //     'features.*' => 'string|max:255',
        //     'description' => 'nullable|string',
        // ]);

        // Collect features
        $features = $request->features ?? [];
        $encodedFeatures = json_encode($features);

        // Create the product
        $createProduct = new Product();
        $createProduct->user_id = auth()->id();
        $createProduct->category_id = $request->category;
        $createProduct->sub_category_id = $request->subcategory;
        $createProduct->title = $request->title;
        $createProduct->brand = $request->brand;
        $createProduct->price = $request->price;
        $createProduct->color = $request->color;
        $createProduct->size = $request->size;
        $createProduct->material = $request->material; // Corrected the typo "meteril" to "material"
        $createProduct->discount = $request->discountPrice;
        $createProduct->quantity = $request->quantity;
        $createProduct->featured = $encodedFeatures;
        $createProduct->description = $request->description;

        // Save the product
        $createProduct->save();

        return response()->json([
            'message' => 'Product created successfully!',
            'product' => $createProduct,
        ], 201);
    }


    public function edit($id)
    {
        $product = Product::with(['category', 'subCategory'])->find($id);

        if ($product) {
            // Decode the 'featured' field
            $product->featured = json_decode($product->featured, true);

            return response()->json(['success' => true, 'data' => $product]);
        }

        return response()->json(['success' => false, 'message' => 'Product not found'], 404);
    }




    public function update(Request $request)
    {
        $product = Product::find($request->id);
        if ($product) {
            $product->update($request->all());
            return response()->json(['success' => true]);
        }
        return response()->json(['success' => false]);
    }


}
