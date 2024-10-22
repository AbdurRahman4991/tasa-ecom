<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

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

    public function category()
    {
        return view('Admin.category');
    }

    public function product()
    {
        return view('Admin.product');
    }

    public function order()
    {
        return view('Admin.order');
    }


}
