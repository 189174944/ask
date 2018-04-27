<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TopicManagerModel extends Model
{
    protected $table = 'ask_topic';
    protected $fillable = [
        'topic_id','users_id'
    ];
}
