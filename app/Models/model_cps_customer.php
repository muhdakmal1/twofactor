<?php

namespace App\Models;

// use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class model_cps_customer extends Model
{
    // use HasFactory;
    // use SoftDeletes;

    const UPDATED_AT = null;
    const CREATED_AT = null;
    protected $table = 'cps_customer';
    protected $primaryKey = 'id';
    protected $fillable = ['name', 'email', 'url', 'basic', 'advanced', 'is_paid', 'expired_at', 'created_at', 'created_by', 'updated_at', 'updated_by', 'is_deleted'];

    public function template()
    {
        return $this->belongsTo(model_cps_template::class, 'id', 'customer_id');
    }
}
