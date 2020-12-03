<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Airline extends Model
{    
    protected $fillable = [
        'two_letter',
        'name',
        'name_ruby',
        'name_eng',
        'tel',
        'short_num',
        'fax',
        'email',
        'start',
        'end',
        'saturday',
        'sunday',
        'national_holiday',
        'ok_board',
        'immigration_notice',
        'remarks',
        'created_user_id',
        'updated_user_id',
    ];
}
