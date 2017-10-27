<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Page;
use App\Http\Resources\Page as PageResource;


class SearchController extends Controller
{
  public function __invoke(Request $request)
  {
    $this->validate($request, [
      'query' => 'required'
    ]);

    $query = $request->get('query');
    $id = $request->user()->id;

    $result = Page::search($query)->where('user_id', $id)->paginate();

    return PageResource::collection($result);
  }
}
