<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
  /**
  * The attributes that are mass assignable.
  *
  * @var array
  */
  protected $fillable = [
    'name',
  ];

  public function pages()
  {
    return $this->belongsToMany(\App\Page::class);
  }

  public function user()
  {
    return $this->belongsTo(\App\User::class);
  }
}
