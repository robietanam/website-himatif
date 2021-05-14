<?php

namespace App\Http\Controllers\Ajax;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class UserController extends Controller
{
    public function getKeanggotaan(Request $request) {
        $users = \App\User::all();
        return DataTables::of($users)
            ->addColumn('photo', function($user) {
                if ($user->photo) {
                    return '<div class="img-wrapper img-wrapper-table"><img src='. asset('storage/'.$user->photo) .' alt=""></div>';
                } else {
                    return '<div class="img-wrapper img-wrapper-table"><i class="fas fa-user text-white"></i></div>';
                }
            })
            ->addColumn('name', function($user) {
                return $user->name;
            })
            ->addColumn('nim', function($user) {
                return $user->nim;
            })
            ->addColumn('division', function($user) {
                return $user->division->name;
            })
            ->addColumn('email', function($user) {
                return $user->email;
            })
            ->addColumn('phone', function($user) {
                return $user->phone;
            })
            ->addColumn('year_entry', function($user) {
                return $user->year_entry;
            })
            ->addColumn('status', function($user) {
                return $user->status === '1' ? 
                    '<span class="badge badge-success">Aktif</span>' :
                    '<span class="badge badge-secondary">Tidak Aktif</span>';
            })
            ->addColumn('role', function($user) {
                return $user->role->name;
            })
            ->rawColumns(['photo', 'status'])->make(true);
    }
}
