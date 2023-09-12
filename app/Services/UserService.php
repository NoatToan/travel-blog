<?php

namespace App\Services;

use App\Repositories\BlogRepository;
use App\Repositories\ImageRepository;
use Illuminate\Http\Request;

class BlogService extends AbstractService
{
    private $imageRepository;

    public function __construct(BlogRepository $repository, ImageRepository $imageRepository)
    {
        $this->repository = $repository;
        $this->imageRepository = $repository;
    }

    public function paginate(Request $request)
    {
        return $this->query()
            ->with([
                'author',
                'comments',
                'images',
                'latestImage',
                'oldestImage',
            ])
            ->withCount(['images'])
            ->paginate();
    }

    public function show($id)
    {
        return $this->query()
            ->with([
                'author',
                'comments',
                'images',
                'latestImage',
                'oldestImage',
            ])
            ->withCount(['images'])
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
