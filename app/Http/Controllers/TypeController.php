<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TypeController extends Controller
{
  public function __invoke(Request $request, $type)
  {
    return view('page.index', [
      'pages' => $request->user()->pages()->whereType($type)->paginate()
    ]);
  }
}
