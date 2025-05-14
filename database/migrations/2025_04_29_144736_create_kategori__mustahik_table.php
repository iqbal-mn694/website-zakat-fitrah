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
        Schema::create('kategori_mustahik', function (Blueprint $table) {
            $table->id('id_kategori');
            $table->string('nama_kategori');
            $table->float('jumlah_hak');
            $table->timestamps();
        });

        Schema::create('aturan_zakat', function (Blueprint $table) {
            $table->id();
            $table->string('nama_daerah');
            $table->decimal('standar_beras_per_jiwa', 10, 2);
            $table->decimal('harga_beras_per_kg', 10, 2);
            $table->text('keterangan')->nullable();
            $table->timestamps();
        });

        Schema::create('mustahik__wargas', function (Blueprint $table) {
            $table->id('id_mustahik_warga');
            $table->string('nama_mustahik');
            $table->string('kategori');
            $table->float('hak');
            $table->foreignId('id_aturan_zakat')->nullable()->constrained('aturan_zakat')->onDelete('set null');
            $table->timestamps();
        });

        Schema::create('mustahik_lainnyas', function (Blueprint $table) {
            $table->id('id_mustahik_lainnya');
            $table->string('nama_mustahik');
            $table->string('kategori');
            $table->string('alamat')->nullable();
            $table->float('total_beras')->default(0);
            $table->float('total_uang')->default(0);
            $table->foreignId('id_aturan_zakat')->nullable()->constrained('aturan_zakat')->onDelete('set null');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mustahik_lainnyas');
        Schema::dropIfExists('mustahik__wargas');
        Schema::dropIfExists('aturan_zakat');
        Schema::dropIfExists('kategori_mustahik');
    }
};
