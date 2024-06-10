<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Ustadz extends Authenticatable
{
    use Notifiable;

    protected $table = 'ustadz';
    protected $PrimaryKey = 'ustadz_id';

    protected $fillable = [
        'name', 'username', 'password', 'phone'
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];
}
