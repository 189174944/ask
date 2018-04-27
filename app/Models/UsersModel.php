<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UsersModel extends Model
{
    protected $table = 'ask_users';
    protected $fillable = [
        'id', 'account', 'password', 'is_special', 'special_id', 'nickname','sex', 'occupation', 'short_sign', 'long_sign', 'register_from', 'wechat_qrcode', 'created_at'
    ];
    public $timestamps = false;
}
