<?php

namespace Database\Seeders;

use App\Models\Kategori_Mustahik;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;


class KategoriMustahik extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $json = File::get(database_path('seeders/dummy/kategori_mustahik.json'));
        $data = json_decode($json, true);

        foreach ($data as $item) {
            Kategori_Mustahik::create($item);
        }
    }
}
