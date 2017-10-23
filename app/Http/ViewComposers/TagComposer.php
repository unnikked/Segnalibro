<?php
namespace App\Http\ViewComposers;

use App\User;
use Illuminate\View\View;

/**
 *
 */
class TagComposer
{
  protected $user;

  function __construct(?User $user)
  {
    $this->user = $user;
  }

  public function compose(View $view)
  {
    if ($this->user) {
      $view->with('tags', $this->user->tags()->withCount('pages')->where('pages_count', '>', 0)->get());
    }
  }
}
