<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Sale;
use App\Models\Product;
use App\Http\Requests\StoreSaleRequest;
use App\Http\Requests\UpdateSaleRequest;

class SaleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashboard.sale.index',[
            'sales' => Sale::latest('date')->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.sale.create',[
            'products' => Product::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreSaleRequest $request)
    {
        $validated = $request->validate([
            'product_id' => 'required',
            'quantity' => 'required',
            'total_price' => 'required',
            'date' => 'required',
        ]);

        $validated['date'] = Carbon::createFromFormat('m/d/Y', $validated['date'])->format('Y-m-d');

        $validated['total_price'] = str_replace(['Rp', '.'], '', $validated['total_price']);

        Sale::create($validated);

        return redirect('/dashboard/sale')->with('success', 'Data Penjualan berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Sale $sale)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Sale $sale)
    {
        return view('dashboard.sale.edit', [
            'sale' => $sale,
            'products' => Product::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateSaleRequest $request, Sale $sale)
    {
        $validated = $request->validate([
            'product_id' => 'required',
            'quantity' => 'required',
            'total_price' => 'required',
            'date' => 'required',
        ]);
        $validated['date'] = Carbon::createFromFormat('m/d/Y', $validated['date'])->format('Y-m-d');
        $validated['total_price'] = str_replace(['Rp', '.'], '', $validated['total_price']);

        Sale::where('id', $sale->id)->update($validated);
        return redirect('/dashboard/sale')->with('success-edit', 'Data Penjualan berhasil diubah!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Sale $sale)
    {
        Sale::destroy($sale->id);

        return redirect('/dashboard/sale')->with('delete', 'Data Penjualan telah berhasil dihapus!');

    }
}
