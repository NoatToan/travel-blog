<?php

namespace App\Services;

use App\Repositories\BlogRepository;
use Illuminate\Http\Request;

class BlogService extends AbstractService
{
    public function __construct(BlogRepository $repository)
    {
        $this->repository = $repository;
    }

    public function paginate(Request $request)
    {
        return $this->repository->query()->paginate();
    }
}
