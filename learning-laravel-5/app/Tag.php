<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    // Want the inverse, so if you have a tag object, $tag->article. Give me all articles associated with the given tag
    public function articles()
    {
        return $this->belongsToMany('App\Article');
    }
}
