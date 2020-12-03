<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    protected $fillable = [
        'four_letter',
        'company_form',
        'name',
        'name_ruby',
        'name_eng',
        'postcode',
        'address',
        'tel',
        'short_num',
        'fax',
        'emai',
        'incharge',
        'incharge_phone',
        'remarks',
        'created_user_id',
        'updated_user_id',
    ];

}
