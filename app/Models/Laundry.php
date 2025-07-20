<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Laundry extends Model
{
    protected $fillable = [
        'nama_pelanggan',
        'alamat_pelanggan',
        'nomor_hp',
        'jenis_laundry',
        'nama_barang',
        'status_laundry',
        'status_pembayaran',
        'total_pembayaran'
    ];

    protected $casts = [
        'total_pembayaran' => 'decimal:2'
    ];
}