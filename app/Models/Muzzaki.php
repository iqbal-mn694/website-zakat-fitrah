<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Muzzaki extends Model
{   
    protected $table = 'muzzaki';
    protected $primaryKey = 'id_muzzaki';

    protected $fillable = [
        'id_muzzaki',
        'nama_muzzaki',
        'jumlah_tanggungan',
        'keterangan',
    ];
}
