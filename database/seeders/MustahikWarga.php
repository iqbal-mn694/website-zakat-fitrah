<?php

namespace Database\Seeders;

use App\Models\Mustahik_Warga;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;
class MustahikWarga extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $json = File::get(database_path('seeders/dummy/mustahik_warga.json'));
        $data = json_decode($json, true);

        foreach ($data as $item) {
            Mustahik_Warga::create($item);
        }
    }
}
