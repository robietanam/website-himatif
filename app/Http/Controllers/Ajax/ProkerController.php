<?php

namespace App\Http\Controllers\Ajax;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\ProkerRepository;
use App\Repositories\ProkerUserRepository;

class ProkerController extends Controller
{
    private $prokerRepository;
    private $prokerUserRepository;

    public function __construct()
    {
        $this->prokerRepository = new ProkerRepository;
        $this->prokerUserRepository = new ProkerUserRepository;
    }

    public function getProkers(Request $request)
    {
        try {
            return $this->prokerRepository->getDatatable($request->status);
        } catch (\Exception $e) {
            return response()->error($e->getMessage(), $e->getCode());
        }
    }

    public function getProkerUsers($proker_id)
    {
        try {
            return $this->prokerUserRepository->getDatatable($proker_id);
        } catch (\Exception $e) {
            return response()->error($e->getMessage(), $e->getCode());
        }
    }
}
