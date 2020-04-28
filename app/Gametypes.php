<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Gametypes extends Model
{
    //
    protected $table = 'gametype';
     protected $fillable = [
            'name', 'wining_price', 'entry_price', 'questions_count', 'image'
        ];
}
