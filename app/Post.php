<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
  protected $fillable = [
  'title', 'description', 'body', 'url', 'view','user_id', 'category_id'  ];


  public function comments()
    {
      return $this->hasMany(Comment::class)->orderBy('created_at');
    }

  public function category()
    {
      return $this->belongsTo(Category::class);
    }
    public function user_id(){
      return $this->hasOne('App\User','id','user_id');
    }
    public function category_id(){
        return $this->hasOne('App\Category','id','category_id');
    }
}
