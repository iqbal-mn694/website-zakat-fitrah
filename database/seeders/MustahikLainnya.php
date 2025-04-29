<?php

namespace Database\Seeders;

use App\Models\Mustahik_Lainnya;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;

class MustahikLainnya extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $json = File::get(database_path('seeders/dummy/mustahik_lainnya.json'));
        $data = json_decode($json, true);

        foreach ($data as $item) {
            Mustahik_Lainnya::create($item);
        }
    }
}
