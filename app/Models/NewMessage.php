<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NewMessage extends Model
{
    use HasFactory;

    protected $table = 'new_message'; // Define the table name

    protected $fillable = [
        'avatarUrl',
        'fullName',
        'last_chat',
        'chatId',
    ];
}
