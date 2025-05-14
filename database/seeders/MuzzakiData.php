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
        
        // Process data in chunks of 100
        $chunks = array_chunk($data, 100);
        
        foreach ($chunks as $chunk) {
            DB::beginTransaction();
            try {
                foreach ($chunk as $item) {
                    // Check if record already exists
                    $exists = Muzzaki::where('id_muzzaki', $item['id_muzzaki'])->exists();
                    
                    if (!$exists) {
                        Muzzaki::create($item);
                    }
                }
                DB::commit();
            } catch (\Exception $e) {
                DB::rollBack();
                throw $e;
            }
        }
    }   
}
