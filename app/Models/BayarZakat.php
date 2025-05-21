<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BayarZakat extends Model
{   
    protected $table = 'bayar_zakats';
    protected $primaryKey = 'id_zakat';
    public $timestamps = true;

    protected $fillable = [
        'nama_kk',      
        'jumlah_tanggungan_keluarga',
        'jumlah_tanggungan_bayar',
        'jenis_bayar',
        'bayar_beras',
        'bayar_uang',
    ];

    protected $casts = [
        'jenis_bayar' => 'string',
        'jumlah_tanggungan_keluarga' => 'integer',
        'jumlah_tanggungan_bayar' => 'integer',
    ];

    public function kategori()
    {
        return $this->belongsTo(KategoriMustahik::class, 'id_kategori', 'id_kategori');
    }
}
