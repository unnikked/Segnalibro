<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\Resource;
use App\Http\Resources\Comment as CommentResource;
use App\Http\Resources\Tag as TagResource;

class Page extends Resource
{
  /**
  * Transform the resource into an array.
  *
  * @param  \Illuminate\Http\Request
  * @return array
  */
  public function toArray($request)
  {
    return [
      'id' => $this->id,
      'type' => $this->type,
      'version' => $this->version,
      'url' => $this->url,
      'title' => $this->title,
      'description' => $this->description,
      'authorName' => $this->authorName,
      'authorUrl' => $this->authorUrl,
      'providerName' => $this->providerName,
      'providerUrl' => $this->providerUrl,
      'cacheAge' => $this->cacheAge,
      'thumbnailUrl' => $this->thumbnailUrl,
      'thumbnailWidth' => $this->thumbnailWidth,
      'thumbnailHeight' => $this->thumbnailHeight,
      'html' => $this->html,
      'width' => $this->width,
      'height' => $this->height,
      'comments' => CommentResource::collection($this->whenLoaded('comments')),
      'comments' => TagResource::collection($this->whenLoaded('tags')),
      'created_at' => $this->created_at->toDateTimeString(),
      'updated_at' => $this->updated_at->toDateTimeString(),
    ];
  }
}
