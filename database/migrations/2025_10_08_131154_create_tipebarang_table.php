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
        Schema::create('tipebarang', function (Blueprint $table) {
            $table->id();   
            $table->string('item_name');
            $table->string('location');
            $table->string('item_status');
            $table->string('nama_orang');
            $table->string('kategori_barang');
            $table->string('warna_barang');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tipebarang');
    }
};
