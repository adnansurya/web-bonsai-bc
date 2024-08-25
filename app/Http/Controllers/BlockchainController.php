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
            'hash' => 'required|string',
            'type' => 'required|string',
        ]);

        // Simpan data ke dalam tabel blockchains
        $blockchain = new Blockchain();
        $blockchain->product_id = 1; // Anda dapat mengganti dengan nilai yang sesuai
        $blockchain->transaction_hash = $request->hash;
        $blockchain->data_type = $request->type;
        $blockchain->save();

        return response()->json(['success' => true, 'message' => 'Data blockchain berhasil ditambahkan']);
    }
}
