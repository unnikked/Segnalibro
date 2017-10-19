<?php

namespace App\Http\Controllers;

use App\Http\Resources\Page as PageResource;
use App\Page;
use Essence\Essence;
use Illuminate\Http\Request;

class ApiPageController extends Controller
{
  /**
  * Display a listing of the resource.
  *
  * @return \Illuminate\Http\Response
  */
  public function index(Request $request)
  {
    return PageResource::collection($request->user()->pages()->paginate());
  }

  /**
  * Store a newly created resource in storage.
  *
  * @param  \Illuminate\Http\Request  $request
  * @return \Illuminate\Http\Response
  */
  public function store(Request $request, Essence $essence)
  {
    $this->validate($request, [
      'url' => 'required|url'
    ]);

    $attributes = $essence->extract($request->url);

    abort_if(is_null($attributes), 500);

    return new PageResource($request->user()->pages()->create($attributes->properties()));
  }

  /**
  * Display the specified resource.
  *
  * @param  int  $id
  * @return \Illuminate\Http\Response
  */
  public function show(Request $request, Page $page)
  {
    $request->user()->pages()->findOrFail($page->id);

    return new PageResource($page);
  }

  /**
  * Remove the specified resource from storage.
  *
  * @param  int  $id
  * @return \Illuminate\Http\Response
  */
  public function destroy(Request $request, Page $page)
  {
    $request->user()->pages()->findOrFail($page->id);

    return ['data' => ['success' => $page->delete()]];
  }
}
