<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class KategoriMustahik extends Model
{
    protected $table = 'kategori_mustahik';
    protected $primaryKey = 'id_kategori';
    public $timestamps = true;
    protected $fillable = [
        'nama_kategori',
        'jumlah_hak'
    ];
}
