<?php

namespace App\Models;

// use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class model_cps_music extends Model
{
    // use HasFactory;
    // use SoftDeletes;

    const UPDATED_AT = null;
    const CREATED_AT = null;
    protected $table = 'cps_music';
    protected $primaryKey = 'id';
    protected $fillable = ['music_title', 'music_author', 'music_path', 'created_at', 'created_by', 'updated_at', 'updated_by'];

    public function template()
    {
        return $this->belongsTo(model_cps_template::class, 'id', 'music_id');
    }
}
