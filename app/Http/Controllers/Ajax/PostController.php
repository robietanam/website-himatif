<?php

namespace App\Http\Controllers\Ajax;

use App\Http\Controllers\Controller;
use App\Repositories\PostRepository;
use Illuminate\Http\Request;

class PostController extends Controller
{
    private $postRepository;

    public function __construct()
    {
        $this->postRepository = new PostRepository;
    }

    public function getPosts(Request $request)
    {
        try {
            return $this->postRepository->getDatatable();
        } catch (\Throwable $e) {
            return response()->error($e->getMessage(), $e->getCode());
        }
    }
}
