<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Passport\HasApiTokens;


class User extends Authenticatable
{
    use HasApiTokens, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function pages()
    {
      return $this->hasMany(\App\Page::class);
    }

    public function tags()
    {
      return $this->hasMany(\App\Tag::class);
    }

    public function comments()
    {
      return $this->hasManyThrough(\App\Comment::class, \App\Page::class);
    }
}
