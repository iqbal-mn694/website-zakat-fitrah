<?php

namespace Database\Seeders;

use App\Models\BayarZakat;
use App\Models\Muzzaki;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;

class BayarZakatDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = Muzzaki::pluck('nama_muzzaki');


        echo($data);
        foreach ($data as $item) {
            BayarZakat::create([
                'nama_kk' => $item
            ]);
        }
    }
}
