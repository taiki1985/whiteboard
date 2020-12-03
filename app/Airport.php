<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Airport extends Model
{
    protected $fillable = [
        'type',
        'three_letter',
        'name',
        'name_ruby',
        'name_eng',
        'remarks',
        'created_user_id',
        'updated_user_id',
    ];
}
