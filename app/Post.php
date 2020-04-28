<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    //use SoftDeletes;

        protected $fillable = [
            'user_id', 'title', 'details', 'image'
        ];

        public function user()
        {
            return $this->belongsTo(User::class, 'user_id');
        }

        public function comments(){
          return $this->hasMany(Comment::class);
        }
}
