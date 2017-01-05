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
      'title',
      'content',
    ];
    public function user(){
      return $this->belongsTo('App\User');
    }

}