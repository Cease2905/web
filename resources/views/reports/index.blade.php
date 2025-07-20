<x-app-layout>
    <x-slot name="header">
        <div class="d-flex justify-content-between align-items-center">
            <h2 class="h4 mb-0">Laporan Pemasukan</h2>
            <a href="#" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exportPdfModal">
                <i class="bi bi-file-pdf"></i> Export PDF
            </a>

            <!-- Modal Export PDF -->
            <div class="modal fade" id="exportPdfModal" tabindex="-1" aria-labelledby="exportPdfModalLabel" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <form action="{{ route('reports.pdf') }}" method="GET" target="_blank">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exportPdfModalLabel">Export PDF Berdasarkan Tanggal</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                      <div class="mb-3">
                        <label for="pdf_start_date" class="form-label">Tanggal Mulai</label>
                        <input type="date" class="form-control" id="pdf_start_date" name="start_date" required>
                      </div>
                      <div class="mb-3">
                        <label for="pdf_end_date" class="form-label">Tanggal Selesai</label>
                        <input type="date" class="form-control" id="pdf_end_date" name="end_date" required>
                      </div>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                      <button type="submit" class="btn btn-danger">Export PDF</button>
                    </div>
                  </form>
                </div>
              </div>
            </div>
        </div>
    </x-slot>

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card mb-4">
                    <div class="card-body">
                        <form action="{{ route('reports.index') }}" method="GET" class="row g-3">
                            <div class="col-md-4">
                                <label for="start_date" class="form-label">Tanggal Mulai</label>
                                <input type="date" class="form-control" id="start_date" name="start_date" 
                                    value="{{ request('start_date') }}">
                            </div>
                            <div class="col-md-4">
                                <label for="end_date" class="form-label">Tanggal Selesai</label>
                                <input type="date" class="form-control" id="end_date" name="end_date" 
                                    value="{{ request('end_date') }}">
                            </div>
                            <div class="col-md-4 d-flex align-items-end">
                                <button type="submit" class="btn btn-primary me-2">
                                    <i class="bi bi-search"></i> Filter
                                </button>
                                <a href="{{ route('reports.index') }}" class="btn btn-secondary">
                                    <i class="bi bi-x-circle"></i> Reset
                                </a>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="card mb-4">
                    <div class="card-body">
                        <div class="row g-4">
                            <div class="col-md-6">
                                <div class="border rounded p-3">
                                    <h5 class="card-title">Total Pemasukan Keseluruhan</h5>
                                    <h3 class="text-primary mb-0">Rp {{ number_format($totalIncome, 0, ',', '.') }}</h3>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="border rounded p-3">
                                    <h5 class="card-title">Total Pemasukan Periode Ini</h5>
                                    <h3 class="text-success mb-0">Rp {{ number_format($periodIncome, 0, ',', '.') }}</h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>Tanggal</th>
                                        <th>Nama Pelanggan</th>
                                        <th>Jenis Laundry</th>
                                        <th>Status</th>
                                        <th class="text-end">Total Pembayaran</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($laundries as $laundry)
                                        <tr>
                                            <td>{{ $laundry->created_at->format('d/m/Y') }}</td>
                                            <td>{{ $laundry->nama_pelanggan }}</td>
                                            <td>{{ $laundry->jenis_laundry }}</td>
                                            <td>
                                                <span class="badge bg-success">Lunas</span>
                                            </td>
                                            <td class="text-end">Rp {{ number_format($laundry->total_pembayaran, 0, ',', '.') }}</td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="5" class="text-center py-3">
                                                Tidak ada data pemasukan untuk periode ini
                                            </td>
                                        </tr>
                                    @endforelse
                                </tbody>
                                @if($laundries->isNotEmpty())
                                    <tfoot>
                                        <tr class="table-primary">
                                            <td colspan="4" class="text-end fw-bold">Total:</td>
                                            <td class="text-end fw-bold">Rp {{ number_format($periodIncome, 0, ',', '.') }}</td>
                                        </tr>
                                    </tfoot>
                                @endif
                            </table>
                        </div>

                        <div class="mt-4">
                            {{ $laundries->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>