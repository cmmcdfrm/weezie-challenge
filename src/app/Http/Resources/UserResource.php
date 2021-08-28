<?php

namespace App\Http\Resources;

class UserResource extends BaseJsonResource
{
  public function toArray($request)
  {
    return [
      'id' => $this->id,
      'name' => $this->name,
      'email' => $this->email,
      'password' => $this->password
    ];
  }
}
