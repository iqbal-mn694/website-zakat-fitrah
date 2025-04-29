<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kategori_Mustahik extends Model
{
    protected $primaryKey = 'id_kategori';

    protected $fillable = [
        'id_kategori',
        'nama_kategori',
        'hak',
    ];
}
