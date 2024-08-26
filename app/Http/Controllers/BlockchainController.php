<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blockchain;

class BlockchainController extends Controller
{
    public function store(Request $request)
    {
        // Validasi parameter
        $request->validate([
            'plant_id' => 'required|integer',
            'hash' => 'required|string',
            'type' => 'required|string',
        ]);

        // Simpan data ke dalam tabel blockchains
        $blockchain = new Blockchain();
        $blockchain->product_id = $request->plant_id; // Menyimpan plant_id ke dalam product_id
        $blockchain->transaction_hash = $request->hash;
        $blockchain->data_type = $request->type;
        $blockchain->save();

        return response()->json(['success' => true, 'message' => 'Data blockchain berhasil ditambahkan']);
    }

    public function getLatestByType($product_id)
    {
        // Ambil data terbaru dengan type 'image'
        $imageData = Blockchain::where('product_id', $product_id)
                                ->where('data_type', 'image')
                                ->latest()
                                ->first();

        // Ambil data terbaru dengan type 'csv'
        $csvData = Blockchain::where('product_id', $product_id)
                              ->where('data_type', 'csv')
                              ->latest()
                              ->first();

        // Kembalikan hasil dalam bentuk JSON
        return response()->json([
            'latest_image' => $imageData,
            'latest_csv' => $csvData,
        ]);
    }
}
