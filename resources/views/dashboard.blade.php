<x-app-layout>
    <x-slot name="header">
        <h2 class="h4 mb-0">Dashboard</h2>
    </x-slot>

    <div class="container">
        <div class="row">
            <div class="col-md-6 mb-4">
                <div class="card h-100">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div class="flex-shrink-0 me-3">
                                <i class="bi bi-cash text-success" style="font-size: 2.5rem;"></i>
                            </div>
                            <div>
                                <h6 class="card-subtitle mb-2 text-muted">Total Pemasukan</h6>
                                <h2 class="card-title mb-0">Rp {{ number_format($totalPemasukan, 0, ',', '.') }}</h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-6 mb-4">
                <div class="card h-100">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div class="flex-shrink-0 me-3">
                                <i class="bi bi-people text-primary" style="font-size: 2.5rem;"></i>
                            </div>
                            <div>
                                <h6 class="card-subtitle mb-2 text-muted">Total Pelanggan</h6>
                                <h2 class="card-title mb-0">{{ number_format($totalPelanggan, 0, ',', '.') }}</h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title mb-0">Daftar Harga Laundry</h5>
                    </div>
                    <div class="card-body">
                        <h6 class="mb-3">Cuci Kiloan:</h6>
                        <div class="table-responsive mb-4">
                            <table class="table table-bordered">
                                <thead class="table-light">
                                    <tr>
                                        <th>Jenis Layanan</th>
                                        <th>Harga per Kilo</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Cuci Basah</td>
                                        <td>Rp 3.000</td>
                                    </tr>
                                    <tr>
                                        <td>Cuci Kering</td>
                                        <td>Rp 4.000</td>
                                    </tr>
                                    <tr>
                                        <td>Setrika</td>
                                        <td>Rp 5.000</td>
                                    </tr>
                                    <tr>
                                        <td>Cuci + Setrika (Lengkap)</td>
                                        <td>Rp 8.000</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                        <h6 class="mb-3">Cuci Satuan:</h6>
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead class="table-light">
                                    <tr>
                                        <th>Jenis Pakaian</th>
                                        <th>Harga per Pcs</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Bed Cover</td>
                                        <td>Rp 25.000</td>
                                    </tr>
                                    <tr>
                                        <td>Selimut</td>
                                        <td>Rp 15.000</td>
                                    </tr>
                                    <tr>
                                        <td>Sprei</td>
                                        <td>Rp 10.000</td>
                                    </tr>
                                    <tr>
                                        <td>Boneka</td>
                                        <td>Rp 10.000</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
