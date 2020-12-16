<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    public function category()
    {
        return $this->belongsTo('App\Category');
    }

    public function tags()
    {
        return $this->belongsToMany('App\Tag'); //many to many artinya satu post boleh beberapa tag
    }

    public function comments()
    {
        return $this->morphMany('App\Comment', 'commentable');
    }
}
