<?php

namespace Database\Seeders;

use App\Models\MustahikWarga;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;

class MustahikWargaDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $json = File::get(database_path('seeders/dummy/mustahik_warga.json'));
        $data = json_decode($json, true);

        foreach ($data as $item) {
            MustahikWarga::create($item);
        }


    }
}
