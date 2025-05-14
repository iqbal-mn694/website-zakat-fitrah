<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MustahikLainnya extends Model
{
    protected $table = 'mustahik_lainnya';
    
    protected $fillable = [
        'nama_mustahik',
        'kategori',
        'hak',
        'total_beras',
        'total_uang'
    ];
}
