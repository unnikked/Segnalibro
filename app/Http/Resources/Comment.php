<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\Resource;

class Comment extends Resource
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
      'text' => $this->text,
      'created_at' => $this->created_at->toDateTimeString(),
      'updated_at' => $this->updated_at->toDateTimeString(),
    ];
  }
}
