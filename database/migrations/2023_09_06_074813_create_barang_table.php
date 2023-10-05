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
        Schema::create('barang', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nama_barang');
            $table->unsignedBigInteger('produk_id'); 
            $table->string('kode');           
            $table->integer('stok');
            $table->double('harga');
            $table->string('jenis');
            $table->timestamps();
            
            // $table->foreign('produk_id')->references('id')->on('produk');
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
