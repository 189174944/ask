<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CommentModel extends Model
{
    protected $table = 'ask_comment';
    protected $fillable = [
        'artical_id',
        'users_id',
        'created_at'
    ];
}
