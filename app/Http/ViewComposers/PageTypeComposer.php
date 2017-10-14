<?php

namespace App\Http\ViewComposers;

use App\User;
use Illuminate\View\View;

/**
 *
 */
class PageTypeComposer
{
  protected $user;

  function __construct(User $user)
  {
    $this->user = $user;
  }

  public function compose(View $view)
  {
    if ($this->user) {
      $view->with('types', $this->user->pages()->groupBy('type')->get(['type']));
    }
  }
}
