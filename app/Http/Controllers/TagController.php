<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tag;
use App\Page;

class TagController extends Controller
{
  /**
  * Display a listing of the resource.
  *
  * @return \Illuminate\Http\Response
  */
  public function index()
  {
    //
  }

  /**
  * Show the form for creating a new resource.
  *
  * @return \Illuminate\Http\Response
  */
  public function create(Request $request, Page $page)
  {
    return view('page.tag.create')->withPage($page);
  }

  /**
  * Store a newly created resource in storage.
  *
  * @param  \Illuminate\Http\Request  $request
  * @return \Illuminate\Http\Response
  */
  public function store(Request $request, Page $page)
  {
    $user = $request->user();

    $this->validate($request, [
      'tags' => 'required'
    ]);

    $tags = explode(',', $request->tags);


    $ids = collect();

    collect($tags)->each(function($elem, $index) use ($user, $ids) {
      $ids->push($user->tags()->firstOrCreate(['name' => $elem])->id);
    });

    $page->tags()->sync($ids);

    return redirect()->route('page.show', $page->id);
  }

  /**
  * Display the specified resource.
  *
  * @param  \App\Tag  $tag
  * @return \Illuminate\Http\Response
  */
  public function show(Request $request, Tag $tag)
  {
    return view('page.index')->withPages($tag->pages()->paginate());
  }

  /**
  * Show the form for editing the specified resource.
  *
  * @param  \App\Tag  $tag
  * @return \Illuminate\Http\Response
  */
  public function edit()
  {
    //
  }

  /**
  * Update the specified resource in storage.
  *
  * @param  \Illuminate\Http\Request  $request
  * @param  \App\Tag  $tag
  * @return \Illuminate\Http\Response
  */
  public function update(Request $request)
  {
    //
  }

  /**
  * Remove the specified resource from storage.
  *
  * @param  \App\Tag  $tag
  * @return \Illuminate\Http\Response
  */
  public function destroy()
  {
    //
  }
}
