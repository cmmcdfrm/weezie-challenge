<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class BaseJsonResource extends JsonResource
{
    /**
     * Add Status to Response
     *
     * @param \Illuminate\Http\Request $request
     * @return array
     */
    public function with($request){
        return [
          'status'=>'ok'
        ];
    }
}
