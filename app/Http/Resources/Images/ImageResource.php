<?php

namespace App\Http\Resources\Users;

use App\Http\Resources\BaseResource;

class UserResource extends BaseResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'first_name' => $this->first_name,
            'last_name' => $this->last_name,
            'role_id' => $this->role_id,
            'images' => $this->whenLoaded('images', function () {
                return $this->images;
            }),
            'main_profile_image' => $this->whenLoaded('mainProfileImage', function () {
                return $this->mainProfileImage;
            }),
        ];
    }
}
