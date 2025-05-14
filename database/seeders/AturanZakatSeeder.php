<?php

namespace Database\Seeders;

use App\Models\AturanZakat;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AturanZakatSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Data aturan zakat untuk beberapa daerah
        $daerah = [
            [
                'nama_daerah' => 'Desa Sukamaju',
                'standar_beras_per_jiwa' => 2.5,
                'harga_beras_per_kg' => 15000,
                'keterangan' => 'Standar beras per jiwa untuk Desa Sukamaju'
            ],
            [
                'nama_daerah' => 'Desa Sukamulya',
                'standar_beras_per_jiwa' => 2.7,
                'harga_beras_per_kg' => 15500,
                'keterangan' => 'Standar beras per jiwa untuk Desa Sukamulya'
            ],
            [
                'nama_daerah' => 'Desa Sukasari',
                'standar_beras_per_jiwa' => 2.3,
                'harga_beras_per_kg' => 14500,
                'keterangan' => 'Standar beras per jiwa untuk Desa Sukasari'
            ],
            [
                'nama_daerah' => 'Desa Sukabakti',
                'standar_beras_per_jiwa' => 2.6,
                'harga_beras_per_kg' => 15200,
                'keterangan' => 'Standar beras per jiwa untuk Desa Sukabakti'
            ],
            [
                'nama_daerah' => 'Desa Sukamakmur',
                'standar_beras_per_jiwa' => 2.4,
                'harga_beras_per_kg' => 14800,
                'keterangan' => 'Standar beras per jiwa untuk Desa Sukamakmur'
            ]
        ];

        foreach ($daerah as $item) {
            AturanZakat::create($item);
        }
    }
} 