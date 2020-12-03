<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    protected $fillable = [
        'name',
        'name_eng',
        'two_letter',
        'three_letter',
        'remarks',
        'created_user_id',
        'updated_user_id',
    ];

}
