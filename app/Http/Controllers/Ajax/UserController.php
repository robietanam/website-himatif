<?php

namespace App\Http\Controllers\Ajax;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\UserRepository;

class UserController extends Controller
{
    private $userRepository;

    public function __construct()
    {
        $this->userRepository = new UserRepository;
    }

    public function getUsers()
    {
        try {
            return $this->userRepository->getDatatable();
        } catch (\Exception $e) {
            return response()->error($e->getMessage(), $e->getCode());
        }
    }

    public function findUserById($id)
    {
        $user = $this->userRepository->findById($id);
        if ($user) {
            return response()->success($user);
        } else {
            return response()->error('User Not Found');
        }
    }
}
