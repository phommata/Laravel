<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    // Want the inverse, so if you have a tag object, $tag->article.
    // Give me all articles associated with the given tag

    /**
     * Get the articles associated with the given tag.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function articles()
    {
        // if you don't want to follow conventions, you maybe are
        // already working with something, or maybe you don't
        // want to follow the convention, just pass it through
        // as the second argument. Ex: tags_pivot. That will
        // be treated as the table name. Can pass a third or
        // fourth argument for a non-standard name for the
        // article id like article_identifier. Same is true for
        // the tag id.
        return $this->belongsToMany('App\Article', "tags_pivot", "article_identifier");
    }
}
