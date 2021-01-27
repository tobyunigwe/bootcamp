<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Searchable\Searchable;
use Spatie\Searchable\SearchResult;

class Course extends Model implements Searchable
{
    use SoftDeletes;
    public function assignments(){
        return $this->hasMany(Assignment::class);
    }

    /**
     * @return SearchResult
     */
    public function getSearchResult(): SearchResult
    {
        $url = route('courses.assignments.index', $this->id);

        return new SearchResult(
            $this,
            $this->name,
            $url
        );
    }

}
