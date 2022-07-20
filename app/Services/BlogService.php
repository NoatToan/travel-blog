<?php

namespace App\Services;

use App\Models\Blog;
use App\Services\IServices\IBlogService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BlogService extends AbstractService
{

    public function __construct(Blog $repository)
    {
        $this->repository = $repository;
    }

    public function paginate(Request $request)
    {
        return $this->repository->query()->paginate();
    }
}
