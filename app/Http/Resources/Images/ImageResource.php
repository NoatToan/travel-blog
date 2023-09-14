<?php

namespace App\Http\Resources\Images;

use App\Http\Resources\BaseResource;

class ImageResource extends BaseResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'path' => $this->path,
            'image_type' => $this->image_type,
        ];
    }
}
