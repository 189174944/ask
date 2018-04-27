<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ArticalTopicModel extends Model
{
    protected $table = 'ask_artical_topic';
    protected $fillable = [
        'artical_id',
        'topic_id'
    ];
}
