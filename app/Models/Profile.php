<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;
    
    protected $primaryKey = 'user_id';

    protected $fillable = [
        'user_id',
        'fullname',
        'phone_number',
        'place_date',
        'birth_date',
        'gender',
        'job',
        'salary',
        'married_status',
        'ethnic',
        'image',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
