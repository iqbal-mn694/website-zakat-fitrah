<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MustahikLainnya extends Model
{
    use HasFactory;

    protected $table = 'mustahik_lainnyas';
    protected $primaryKey = 'id_mustahik_lainnya';
    public $timestamps = true;
    protected $fillable = [
        'nama_mustahik',
        'kategori',
        'alamat',
        'total_beras',
        'total_uang',
        'id_aturan_zakat'
    ];

    public function aturanZakat()
    {
        return $this->belongsTo(AturanZakat::class, 'id_aturan_zakat');
    }
}
