<?php

namespace App\Http\Controllers;

use App\Models\Laundry;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Barryvdh\DomPDF\Facade\Pdf;

class LaundryController extends Controller
{
    public function index()
    {
        $laundries = Laundry::latest()->get();
        return view('laundry.index', compact('laundries'));
    }

    public function create()
    {
        return view('laundry.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_pelanggan' => 'required',
            'alamat_pelanggan' => 'required',
            'nomor_hp' => 'required',
            'jenis_laundry' => 'required|in:Satuan,Kiloan',
            'nama_barang' => 'required',
            'total_pembayaran' => 'required|numeric'
        ]);

        Laundry::create([
            'nama_pelanggan' => $request->nama_pelanggan,
            'alamat_pelanggan' => $request->alamat_pelanggan,
            'nomor_hp' => $request->nomor_hp,
            'jenis_laundry' => $request->jenis_laundry,
            'nama_barang' => $request->nama_barang,
            'status_laundry' => 'Proses',
            'status_pembayaran' => 'Belum',
            'total_pembayaran' => $request->total_pembayaran
        ]);

        return redirect()->route('laundry.index')
            ->with('success', 'Data laundry berhasil ditambahkan.');
    }

    public function edit(Laundry $laundry)
    {
        return view('laundry.edit', compact('laundry'));
    }

    public function update(Request $request, Laundry $laundry)
    {
        $request->validate([
            'nama_pelanggan' => 'required',
            'alamat_pelanggan' => 'required',
            'nomor_hp' => 'required',
            'jenis_laundry' => 'required|in:Satuan,Kiloan',
            'nama_barang' => 'required',
            'status_laundry' => 'required|in:Proses,Selesai',
            'status_pembayaran' => 'required|in:Belum,Lunas',
            'total_pembayaran' => 'required|numeric'
        ]);

        $laundry->update($request->all());

        return redirect()->route('laundry.index')
            ->with('success', 'Data laundry berhasil diperbarui.');
    }

    public function destroy(Laundry $laundry)
    {
        $laundry->delete();

        return redirect()->route('laundry.index')
            ->with('success', 'Data laundry berhasil dihapus.');
    }
}