<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tagable extends Model
{
    //
    public function posts(){
      return $this->morphByMany('App\Post','tagable');
    }
    public function videos(){
      return $this->morphByMany('App\Post','tagable');
    }
}
