<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NewUser extends Model
{
    use HasFactory;

    protected $table = 'new_user'; // Define the table name

    protected $fillable = [
        'userFullName',
        'userProfileImage',
    ];
}
