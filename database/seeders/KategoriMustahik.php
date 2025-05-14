<?php

namespace Database\Seeders;

use App\Models\Kategori_Mustahik;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
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
        
        DB::beginTransaction();
        try {
            foreach ($data as $item) {
                // Check if record already exists
                $exists = Kategori_Mustahik::where('id_kategori', $item['id_kategori'])->exists();
                
                if (!$exists) {
                    Kategori_Mustahik::create($item);
                }
            }
            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            throw $e;
        }
    }
}
