<?php

namespace App\Http\Controllers\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreBlogRequest;
use App\Http\Requests\UpdateBlogRequest;
use App\Http\Resources\Blogs\BlogResource;
use App\Services\BlogService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Response;

class BlogController extends Controller
{
    private $service;

    public function __construct(BlogService $service)
    {
        $this->service = $service;
    }

    public function index(Request $request)
    {
        return Response::indexSuccess(
            BlogResource::collection(
                $this->service->paginate($request)
            )
        );
    }

    public function store(StoreBlogRequest $request)
    {
        return Response::storeSuccess(
            BlogResource::make(
                $this->service->store($request)
            )
        );
    }

    public function show($id)
    {
        return Response::showSuccess(
            BlogResource::make($this->service->show($id))
        );
    }

    public function update(UpdateBlogRequest $request, $id)
    {
        $this->service->update($id, $request);
        return Response::updateSuccess();
    }

    public function destroy($blogId)
    {
        DB::transaction(function () use ($blogId) {
            $this->service->delete($blogId);
        });
    }
}
