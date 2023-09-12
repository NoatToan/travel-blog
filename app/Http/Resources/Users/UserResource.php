<?php

namespace App\Http\Resources\Blogs;

use App\Http\Resources\BaseResource;

class BlogResource extends BaseResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'content' => $this->content,
            'author_id' => $this->author_id,
            'status' => $this->status,
            'like_total' => $this->like_total,
            'dislike_total' => $this->dislike_total,
            'comment_total' => $this->comment_total,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'images_count' => $this->when($this->images_count, function () {
                return $this->images_count;
            }),
            'author' => $this->whenLoaded('author', function () {
                return $this->author;
            }),
            'comments' => $this->whenLoaded('comments', function () {
                return $this->comments;
            }),
            'images' => $this->whenLoaded('images', function () {
                return $this->images;
            }),
            'latest_image' => $this->whenLoaded('latestImage', function () {
                return $this->latestImage;
            }),
            'oldest_image' => $this->whenLoaded('oldest_image', function () {
                return $this->oldestImage;
            }),
        ];
    }
}
