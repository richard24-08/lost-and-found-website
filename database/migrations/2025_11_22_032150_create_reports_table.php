<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('reports', function (Blueprint $table) {
            $table->id();

            $table->string('item_name'); // nama barang
            $table->string('reporter_name'); // nama pelapor
            $table->string('finder_name')->nullable(); // ⬅️ TAMBAH ->nullable() DI SINI
            $table->string('location'); // lokasi ditemukan/dilaporkan
            $table->string('last_seen');
            $table->dateTime('time_lost')->nullable();
            $table->dateTime('time_found')->nullable();

            $table->text('description'); // deskripsi barang
            $table->string('category'); // kategori barang
            $table->string('brand'); // merk barang
            $table->string('size'); // ukuran barang
            $table->string('color'); // warna barang

            $table->string('report_type')->default('lost'); 
            // found = barang ditemukan
            // lost = kehilangan barang
            $table->string('image_path')->nullable(); // path gambar

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reports');
    }
};