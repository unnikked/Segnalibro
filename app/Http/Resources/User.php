<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\Resource;
use App\Http\Resources\Page as PageResource;

class User extends Resource
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
      'name' => $this->name,
      'email' => $this->email,
      'pages' => PageResource::collection($this->whenLoaded('pages')),
      'created_at' => $this->created_at->toDateTimeString(),
      'updated_at' => $this->updated_at->toDateTimeString(),
    ];
  }
}
