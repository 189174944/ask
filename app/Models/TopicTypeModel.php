<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TopicTypeModel extends Model
{
    protected $table = 'ask_topic_type';
    protected $fillable = [
        'id','name','remark'
    ];
}
