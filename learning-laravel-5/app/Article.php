<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $fillable = [
        'title',
        'body',
        'published_at',
        'user_id' // temporary!!
    ];

    // Take timestamp and treat it as a Carbon instance
    protected $dates = ['published_at'];

    public function scopePublished($query){

        $query->where('published_at', '<=', Carbon::now());

    }

    public function scopeUnpublished($query){ // Article::published()

            $query->where('published_at', '>', Carbon::now());

    }

    // mutator/setter
    // setNameAttribute
    public function setPublishedAtAttribute($date){

        $this->attributes['published_at'] = Carbon::parse($date);

    }

    // accessor/getter
    // ensure that we have an instance of Carbon
    public function getPublishedAtAttribute($date)
    {
        return new Carbon($date);
    }
    /**
     * An article is owned by a user.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo('App\User');    // Article's table needs to have some kind of user_id column and
                                                // that will be the hook, because we have the belongsTo relationship
    }

    /**
     * Get the tags associated with the given article
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function tags(){

        return $this->belongsToMany('App\Tag')->withTimestamps(); // Fix missing timestamps
    }

    /**
     * Get a list of tag ids associated with the current article.
     *
     * @return array
     */
    public function getTagListAttribute(){
        // $article->tag_list
        return $this->tags->lists('id')->all();
    }
}
