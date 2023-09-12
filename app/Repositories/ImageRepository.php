<?php

namespace App\Repositories;

use App\Models\Image;

class ImageRepository extends AbstractRepository
{
    public function __construct(Image $model)
    {
        $this->model = $model;
    }
}
