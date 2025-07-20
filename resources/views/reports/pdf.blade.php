<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Pemasukan Laundry</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
        }
        .header {
            text-align: center;
            margin-bottom: 30px;
        }
        .header h1 {
            margin: 0;
            font-size: 24px;
            color: #333;
        }
        .header p {
            margin: 5px 0;
            color: #666;
        }
        .summary {
            margin-bottom: 20px;
            padding: 15px;
            background-color: #f8f9fa;
            border-radius: 5px;
        }
        .summary-item {
            margin-bottom: 10px;
        }
        .summary-item strong {
            display: inline-block;
            width: 200px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f4f4f4;
        }
        .text-end {
            text-align: right;
        }
        .total-row {
            background-color: #f8f9fa;
            font-weight: bold;
        }
        .footer {
            margin-top: 30px;
            text-align: right;
            font-style: italic;
            color: #666;
        }
    </style>
</head>
<body>
    <div class="header">
        <h1>Laporan Pemasukan Laundry</h1>
        <p>Periode: {{ isset($startDate) ? \Carbon\Carbon::parse($startDate)->format('d-m-Y') : 'Semua' }} - {{ isset($endDate) ? \Carbon\Carbon::parse($endDate)->format('d-m-Y') : 'Semua' }}</p>
        <p>Dicetak pada: {{ now()->setTimezone('Asia/Jakarta')->format('d/m/Y H:i') }}</p>
    </div>

    <div class="summary">
        <table style="width: 100%; background: #f8f9fa; border-radius: 5px; margin-bottom: 20px;">
            <tr>
                <td style="font-weight: bold; width: 250px; padding: 12px 8px; font-size: 1.1em;">Total Pemasukan Periode Ini:</td>
                <td style="padding: 12px 8px; font-size: 1.2em; color: #198754; font-weight: bold;">Rp {{ number_format($periodIncome, 0, ',', '.') }}</td>
            </tr>
        </table>
    </div>

    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Tanggal</th>
                <th>Nama Pelanggan</th>
                <th>Jenis Laundry</th>
                <th class="text-end">Total Pembayaran</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($laundries as $index => $laundry)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $laundry->created_at->format('d/m/Y') }}</td>
                    <td>{{ $laundry->nama_pelanggan }}</td>
                    <td>{{ $laundry->jenis_laundry }}</td>
                    <td class="text-end">Rp {{ number_format($laundry->total_pembayaran, 0, ',', '.') }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="5" style="text-align: center;">Tidak ada data pemasukan untuk periode ini</td>
                </tr>
            @endforelse

            @if($laundries->isNotEmpty())
                <tr class="total-row">
                    <td colspan="4" class="text-end">Total:</td>
                    <td class="text-end">Rp {{ number_format($periodIncome, 0, ',', '.') }}</td>
                </tr>
            @endif
        </tbody>
    </table>

    <div class="footer">
        <p>* Laporan ini hanya mencakup transaksi dengan status pembayaran "Lunas"</p>
    </div>
</body>
</html>