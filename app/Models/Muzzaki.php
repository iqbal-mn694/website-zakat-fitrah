<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Muzzaki extends Model
{   
    protected $table = 'muzzaki';
    protected $primaryKey = 'id_muzzaki';
    public $timestamps = true;

    protected $fillable = [
        'nama_muzzaki',
        'jumlah_tanggungan',
        'keterangan',
    ];
}
