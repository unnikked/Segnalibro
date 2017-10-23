<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Resources\Page as PageResource;

// use File;

class ExportController extends Controller
{
  public function __invoke(Request $request)
  {

    // $urls = $request->user()->pages()->get(['url']);
    //
    // $filename = '/tmp/' . $request->user()->id . '.json';
    //
    // File::put($filename, $urls->toJson());
    //
    // return response()->download($filename);

    return PageResource::collection($request->user()->pages()->with('comments')->get());
  }
}
