<x-app-layout>
    <x-slot name="header">
        <div class="d-flex justify-content-between align-items-center">
            <h2 class="h4 mb-0">Data Laundry</h2>
            <a href="{{ route('laundry.create') }}" class="btn btn-primary">
                <i class="bi bi-plus-lg"></i> Tambah Data
            </a>
        </div>
    </x-slot>

    <div class="container">
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Pelanggan</th>
                                <th>Alamat</th>
                                <th>No. HP</th>
                                <th>Jenis</th>
                                <th>Barang</th>
                                <th>Status Laundry</th>
                                <th>Status Pembayaran</th>
                                <th>Total</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($laundries as $laundry)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $laundry->nama_pelanggan }}</td>
                                    <td>{{ $laundry->alamat_pelanggan }}</td>
                                    <td>{{ $laundry->nomor_hp }}</td>
                                    <td>{{ $laundry->jenis_laundry }}</td>
                                    <td>{{ $laundry->nama_barang }}</td>
                                    <td>
                                        <span class="badge {{ $laundry->status_laundry == 'Selesai' ? 'bg-success' : 'bg-warning' }}">
                                            {{ $laundry->status_laundry }}
                                        </span>
                                    </td>
                                    <td>
                                        <span class="badge {{ $laundry->status_pembayaran == 'Lunas' ? 'bg-success' : 'bg-danger' }}">
                                            {{ $laundry->status_pembayaran }}
                                        </span>
                                    </td>
                                    <td>Rp {{ number_format($laundry->total_pembayaran, 0, ',', '.') }}</td>
                                    <td>
                                        <div class="btn-group" role="group">
                                            <a href="{{ route('laundry.edit', $laundry) }}" class="btn btn-sm btn-warning">
                                                <i class="bi bi-pencil"></i>
                                            </a>
                                            <form action="{{ route('laundry.destroy', $laundry) }}" method="POST" class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Yakin ingin menghapus data ini?')">
                                                    <i class="bi bi-trash"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="10" class="text-center">Tidak ada data</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>