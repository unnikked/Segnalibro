<?php

namespace App\Http\Controllers;

use App\Page;
use Essence\Essence;
use Illuminate\Http\Request;

class PageController extends Controller
{
  /**
  * Display a listing of the resource.
  *
  * @return \Illuminate\Http\Response
  */
  public function index(Request $request)
  {
    return view('page.index', [
      'pages' => $request->user()->pages()->paginate()
    ]);
  }

  /**
  * Show the form for creating a new resource.
  *
  * @return \Illuminate\Http\Response
  */
  public function create()
  {
    return view('page.create');
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

    $request->user()->pages()->create($attributes->properties());

    return redirect()->route('page.index');
  }

  /**
  * Display the specified resource.
  *
  * @param  \App\Page  $page
  * @return \Illuminate\Http\Response
  */
  public function show(Page $page, Request $request)
  {
    // $page = $request->user()->pages()->findOrFail($page)->get();
    return view('page.show', [
      'page' => $page
    ]);
  }

  /**
  * Show the form for editing the specified resource.
  *
  * @param  \App\Page  $page
  * @return \Illuminate\Http\Response
  */
  public function edit(Page $page)
  {
    //
  }

  /**
  * Update the specified resource in storage.
  *
  * @param  \Illuminate\Http\Request  $request
  * @param  \App\Page  $page
  * @return \Illuminate\Http\Response
  */
  public function update(Request $request, Page $page)
  {
    //
  }

  /**
  * Remove the specified resource from storage.
  *
  * @param  \App\Page  $page
  * @return \Illuminate\Http\Response
  */
  public function destroy(Page $page)
  {
    $page->delete();

    return redirect()->route('page.index');
  }
}
