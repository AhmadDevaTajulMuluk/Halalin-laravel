<?php

namespace App\Models\Biodata;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SelfApp extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'motto',
        'lifegoals',
        'hobbies',
        'favThings',
        'positiveTraits',
        'negativeTraits',
        'taarufReason',
    ];
}
