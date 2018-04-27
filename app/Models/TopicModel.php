<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TopicModel extends Model
{
    protected $table = 'ask_topic';
    protected $fillable = [
        'id', 'creator_id', 'type', 'name', 'code', 'introduce', 'image', 'have_sub_level', 'have_parent_level', 'is_shared', 'is_public', 'is_locking', 'is_home', 'is_hot', 'is_choice' ,'notice', 'created_at', 'updated_at'
    ];
}
