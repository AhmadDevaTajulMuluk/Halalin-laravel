<?php

namespace App\Models;

use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;

class Ustadz extends Model implements AuthenticatableContract
{
    use Authenticatable;

    protected $table = 'ustadz';
    protected $primaryKey = 'ustadz_id';

    protected $fillable = [
        'name', 'username', 'phone', 'password',
    ];
}
