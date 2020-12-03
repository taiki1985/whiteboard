<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Custom extends Model
{
    protected $fillable = [
        'name',
        'name_ruby',
        'name_eng',
        'jurisdiction',
        'postcode',
        'address',
        'tel',
        'short_num',
        'fax',
        'email',
        'remarks',
        'created_user_id',
        'updated_user_id',
    ];
}
