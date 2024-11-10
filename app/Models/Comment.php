<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $table = 'comment'; // Define the table name

    protected $fillable = [
        'commentUserID',
        'commentUserComment',
        'commentTimestamp',
        'commentUserFullName',
        'commentUserProfileImage',
    ];

    protected $casts = [
        'commentTimestamp' => 'datetime', // Cast timestamp field to a Carbon instance
    ];
}
