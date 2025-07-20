<x-app-layout>
    <x-slot name="header">
        <div class="d-flex justify-content-between align-items-center">
            <h2 class="h4 mb-0">Edit Data Laundry</h2>
            <a href="{{ route('laundry.index') }}" class="btn btn-secondary">
                <i class="bi bi-arrow-left"></i> Kembali
            </a>
        </div>
    </x-slot>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('laundry.update', $laundry) }}" method="POST">
                            @csrf
                            @method('PUT')

                            <div class="mb-3">
                                <label for="nama_pelanggan" class="form-label">Nama Pelanggan</label>
                                <input type="text" class="form-control @error('nama_pelanggan') is-invalid @enderror" 
                                    id="nama_pelanggan" name="nama_pelanggan" value="{{ old('nama_pelanggan', $laundry->nama_pelanggan) }}" required>
                                @error('nama_pelanggan')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="alamat_pelanggan" class="form-label">Alamat Pelanggan</label>
                                <textarea class="form-control @error('alamat_pelanggan') is-invalid @enderror" 
                                    id="alamat_pelanggan" name="alamat_pelanggan" rows="3" required>{{ old('alamat_pelanggan', $laundry->alamat_pelanggan) }}</textarea>
                                @error('alamat_pelanggan')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="nomor_hp" class="form-label">Nomor HP</label>
                                <input type="text" class="form-control @error('nomor_hp') is-invalid @enderror" 
                                    id="nomor_hp" name="nomor_hp" value="{{ old('nomor_hp', $laundry->nomor_hp) }}" required>
                                @error('nomor_hp')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="jenis_laundry" class="form-label">Jenis Laundry</label>
                                <select class="form-select @error('jenis_laundry') is-invalid @enderror" 
                                    id="jenis_laundry" name="jenis_laundry" required>
                                    <option value="">Pilih Jenis Laundry</option>
                                    <option value="Kiloan" {{ old('jenis_laundry', $laundry->jenis_laundry) == 'Kiloan' ? 'selected' : '' }}>Kiloan</option>
                                    <option value="Satuan" {{ old('jenis_laundry', $laundry->jenis_laundry) == 'Satuan' ? 'selected' : '' }}>Satuan</option>
                                </select>
                                @error('jenis_laundry')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="nama_barang" class="form-label">Nama Barang</label>
                                <input type="text" class="form-control @error('nama_barang') is-invalid @enderror" 
                                    id="nama_barang" name="nama_barang" value="{{ old('nama_barang', $laundry->nama_barang) }}" required>
                                @error('nama_barang')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="status_laundry" class="form-label">Status Laundry</label>
                                <select class="form-select @error('status_laundry') is-invalid @enderror" 
                                    id="status_laundry" name="status_laundry" required>
                                    <option value="Proses" {{ old('status_laundry', $laundry->status_laundry) == 'Proses' ? 'selected' : '' }}>Proses</option>
                                    <option value="Selesai" {{ old('status_laundry', $laundry->status_laundry) == 'Selesai' ? 'selected' : '' }}>Selesai</option>
                                </select>
                                @error('status_laundry')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="status_pembayaran" class="form-label">Status Pembayaran</label>
                                <select class="form-select @error('status_pembayaran') is-invalid @enderror" 
                                    id="status_pembayaran" name="status_pembayaran" required>
                                    <option value="Belum" {{ old('status_pembayaran', $laundry->status_pembayaran) == 'Belum' ? 'selected' : '' }}>Belum</option>
                                    <option value="Lunas" {{ old('status_pembayaran', $laundry->status_pembayaran) == 'Lunas' ? 'selected' : '' }}>Lunas</option>
                                </select>
                                @error('status_pembayaran')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="total_pembayaran" class="form-label">Total Pembayaran</label>
                                <div class="input-group">
                                    <span class="input-group-text">Rp</span>
                                    <input type="number" class="form-control @error('total_pembayaran') is-invalid @enderror" 
                                        id="total_pembayaran" name="total_pembayaran" value="{{ old('total_pembayaran', $laundry->total_pembayaran) }}" required>
                                </div>
                                @error('total_pembayaran')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="d-grid">
                                <button type="submit" class="btn btn-primary">
                                    <i class="bi bi-save"></i> Simpan Perubahan
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>