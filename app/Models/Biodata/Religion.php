<?php

namespace App\Models\Biodata;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Religion extends Model
{
    use HasFactory;

    protected $table = 'religionstats';

    protected $primaryKey = 'stats_id';

    protected $fillable = [
        'user_id',
        'quranMemory',
        'level',
        'answer1',
        'answer2',
        'answer3',
        'answer4',
        'answer5',
        'answer6',
    ];
}
