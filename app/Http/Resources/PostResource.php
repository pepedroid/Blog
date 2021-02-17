<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;


class PostResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'subTitle' => $this->subTitle,
            'img' => $this->img,
            'user_id' => $this->user_id,
            'created_at' => $this->created_at,
            'user' => $this->user
        ];
    }
}
