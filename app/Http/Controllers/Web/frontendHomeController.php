<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class frontendHomeController extends Controller
{
    public function adminRegister()
    {
        return view('auth.admin.register');
    }

    public function vendorRegister()
    {
        return view('auth.vendor.register');
    }
    public function productPage()
    {
        return view('product');
    }

    public function productDetails()
    {
        return view('product_details');
    }
}
