<?php

// namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\model_cps_template;
use Carbon\Carbon;

class cps_template_seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        model_cps_template::insert([
            'customer_id' => 1,
            'url_img' => '/assets/img/kad/noriV2.jpeg',
            'father_name' => "OTHMAN BIN ASURA",
            'mother_name' => "NORIZAH BINTI MELAN",
            'customer_name' => "Muhamad Akmal Bin Othman",
            'couple_name' => "Wan Hasnorizan Binti Wan Musa",
            'location_short' => "Pt Bengkok, Bagan",
            'date_event' => "2022-12-26 14:00:00",
            'time_event1' => "11:00 AM",
            'timedec_event1' => "Ketibaan Tetamu",
            'time_event2' => "12:00 PM",
            'timedec_event2' => "Ketibaan Pengantin",
            'time_event3' => "16:00 PM",
            'timedec_event3' => "Bersurai",
            'contact_person1' => "Othman",
            'contact_no1' => "0137478378",
            'contact_relation1' => "Keluarga",
            'contact_person2' => "Ayah",
            'contact_no2' => "0137478378",
            'contact_relation2' => "Keluarga",
            'contact_person3' => "Father",
            'contact_no3' => "0137478378",
            'contact_relation3' => "Keluarga",
            'music_id' => 1,
            'googlemap_url' => null,
            'wazemap_url' => null,
            'created_at' => now()->toDateTimeString(),
            'created_by' => 'dev',
        ]);
    }
}
