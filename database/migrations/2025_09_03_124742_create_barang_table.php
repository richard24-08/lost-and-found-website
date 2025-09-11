<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * beberapa table ditambahkan hanya untuk sementara (siapatau dipakai)
     */
    public function up(): void
    {
        Schema::create('barang', function (Blueprint $table) {
            $table->id();   
            $table->string('item_name');
            $table->string('location');
            $table->time('time');
            $table->string('category');
            $table->string('brand');
            $table->string('size');
            $table->string('color');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('barang');
    }
};
