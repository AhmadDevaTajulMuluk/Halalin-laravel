<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pelatihan extends Model
{
    use HasFactory;

    protected $primaryKey = ['id'];

    protected $fillable = [
        'id',
        'judul',
        'deskripsi',
        'file_html'
    ];
}
