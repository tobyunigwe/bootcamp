<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Handin extends Model
{
    public function assignments(){
        return $this->belongsTo(Assignment::class);
    }
    public function user(){
        return $this->belongsTo(User::class);
    }
    public function grade(){
        return $this->hasOne(Grade::class,'handin_id');
    }

}
