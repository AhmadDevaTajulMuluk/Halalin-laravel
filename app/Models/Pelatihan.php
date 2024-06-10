<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pelatihan extends Model
{
    use HasFactory;
    protected $primaryKey = 'id'; // Atur kunci utama sebagai 'id' saja

    protected $fillable = [
        'id',
        'is_complete',
        'nomor_bab',
        'kategori',
        'created_at',
        'updated_at'
    ];
}
