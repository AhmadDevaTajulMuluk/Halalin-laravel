<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Relations extends Model
{
    use HasFactory;

    protected $table = 'relations'; // Menyatakan nama tabel yang sesuai dengan model

    protected $primaryKey = 'hubungan_id'; // Menyatakan primary key dari tabel

    protected $fillable = [ // Menyatakan kolom-kolom yang bisa diisi secara massal
        'hubungan_id',
        'ustadz_id',
        'maleuser_id',
        'femaleuser_id',
        'start',
    ];

    // Definisikan relasi-relasi model di sini jika ada

}
