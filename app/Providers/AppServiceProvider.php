<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

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
  }
}
