<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\BayarZakat;
use App\Models\MustahikWarga;
use App\Models\MustahikLainnya;
use App\Models\KategoriMustahik;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            UserSeeder::class,
            MuzzakiData::class,
            KategoriMustahikSeeder::class,
            AturanZakatSeeder::class,
            MustahikLainnyaDataSeeder::class,
            MustahikWargaDataSeeder::class,
            BayarZakatDataSeeder::class,
            TambahDataSeeder::class,
        ]);

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

        // Data Mustahik Warga
        MustahikWarga::create([
            'nama_mustahik' => 'Ahmad',
            'kategori' => 'Fakir',
            'hak' => 10.5
        ]);

        MustahikWarga::create([
            'nama_mustahik' => 'Budi',
            'kategori' => 'Miskin',
            'hak' => 7.5
        ]);

        // Data Mustahik Lainnya
        MustahikLainnya::create([
            'nama_mustahik' => 'Pesantren Al-Hidayah',
            'kategori' => 'Fisabilillah',
            'alamat' => 'Jl. Raya No. 123',
            'total_beras' => 25.0,
            'total_uang' => 0
        ]);
    }
}
