<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rank extends Model
{
    protected $fillable = [
        'name',
        'name_srt',
        'remarks',
        'created_user_id',
        'updated_user_id',
    ];

}
