<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use Essence\Essence;
use App\Http\Controllers\Controller;

class SaveController extends Controller
{
  public function __invoke(Request $request, Essence $essence)
  {
    $this->validate($request, [
      'url' => 'required|url'
    ]);

    $attributes = $essence->extract($request->url);

    abort_if(is_null($attributes), 500);

    $request->user()->pages()->create($attributes->properties());

    return response()->json(true);
  }
}
