<?php

// namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\model_cps_customer;
use Carbon\Carbon;

class cps_customer_seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        model_cps_customer::insert([
            'name' => 'akmal',
            'email' => 'muhdakmalothman@gmail.com',
            'url' => 'http://clickpixelstudio.dev.com/akmal',
            'basic' => true,
            'advanced' => false,
            'is_paid' => true,
            'expired_at' => now()->addYear(),
            'created_at' => now()->toDateTimeString(),
            'created_by' => 'dev',
            'updated_at' => now()->toDateTimeString(),
            'updated_by' => 'dev',
        ]);
    }
}
