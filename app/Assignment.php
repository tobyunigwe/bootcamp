<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Searchable\Searchable;
use Spatie\Searchable\SearchResult;

class Assignment extends Model implements Searchable
{
    public function course()
    {
        return $this->belongsTo(Course::class);
    }


    /**
     * @return SearchResult
     */
    public function getSearchResult(): SearchResult
    {
        $url = route('courses.assignments.show', [$this->course, $this->id]);

        return new SearchResult(
            $this,
            $this->course->name . " - " . $this->name,
            $url
        );
    }

    public function handins(){
        return $this->hasMany(Handin::class,'assignment_id');
    }

}
