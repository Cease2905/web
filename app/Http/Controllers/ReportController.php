<?php

namespace App\Http\Controllers;

use App\Models\Laundry;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class ReportController extends Controller
{
    public function index(Request $request)
    {
        $query = Laundry::where('status_pembayaran', 'Lunas');

        if ($request->start_date && $request->end_date) {
            $query->whereDate('created_at', '>=', $request->start_date)
                  ->whereDate('created_at', '<=', $request->end_date);
        }

        $laundries = $query->latest()->paginate(10);
        $periodIncome = $query->sum('total_pembayaran');
        $totalIncome = Laundry::where('status_pembayaran', 'Lunas')->sum('total_pembayaran');

        return view('reports.index', compact('laundries', 'periodIncome', 'totalIncome'));
    }

    public function generatePdf(Request $request)
    {
        $query = Laundry::where('status_pembayaran', 'Lunas');

        if ($request->start_date && $request->end_date) {
            $query->whereDate('created_at', '>=', $request->start_date)
                  ->whereDate('created_at', '<=', $request->end_date);
        }

        $laundries = $query->latest()->get();
        $periodIncome = $query->sum('total_pembayaran');
        $totalIncome = Laundry::where('status_pembayaran', 'Lunas')->sum('total_pembayaran');

        $pdf = Pdf::loadView('reports.pdf', [
            'laundries' => $laundries,
            'periodIncome' => $periodIncome,
            'totalIncome' => $totalIncome,
            'startDate' => $request->start_date,
            'endDate' => $request->end_date
        ]);

        return $pdf->stream('laporan-pemasukan.pdf');
    }
}