<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TopicModel extends Model
{
    protected $table = 'ask_topic';
    protected $fillable = [
        'city_id','school_id','is_menu','is_recommend', 'id', 'creator_id', 'type', 'name', 'code', 'introduce', 'image', 'have_sub_level', 'have_parent_level', 'is_shared', 'is_public', 'is_locking', 'is_home', 'is_hot', 'is_choice', 'notice', 'is_city', 'is_school', 'created_at', 'updated_at'
    ];
    protected $appends = ['selected'];

    public function getSelectedAttribute()
    {
        return $this->relative()->count() > 0 ? true : false;
    }

    public function relative()
    {
        return $this->hasMany(TopicRelative::class, 'topic_id', 'id');
    }
    public function users(){
        return $this->hasOne(UsersModel::class,'id','creator_id');
    }
}
