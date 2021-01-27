<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Searchable\Searchable;
use Spatie\Searchable\SearchResult;

class ForumCategory extends Model implements Searchable
{
    use SoftDeletes;
    protected $table = 'forum_categories';

    public function topics(){
      return  $this->hasMany(ForumTopic::class,'topic_cat');
    }
    /**
     * @return SearchResult
     */
    public function getSearchResult(): SearchResult
    {
        $url = route('forum.topic.index', $this->id);

        return new SearchResult(
            $this,
            $this->name,
            $url
        );
    }
}
