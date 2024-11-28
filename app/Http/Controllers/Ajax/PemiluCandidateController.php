<?php

namespace App\Http\Controllers\Ajax;

use App\Http\Controllers\Controller;
use App\Repositories\PemiluCandidateRepository;
use Illuminate\Http\Request;

class PemiluCandidateController extends Controller
{
    private $postRepository;

    public function __construct()
    {
        $this->postRepository = new PemiluCandidateRepository;
    }

    public function getCandidate(Request $request)
    {
        try {
            return $this->postRepository->getDatatable();
        } catch (\Throwable $e) {
            return response()->error($e->getMessage(), $e->getCode());
        }
    }
}
