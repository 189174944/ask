<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class InteractModel extends Model
{
    protected $table = 'ask_interact';
    protected $fillable = [
        'user_id',
        'article_id',
        'type'
    ];
}
