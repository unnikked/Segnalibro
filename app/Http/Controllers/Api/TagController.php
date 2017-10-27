<?php

namespace App\Http\Controllers\Api;

use App\Tag;
use App\Page;
use Illuminate\Http\Request;
use App\Http\Resources\Tag as TagResource;
use App\Http\Controllers\Controller;

class TagController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, Page $page)
    {
      return TagResource::collection(
        $request->user()
          ->pages()
          ->findOrFail($page->id)
          ->tags()
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
      return new TagResource($request->user()->pages()->findOrFail($page->id)
        ->tags()->create($this->validate($request, [
        'text' => 'required'
      ])));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Page $page, Tag $tag)
    {
      return new TagResource(
        $request->user()
        ->pages()->findOrFail($page->id)
        ->tags()->findOrFail($tag->id)
      );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Page $page, Tag $tag)
    {
      return ['data' => ['success' => $request->user()->pages()->findOrFail($page->id)
        ->tags()->findOrFail($tag->id)
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
    public function destroy(Request $request, Page $page, Tag $tag)
    {
      return ['data' => ['success' => $request->user()->pages()->findOrFail($page->id)
        ->tags()->findOrFail($tag->id)
        ->delete()
      ]];
    }
}
