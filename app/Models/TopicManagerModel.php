<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TopicManagerModel extends Model
{
    protected $table = 'ask_topic_manager';
    protected $fillable = [
        'topic_id', 'users_id'
    ];
    public $timestamps = false;

    public function users()
    {
        return $this->belongsTo(UsersModel::class, 'users_id', 'id');
    }
}
