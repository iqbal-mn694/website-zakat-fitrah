<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Mustahik_Warga extends Model
{
    // protected $table = 'mustahik__wargas';
    protected $primaryKey = 'id_mustahik_warga';
    protected $fillable = [
        'id_mustahik_warga',
        'nama_mustahik',
        'kategori',
        'hak',
    ];
}
