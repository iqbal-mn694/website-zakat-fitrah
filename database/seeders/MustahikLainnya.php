<?php

namespace Database\Seeders;

use App\Models\Mustahik_Lainnya;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
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

        // Process data in chunks of 50
        $chunks = array_chunk($data, 50);
        
        foreach ($chunks as $chunk) {
            DB::beginTransaction();
            try {
                foreach ($chunk as $item) {
                    // Check if record already exists
                    $exists = DB::table('mustahik_lainnyas')->where('id_mustahik_lainnya', $item['id_mustahik_lainnya'])->exists();
                    
                    if (!$exists) {
                        // Remove 'hak' field if it exists
                        unset($item['hak']);
                        
                        // Insert the record
                        DB::table('mustahik_lainnyas')->insert($item);
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
