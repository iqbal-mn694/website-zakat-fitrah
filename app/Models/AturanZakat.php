<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AturanZakat extends Model
{
    protected $table = 'aturan_zakat';
    
    protected $fillable = [
        'nama_daerah',
        'standar_beras_per_jiwa',
        'harga_beras_per_kg',
        'keterangan'
    ];

    // Relasi dengan mustahik warga
    public function mustahikWarga()
    {
        return $this->hasMany(MustahikWarga::class, 'id_aturan_zakat');
    }

    // Relasi dengan mustahik lainnya
    public function mustahikLainnya()
    {
        return $this->hasMany(MustahikLainnya::class, 'id_aturan_zakat');
    }

    // Method untuk menghitung hak beras berdasarkan jumlah jiwa
    public function hitungHakBeras($jumlahJiwa)
    {
        return $jumlahJiwa * $this->standar_beras_per_jiwa;
    }

    // Method untuk menghitung hak uang berdasarkan jumlah jiwa
    public function hitungHakUang($jumlahJiwa)
    {
        return $this->hitungHakBeras($jumlahJiwa) * $this->harga_beras_per_kg;
    }
} 