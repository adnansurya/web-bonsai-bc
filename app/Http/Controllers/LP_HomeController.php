<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class LP_HomeController extends Controller
{
    public function index()
    {
        return view('LP.home' ,[
            'products' => Product::all(),
            'categories' => Category::all(),
        ]);
    }
}
