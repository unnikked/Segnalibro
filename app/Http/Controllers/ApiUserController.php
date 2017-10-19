<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ApiUserController extends Controller
{
  public function __invoke(Request $request)
  {
    return $request->user();
  }
}
