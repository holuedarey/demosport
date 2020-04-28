<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Questions extends Model
{
    //
      protected $fillable = [
            'question', 'optiona', 'optionb', 'optionc',
            'optiond', 'answer'
        ];
}
