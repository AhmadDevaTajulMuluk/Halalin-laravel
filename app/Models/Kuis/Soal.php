<?php

namespace App\Models\Kuis;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Soal extends Model
{
    use HasFactory;

    protected $fillable = ['judul', 'isi'];

    public function jawabans()
    {
        return $this->hasMany(Jawaban::class);
    }
}
