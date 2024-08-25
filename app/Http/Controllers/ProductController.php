<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashboard.product.index',[
            'products' => Product::latest()->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.product.create' ,[
            'categories' => Category::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProductRequest $request)
    {
        $validated = $request->validate([
            'name' =>'required',
            'description' =>'required',
            'price' =>'required',
            'category_id' =>'required',
            'stock' =>'required',
            'image' =>'',
        ]);

        if($request->file('image')) {
            $validated['image'] = $request->file('image')->store('produk-images');
        }

        $validated['price'] = str_replace(['Rp', '.'], '', $validated['price']);



        Product::create($validated);
        return redirect('/dashboard/product')->with('success', 'Produk telah berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        return view('dashboard.product.edit', [
            'product' => $product,
            'categories' => Category::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProductRequest $request, Product $product)
    {
        $validated = $request->validate([
            'name' =>'required',
            'description' =>'required',
            'price' =>'required',
            'category_id' =>'required',
            'stock' =>'required',
            'image' =>'',
        ]);

        if($request->file('image')) {
            if($request->oldImage) {
                Storage::delete($request->oldImage);
            }
            $validated['image'] = $request->file('image')->store('produk-images');
        }

        $validated['price'] = str_replace(['Rp', '.'], '', $validated['price']);

        Product::where('id',$product->id)->update($validated);
        return redirect('/dashboard/product')->with('success-edit', 'Produk telah berhasil diperbarui!');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        Product::destroy($product->id);

        return redirect('/dashboard/product')->with('delete', 'Produk telah berhasil dihapus!');

    }
}
