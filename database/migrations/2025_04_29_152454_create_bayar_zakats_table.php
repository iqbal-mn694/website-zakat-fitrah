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
        Schema::create('bayar_zakats', function (Blueprint $table) {
            $table->id('id_zakat');
            $table->string('nama_kk');
            $table->integer('jumlah_tanggungan_keluarga');
            $table->integer('jumlah_tanggungan_bayar');
            $table->enum('jenis_bayar', ['beras', 'uang']);
            $table->string('bayar_beras');
            $table->string('bayar_uang');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bayar_zakats');
    }
};
