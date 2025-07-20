<?php

namespace App\Http\Controllers;

use App\Models\Laundry;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $totalPemasukan = Laundry::where('status_pembayaran', 'Lunas')
            ->sum('total_pembayaran');

        $totalPelanggan = Laundry::distinct('nama_pelanggan')->count();

        return view('dashboard', compact('totalPemasukan', 'totalPelanggan'));
    }
}