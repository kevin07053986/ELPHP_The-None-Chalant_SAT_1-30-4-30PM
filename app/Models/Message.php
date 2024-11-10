<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    use HasFactory;

    protected $table = 'message'; // Define the table name

    protected $fillable = [
        'senderId',
        'receiverId',
        'message',
        'timestamp',
    ];

    protected $casts = [
        'timestamp' => 'datetime', // Cast timestamp field to a Carbon instance
    ];
}
