<?php

namespace App\Repositories;

use App\Models\Blog;

class BlogRepository extends AbstractRepository
{
    protected $model;

    public function __construct(Blog $model)
    {
        $this->model = $model;
    }
}
