<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('laundries', function (Blueprint $table) {
            $table->id();
            $table->string('nama_pelanggan');
            $table->text('alamat_pelanggan');
            $table->string('nomor_hp');
            $table->enum('jenis_laundry', ['Satuan', 'Kiloan']);
            $table->string('nama_barang');
            $table->enum('status_laundry', ['Proses', 'Selesai']);
            $table->enum('status_pembayaran', ['Belum', 'Lunas']);
            $table->decimal('total_pembayaran', 10, 2);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('laundries');
    }
};