<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserData extends Model
{
    protected $fillable = [
        'geolocation',
        'ip',
    ];

    protected $table = 'user_data';
}
