<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AdminModel extends Model
{
    protected $table = 'ask_admin';
    protected $fillable = [
        'id', 'account', 'password', 'nickname', 'remark', 'created_at'
    ];
}

