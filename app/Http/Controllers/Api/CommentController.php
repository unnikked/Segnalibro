<?php

namespace App\Http\Controllers\Api;

use App\Comment;
use App\Page;
use Illuminate\Http\Request;
use App\Http\Resources\Comment as CommentResource;
use App\Http\Controllers\Controller;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, Page $page)
    {
      return CommentResource::collection(
        $request->user()
          ->pages()
          ->findOrFail($page->id)
          ->comments()
          ->paginate()
      );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Page $page)
    {
      return new CommentResource($request->user()->pages()->findOrFail($page->id)
        ->comments()->create($this->validate($request, [
        'text' => 'required'
      ])));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Page $page, Comment $comment)
    {
      return new CommentResource(
        $request->user()
        ->pages()->findOrFail($page->id)
        ->comments()->findOrFail($comment->id)
      );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Page $page, Comment $comment)
    {
      return ['data' => ['success' => $request->user()->pages()->findOrFail($page->id)
        ->comments()->findOrFail($comment->id)
        ->update($this->validate($request, [
        'text' => 'required'
      ]))]];
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Page $page, Comment $comment)
    {
      return ['data' => ['success' => $request->user()->pages()->findOrFail($page->id)
        ->comments()->findOrFail($comment->id)
        ->delete()
      ]];
    }
}
