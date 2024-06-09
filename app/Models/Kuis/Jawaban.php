<?php

namespace App\Models\Kuis;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jawaban extends Model
{
    use HasFactory;

    protected $fillable = ['soal_id', 'teks', 'benar'];

    public function soal()
    {
        return $this->belongsTo(Soal::class);
    }
}
