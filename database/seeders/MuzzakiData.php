<?php

namespace Database\Seeders;

use App\Models\Muzzaki;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class MuzzakiData extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $json = File::get(database_path('seeders/dummy/dummy_muzzaki.json'));
        $data = json_decode($json, true);

        foreach ($data as $item) {
            Muzzaki::create($item);
        }
    }   
}
