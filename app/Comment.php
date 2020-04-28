<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    //use SoftDeletes;

    protected $fillable = [
        'user_id', 'post_id', 'user_comment'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function comments(){
        return $this->belongsTo(Post::class, 'post_id');
    }
}
