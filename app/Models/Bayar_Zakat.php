<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Bayar_Zakat extends Model
{   
    protected $table = 'bayar_zakats';
    protected $primaryKey = 'id_zakat';

    protected $fillable = [
        'id_zakat',
        'nama_kk',
        'jumlah_tanggungan_keluarga',
        'jumlah_tanggungan_bayar',
        'jenis_bayar',
        'bayar_beras',
        'bayar_uang'
    ];

    public function muzzaki()
    {
        return $this->belongsTo(Muzzaki::class, 'id_muzzaki', 'id_muzzaki');
    }

    public function kategori()
    {
        return $this->belongsTo(Kategori_Mustahik::class, 'id_kategori', 'id_kategori');
    }
}
