<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;

    protected $table = 'review'; // Define the table name

    protected $fillable = [
        'reviewUserID',
        'reviewUserComment',
        'commentTimestamp',
    ];

    protected $casts = [
        'commentTimestamp' => 'datetime', // Cast timestamp field to a Carbon instance
    ];
}
