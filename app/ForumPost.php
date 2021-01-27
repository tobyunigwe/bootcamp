<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Searchable\Searchable;
use Spatie\Searchable\SearchResult;

class ForumPost extends Model implements Searchable
{
    use SoftDeletes;

    protected $table = 'forum_posts';

    public function topic()
    {
        return $this->BelongsTo(ForumTopic::class);
    }

    public function user()
    {
        return $this->BelongsTo(User::class);
    }

    /**
     * @return SearchResult
     */
    public function getSearchResult(): SearchResult
    {
        $url = route('forum.topic.post.index', [$this->topic->category, $this->topic]);

        return new SearchResult(
            $this,
            $this->subject,
            $url
        );
    }
}
