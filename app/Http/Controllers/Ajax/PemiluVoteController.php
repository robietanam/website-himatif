<?php

namespace App\Http\Controllers\Ajax;

use App\Http\Controllers\Controller;
use App\Repositories\PemiluVoteRepository;
use Illuminate\Http\Request;

class PemiluVoteController extends Controller
{
    private $postRepository;

    public function __construct()
    {
        $this->postRepository = new PemiluVoteRepository;
    }

    public function getVoter(Request $request)
    {
        try {
            return $this->postRepository->getDatatable($request->status);
        } catch (\Throwable $e) {
            return response()->error($e->getMessage(), $e->getCode());
        }
    }
}
