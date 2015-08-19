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

    // setNameAttribute
    public function setPublishedAtAttribute($date){

        $this->attributes['published_at'] = Carbon::parse($date);

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
}
