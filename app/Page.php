<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = [
    'type', 'version', 'url', 'title',
    'description', 'authorName', 'authorUrl', 'providerName',
    'providerUrl', 'cacheAge', 'thumbnailUrl', 'thumbnailWidth',
    'thumbnailHeight', 'html', 'width', 'height',
  ];

  public function user()
  {
    return $this->belongsTo(\App\User::class);
  }

  public function comments()
  {
    return $this->hasMany(\App\Comment::class);
  }

  public function tags()
  {
    return $this->belongsToMany(\App\Tag::class);
  }
}
