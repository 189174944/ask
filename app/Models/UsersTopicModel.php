<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UsersTopicModel extends Model
{
    protected $table = 'ask_users_topic';
    protected $fillable = ['topic_id', 'users_id'];
}
