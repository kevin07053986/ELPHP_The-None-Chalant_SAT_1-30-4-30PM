<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChatMessage extends Model
{
    use HasFactory;

    protected $table = 'chat_message'; // Define the table name

    protected $fillable = [
        'senderId',
        'message',
        'timestamp',
    ];

    protected $casts = [
        'timestamp' => 'datetime', // Cast timestamp field to a Carbon instance
    ];
}
