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
        Schema::create('suppliers', function (Blueprint $table) {
            $table->id();
            $table->string('Kode_supplier')->unique();
            $table->string('Nama_supplier');
            $table->string('Nomor_telepon');
            $table->string('Nama_produk_supplier');
            $table->string('Informasi_produk'); // 
            $table->timestamps();
        });
        
      
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('suppliers');
    }
};
