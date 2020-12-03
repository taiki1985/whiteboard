<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Hotel extends Model
{
    protected $fillable = [
        'name',
        'name_ruby',
        'name_eng',
        'postcode',
        'address',
        'address_eng',
        'tel',
        'short_num',
        'fax',
        'emai',
        'web',
        'check_in',
        'check_out',
        'remarks',
        'created_user_id',
        'updated_user_id',
    ];

}
