<?php

namespace App\Http\Controllers;

use App\Comment;
use Illuminate\Http\Request;

class CommentSearchController extends Controller
{
  public function __invoke(Request $request)
  {
    $this->validate($request, [
      'query' => 'required'
    ]);

    $query = $request->get('query');
    $id = $request->user()->id;

    return view('page.comment.index')->with([
      'comments' => Comment::search($query)->where('page_id', $request->user()->pages()->get(['page_id']))->paginate()
    ]);
  }
}
