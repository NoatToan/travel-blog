<?php

namespace App\Http\Resources\Blogs;

use App\Http\Resources\BaseResource;

class BlogResource extends BaseResource
{
    public function toArray($request)
    {
        return [
            'name' => $this->name,
            'content' => $this->content,
            'author_id' => $this->author_id,
            'status' => $this->status,
            'like_total' => $this->like_total,
            'dislike_total' => $this->dislike_total,
            'comment_total' => $this->comment_total,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'author' => $this->whenLoaded('author', function () {
                return $this->author;
            })
        ];
    }
}
