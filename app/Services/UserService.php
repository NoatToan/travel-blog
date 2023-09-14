<?php

namespace App\Services;

use App\Repositories\UserRepository;
use App\Repositories\ImageRepository;
use Illuminate\Http\Request;

class UserService extends AbstractService
{
    private $imageRepository;

    public function __construct(UserRepository $repository, ImageRepository $imageRepository)
    {
        $this->repository = $repository;
        $this->imageRepository = $repository;
    }

    public function paginate(Request $request)
    {
        return $this->query()
            ->with([
                'images','mainProfileImage',
            ])
            ->paginate();
    }

    public function show($id)
    {
        return $this->query()
            ->with([
                'images','mainProfileImage',

            ])
            ->findOrFail($id);
    }

    public function delete(int $id)
    {
        $blog = $this->query()
            ->withCount(['images'])
            ->findOrFail($id);

        if ($blog->images_count) {
            $blog->images()->delete();
        }
        $blog->delete();
    }
}
