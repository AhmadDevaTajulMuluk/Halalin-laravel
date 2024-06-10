<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $primaryKey = 'article_id';

    protected $fillable = [
        'title',
        'writer',
        'content',
        'publish_date',
        'reference',
        'article_image',
        'viewers',
    ];

    protected $casts = [
        'publish_date' => 'datetime',
    ];

    // Alternatively, you can use $dates
    // protected $dates = [
    //     'publish_date',
    // ];
}
