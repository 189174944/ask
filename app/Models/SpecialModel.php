<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SpecialModel extends Model
{
    protected $table = 'ask_special';
    protected $fillable = [
        'id', 'name'
    ];
}
