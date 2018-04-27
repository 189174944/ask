<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TopicRelative extends Model
{
    protected $table = 'ask_topic_relative';
    protected $fillable = [
        'topic_id','arrow_id'
    ];
}
