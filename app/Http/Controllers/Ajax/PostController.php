<?php

namespace App\Http\Controllers\Ajax;

use App\Http\Controllers\Controller;
use App\Repositories\PostRepository;

class PostController extends Controller
{
    private $postRepository;

    public function __construct(PostRepository $postRepository)
    {
        $this->postRepository = $postRepository;
    }

    public function getPosts()
    {
        try {
            return $this->postRepository->getDatatable();
        } catch (\Throwable $e) {
            return response()->error($e->getMessage(), $e->getCode());
        }
    }
}
