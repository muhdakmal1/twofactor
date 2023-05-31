<?php

namespace App\Models;

// use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class model_cps_template extends Model
{
    // use HasFactory;
    // use SoftDeletes;

    const UPDATED_AT = null;
    const CREATED_AT = null;
    protected $table = 'cps_template';
    protected $primaryKey = 'id';
    protected $fillable = [
        'customer_id', 
        'intro_desc',
        'url_img',
        'father_name',
        'mother_name',
        'customer_name',
        'couple_name',
        'location_short',
        'date_event',
        'time_event1',
        'timedec_event1',
        'time_event2',
        'timedec_event2',
        'time_event3',
        'timedec_event3',
        'contact_person1',
        'contact_no1',
        'contact_relation1',
        'contact_person2',
        'contact_no2',
        'contact_relation2',
        'contact_person3',
        'contact_no3',
        'contact_relation3',
        'contact_person4',
        'contact_no4',
        'contact_relation4',
        'music_id',
        'googlemap_url',
        'wazemap_url',
        'google_calendar',
        'apple_calendar',
        'created_at',
        'created_by',
        'updated_at',
        'updated_by',
        'googlemap_link',
        'layoutPengantin',
        'layoutParents',
        'textJemputan',
        'textUcapan',
        'config_type'];

    public function customer()
    {
        return $this->belongsTo(model_cps_customer::class, 'customer_id', 'id');
    }

    public function music()
    {
        return $this->belongsTo(model_cps_music::class, 'music_id', 'id');
    }
}
