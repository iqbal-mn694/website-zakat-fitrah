<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\BayarZakat;

class TambahDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Data Pengumpulan Zakat
        BayarZakat::create([
            'nama_kk' => 'Keluarga Iqbal',
            'jumlah_tanggungan_keluarga' => 4,
            'jumlah_tanggungan_bayar' => 4,
            'jenis_bayar' => 'beras',
            'bayar_beras' => '12.5',
            'bayar_uang' => '0'
        ]);

        BayarZakat::create([
            'nama_kk' => 'Keluarga Budi',
            'jumlah_tanggungan_keluarga' => 3,
            'jumlah_tanggungan_bayar' => 3,
            'jenis_bayar' => 'uang',
            'bayar_beras' => '0',
            'bayar_uang' => '105000'
        ]);

        BayarZakat::create([
            'nama_kk' => 'Keluarga Dian',
            'jumlah_tanggungan_keluarga' => 5,
            'jumlah_tanggungan_bayar' => 5,
            'jenis_bayar' => 'beras',
            'bayar_beras' => '15.0',
            'bayar_uang' => '0'
        ]);
    }
}
