<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class Comment extends Model
{
  use Searchable;

  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = [
    'text'
  ];

  public function page()
  {
    return $this->belongsTo(\App\Page::class);
  }

  public function toSearchableArray()
  {
    $array = $this->toArray();

    // Customize array...

    return $array;
  }
}
