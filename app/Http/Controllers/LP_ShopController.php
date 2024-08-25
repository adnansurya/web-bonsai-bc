<?php

namespace App\Http\Controllers;

use App\Models\Sale;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LP_ShopController extends Controller
{
    public function index(Request $request)
    {


        // Query produk berdasarkan filter dan sortir yang dipilih
        $products = Product::filter($request->only(['search', 'category', 'min_price', 'max_price']))
        ->paginate(5)
        ->withQueryString();

        // Produk terlaris
        $topProducts = Sale::select('product_id', DB::raw('SUM(quantity) as total_quantity'))
        ->groupBy('product_id')
        ->orderBy('total_quantity', 'desc')
        ->take(5)
        ->get();
        
        // Mengambil data kategori dan jumlah produk yang terkait
        $categories = Category::withCount('product')->get();
        

        return view('LP.shop',[
            'products' => $products,
            'topProducts' => $topProducts,
            'categories' => $categories
        ]);
    }

    public function show(Product $product) {

        $category = $product->category;
        // Mendapatkan 5 produk terkait dengan kategori yang sama, kecuali produk yang sedang dilihat
        $relatedProducts = Product::where('category_id', $category->id)
            ->where('id', '!=', $product->id) // Jangan termasuk produk yang sedang dilihat
            ->take(5)
            ->get();

        return view('LP.product-detail', [
            'product' => $product,
            'relatedProducts' => $relatedProducts
        ]);
    }

    
}
