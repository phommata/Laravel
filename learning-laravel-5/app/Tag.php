<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    // Want the inverse, so if you have a tag object, $tag->article. Give me all articles associated with the given tag
    public function articles()
    {
        return $this->belongsToMany('App\Article', "tags_pivot"); // if you don't want to follow conventions, you maybe
                                                                  // already working with something, or maybe you don't
                                                                  // want to follow the convention, just pass it through
                                                                  // as the second argument. Ex: tags_pivot. That will
                                                                  // be treated as the table name.
    }
}
