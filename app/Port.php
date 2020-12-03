<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Port extends Model
{
    protected $fillable = [
        'id',
        'name',
        'name_ruby',
        'name_eng',
        'address',
        'custom_id',
        'immigration_id',
        'quarantine_id',
        'remarks',
        'created_user_id',
        'updated_user_id',
        'created_at',
        'updated_at',
    ];
    
}
