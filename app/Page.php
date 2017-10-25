<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class Page extends Model
{
  use Searchable;

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

  /**
     * Get the indexable data array for the model.
     *
     * @return array
     */
    public function toSearchableArray()
    {
      $array = $this->toArray();

      // Customize array...

      return $array;
    }
}
