<?php

namespace App\Models;

// use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class model_cps_wishes extends Model
{
    // use HasFactory;
    // use SoftDeletes;

    const UPDATED_AT = null;
    const CREATED_AT = null;
    protected $table = 'cps_wishes';
    protected $primaryKey = 'id';
    protected $fillable = ['id', 'customer_id', 'name_recipient', 'comment_recipient', 'presence_recipient'];
}
