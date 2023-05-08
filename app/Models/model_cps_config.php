<?php

namespace App\Models;

// use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class model_cps_config extends Model
{
    // use HasFactory;
    // use SoftDeletes;

    protected $table = 'cps_config';
    protected $primaryKey = 'id';
    protected $fillable = ['customer_id', 'module', 'css', 'created_at', 'created_by', 'updated_at', 'updated_by'];
}
