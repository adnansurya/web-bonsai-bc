<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Blockchain extends Model
{
    // Tentukan nama tabel jika berbeda dari nama model yang di-plural-kan
    protected $table = 'blockchains';

    // Tentukan kolom yang bisa diisi massal
    protected $fillable = [
        'product_id',
        'transaction_hash',
        'data_type',
    ];
}
