<?php

namespace App\Http\Controllers\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreBlogRequest;
use App\Http\Requests\UpdateBlogRequest;
use App\Http\Resources\Blogs\BlogResource;
use App\Http\Resources\Users\UserResource;
use App\Services\UserService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Response;

class UserController extends Controller
{
    private $service;

    public function __construct(UserService $service)
    {
        $this->service = $service;
    }

    public function index(Request $request)
    {
        return UserResource::collection(
                $this->service->paginate($request)
            );
    }

    public function store(StoreBlogRequest $request)
    {
        return Response::storeSuccess(
            UserResource::make(
                $this->service->store($request)
            )
        );
    }

    public function show($id)
    {
        return Response::showSuccess(
            UserResource::make($this->service->show($id))
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
