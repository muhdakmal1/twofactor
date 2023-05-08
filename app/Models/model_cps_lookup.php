<?php

namespace App\Models;

// use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class model_cps_lookup extends Model
{
    // use HasFactory;
    // use SoftDeletes;

    const UPDATED_AT = null;
    const CREATED_AT = null;
    protected $table = 'cps_lookup';
    protected $primaryKey = 'id';
    protected $fillable = ['id', 'lookup_id', 'lookup_desc', 'created_date', 'created_by', 'updated_date', 'updated_by'];
}
