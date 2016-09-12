<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    public $table = "comments";
    public function replies(){
        return $this->hasMany('App\Reply');
    }
    public function user(){
        return $this->belongsTo('App\User');
    }
    public function posts(){
        return $this->belongsTo('App\Post');
    }

}
