<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Page;

use Illuminate\Http\Request;

class CommentController extends Controller
{
  /**
  * Display a listing of the resource.
  *
  * @return \Illuminate\Http\Response
  */
  public function index(Request $request)
  {
    return view('page.comment.index')->with([
      'comments' => $request->user()->comments()->with('page')->paginate()
    ]);
  }

  /**
  * Show the form for creating a new resource.
  *
  * @return \Illuminate\Http\Response
  */
  public function create(Page $page)
  {
    return view('page.comment.create', [
      'page' => $page
    ]);
  }

  /**
  * Store a newly created resource in storage.
  *
  * @param  \Illuminate\Http\Request  $request
  * @return \Illuminate\Http\Response
  */
  public function store(Request $request, Page $page)
  {
    $page->comments()->create($this->validate($request, [
      'text' => 'required'
    ]));

    return redirect()->route('page.show', $page->id);
  }

  /**
  * Display the specified resource.
  *
  * @param  \App\Comment  $comment
  * @return \Illuminate\Http\Response
  */
  public function show(Comment $comment)
  {
    //
  }

  /**
  * Show the form for editing the specified resource.
  *
  * @param  \App\Comment  $comment
  * @return \Illuminate\Http\Response
  */
  public function edit(Comment $comment)
  {
    //
  }

  /**
  * Update the specified resource in storage.
  *
  * @param  \Illuminate\Http\Request  $request
  * @param  \App\Comment  $comment
  * @return \Illuminate\Http\Response
  */
  public function update(Request $request, Comment $comment)
  {
    //
  }

  /**
  * Remove the specified resource from storage.
  *
  * @param  \App\Comment  $comment
  * @return \Illuminate\Http\Response
  */
  public function destroy(Page $page, Comment $comment)
  {
    $comment->delete();

    return redirect()->route('page.show', $page->id);
  }
}
