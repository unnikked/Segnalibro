<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Page;

class PageSearchController extends Controller
{
  public function __invoke(Request $request)
  {
    $this->validate($request, [
      'query' => 'required'
    ]);

    $query = $request->get('query');
    $id = $request->user()->id;

    return view('page.index')->with([
      'pages' => Page::search($query)->where('user_id', $id)->paginate()
    ]);
  }
}
