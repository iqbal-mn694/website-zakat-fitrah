<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MustahikWarga extends Model
{
    protected $table = 'mustahik_wargas';
    protected $primaryKey = 'id_mustahik_warga';
    public $timestamps = true;
    protected $fillable = [
        'nama_mustahik',
        'kategori',
        'hak',
        'id_aturan_zakat'
    ];

    public function aturanZakat()
    {
        return $this->belongsTo(AturanZakat::class, 'id_aturan_zakat');
    }
}
