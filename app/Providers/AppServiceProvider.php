<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;


class AppServiceProvider extends ServiceProvider
{
  /**
  * Bootstrap any application services.
  *
  * @return void
  */
  public function boot()
  {
    //
  }

  /**
  * Register any application services.
  *
  * @return void
  */
  public function register()
  {
    $this->app->singleton(\Essence\Essence::class, function () {
      return new \Essence\Essence([
        'filters' => [
          'OEmbedProvider' => '~.+~',
          'OpenGraphProvider' => '~.+~',
          'TwitterCardsProvider' => '~.+~'
        ]
      ]);
    });

    $this->app->when(\App\Http\ViewComposers\PageTypeComposer::class)
      ->needs(\App\User::class)
      ->give(function () {
        return \Auth::user();
      });

    View::composer('layouts.app', \App\Http\ViewComposers\PageTypeComposer::class);
  }
}
