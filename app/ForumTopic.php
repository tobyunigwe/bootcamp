<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Searchable\Searchable;
use Spatie\Searchable\SearchResult;

class ForumTopic extends Model implements Searchable
{
    use SoftDeletes;

    protected $table = 'forum_topics';

    public function category()
    {
        return $this->belongsTo(ForumCategory::class,'topic_cat');
    }

    public function posts()
    {
        return $this->hasMany(ForumPost::class, 'topic_id');
    }

    public function getSearchResult(): SearchResult
    {
        $url = route('forum.topic.post.index', [$this->category, $this->id]);

        return new SearchResult(
            $this,
            $this->subject,
            $url
        );
    }
}
