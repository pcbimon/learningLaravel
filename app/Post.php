<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
  use SoftDeletes;
    //
    // protected $table = 'post';
    // protected $primartKey = 'post_id';
    //softdelete
    protected $dates = ['deleted_at'];

    //ใช้คู่กับ create
    public $fillable = [
      'user_id',
      'title',
      'content',
      'path',
    ];
    public function user(){
      return $this->belongsTo('App\User');
    }
    public function photos(){
      return $this->morphMany('App\Photo','imageable');
    }
    public function tags(){
      return $this->morphMany('App\Tagable','tagable');
    }
    public static function scopeLatest($query)
    {
      # code...
      return $query->orderBy('id','asc')->get();
    }

}
