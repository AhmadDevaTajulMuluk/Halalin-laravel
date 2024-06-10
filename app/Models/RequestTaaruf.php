<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RequestTaaruf extends Model
{
    use HasFactory;

    protected $table = 'request_taarufs';

    protected $fillable = [
        'requester_id',
        'responser_id',
        'is_approved',
    ];

    public function requester()
    {
        return $this->belongsTo(User::class, 'requester_id');
    }

    public function responser()
    {
        return $this->belongsTo(User::class, 'responser_id');
    }
}
