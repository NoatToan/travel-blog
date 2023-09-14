<?php

namespace App\Http\Resources\Users;

use App\Http\Resources\BaseResource;
use App\Http\Resources\Images\ImageResource;

class UserResource extends BaseResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'first_name' => $this->first_name,
            'last_name' => $this->last_name,
            'phone_number' => $this->phone_number,
            //'role_id' => $this->role_id,
            //'images' => $this->whenLoaded('images', function () {
            //   return ImageResource::collection($this->images);
            //}),
            'description' => $this->description,
            'main_profile_image' => $this->whenLoaded('mainProfileImage', function () {
                  return ImageResource::make($this->mainProfileImage);
            }),
        ];
    }
}
