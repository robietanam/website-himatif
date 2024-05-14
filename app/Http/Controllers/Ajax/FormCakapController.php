<?php

namespace App\Http\Controllers\Ajax;

use App\Http\Controllers\Controller;
use App\Repositories\CakapRepository;
use Illuminate\Http\Request;

class FormCakapController extends Controller
{
    private $postRepository;

    public function __construct()
    {
        $this->postRepository = new CakapRepository;
    }

    public function getCakaps(Request $request)
    {
        try {
            return $this->postRepository->getDatatable($request->status);
        } catch (\Throwable $e) {
            return response()->error($e->getMessage(), $e->getCode());
        }
    }

    public function getCakapsEmail(Request $request)
    {
        
        $data = $request;
        return $this->postRepository->getDatatableEmail($data);
        // try {
            
        // } catch (\Throwable $e) {
        //     return response()->error($e->getMessage(), $e->getCode());
        // }
    }

    public function getCakapKode()
    {
        try {
            return $this->postRepository->getDatatableKode();
        } catch (\Throwable $e) {
            return response()->error($e->getMessage(), $e->getCode());
        }
    }
}
