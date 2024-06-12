<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chat extends Model
{
    use HasFactory;

    protected $table = 'chats';
    protected $primaryKey = 'chat_id';

    protected $fillable = [
        'chat_id',
        'hubungan_id',
        'messages',
        'send_at',
        'send_by'
    ];

    public function relation()
    {
        return $this->belongsTo(Relations::class, 'hubungan_id', 'hubungan_id');
    }
}
