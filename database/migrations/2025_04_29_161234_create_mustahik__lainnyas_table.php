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
        Schema::create('mustahik__lainnyas', function (Blueprint $table) {
            $table->id('id_mustahik_lainnya');
            $table->string('nama_mustahik');
            $table->string('kategori');
            $table->string('hak');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mustahik__lainnyas');
    }
};
