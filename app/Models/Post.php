<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $table = 'post'; // Define the table name

    protected $fillable = [
        'postTitle',
        'postDescription',
        'postPosterID',
        'postContent',
        'postTimestamp',
        'postUpVotes',
        'postDownVotes',
        'postUpVotedBy',
        'postDownVotedBy',
        'postCommentsCount',
        'postCommentList',
    ];

    protected $casts = [
        'postTimestamp' => 'datetime', // Cast timestamp field to a Carbon instance
        'postUpVotedBy' => 'array', // Cast JSON field to an array
        'postDownVotedBy' => 'array', // Cast JSON field to an array
        'postCommentList' => 'array', // Cast JSON field to an array
    ];
}
