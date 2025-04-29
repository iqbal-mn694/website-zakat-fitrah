<?php

namespace Database\Seeders;

use App\Models\Bayar_Zakat;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;

class BayarZakat extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $json = File::get(database_path('seeders/dummy/bayarzakat.json'));
        $data = json_decode($json, true);

        foreach ($data as $item) {
            Bayar_Zakat::create($item);
        }
    }
}
