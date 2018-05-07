<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UsersArticalModel extends Model
{
    protected $table = 'ask_users_artical';
    protected $fillable = [
        'users_id','artical_id'
    ];
}
