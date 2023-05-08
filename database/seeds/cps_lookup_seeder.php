<?php

// namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\model_cps_lookup;
use Carbon\Carbon;

class cps_lookup_seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        model_cps_lookup::insert([
            'lookup_id' => '1',
            'lookup_desc' => 'Hadir',
            'created_at' => now()->toDateTimeString(),
            'created_by' => 'dev',
            'updated_at' => now()->toDateTimeString(),
            'updated_by' => 'dev',
        ]);

        model_cps_lookup::insert([
            'lookup_id' => '2',
            'lookup_desc' => 'Tidak Hadir',
            'created_at' => now()->toDateTimeString(),
            'created_by' => 'dev',
            'updated_at' => now()->toDateTimeString(),
            'updated_by' => 'dev',
        ]);

        model_cps_lookup::insert([
            'lookup_id' => '3',
            'lookup_desc' => 'Tidak Pasti',
            'created_at' => Carbon::now()->toDateTimeString(),
            'created_by' => 'dev',
            'updated_at' => Carbon::now()->toDateTimeString(),
            'updated_by' => 'dev',
        ]);
    }
}
