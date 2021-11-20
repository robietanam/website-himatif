<?php

namespace App\Http\Controllers\Dashboard\Admin;

use App\Constant\GlobalConstant;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\DivisionRepository;
use App\Repositories\UserRepository;
use App\Repositories\RoleRepository;

class UserController extends Controller
{
    private $divisionRepository;
    private $userRepository;
    private $roleRepository;

    public function __construct()
    {
        $this->divisionRepository = new DivisionRepository;
        $this->userRepository = new UserRepository;
        $this->roleRepository = new RoleRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.admin.users.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $divisions = $this->divisionRepository->get();
        $positions = GlobalConstant::DIVISION_POSITION_NAME;

        return view('dashboard.admin.users.create', compact([
            'divisions',
            'positions',
        ]));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        \Validator::make($request->all(), [
            'name' => 'required',
            'nim' => 'required',
            'email' => 'required|string|email|unique:users',
            'password' => 'required|min:6',
            'position' => 'required',
            'division_id' => 'required',
        ])->validate();

        try {
            $this->userRepository->save($request->all());
            return redirect()->route('dashboard.admin.users.index')->with([
                'type' => 'success',
                'message' => 'Tambah Data User Berhasil'
            ]);
        } catch (\Exception $e) {
            return redirect()->back('dashboard.admin.users.create')->with([
                'type' => 'danger',
                'message' => 'Tambah Data User Gagal, Terjadi kesalahan pada sistem.'
            ]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = $this->userRepository->findById($id);
        $divisions = $this->divisionRepository->get();
        $positions = GlobalConstant::DIVISION_POSITION_NAME;

        if (!$user) {
            abort(404);
        }

        return view('dashboard.admin.users.edit', compact([
            'user',
            'divisions',
            'positions',
        ]));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        \Validator::make($request->all(), [
            'name' => 'required',
            'nim' => 'required',
            'email' => 'required|string|email|unique:users,email,' . $id,
            'position' => 'required',
            'division_id' => 'required',
        ])->validate();

        try {
            $this->userRepository->update($id, $request->all());
            return redirect()->route('dashboard.admin.users.index')->with([
                'type' => 'success',
                'message' => 'Ubah Data User Berhasil'
            ]);
        } catch (\Exception $e) {
            dd($e);
            return redirect()->back('dashboard.admin.users.create')->with([
                'type' => 'danger',
                'message' => 'Ubah Data User Gagal, Terjadi kesalahan pada sistem.'
            ]);
        }
    }

    public function updatePassword(Request $request, $id)
    {
        \Validator::make($request->password, [
            'password' => 'required|min:6',
        ])->validate();

        try {
            $this->userRepository->update($id, $request->password);
            return redirect()->route('dashboard.admin.users.index')->with([
                'type' => 'success',
                'message' => 'Ubah Password User Berhasil'
            ]);
        } catch (\Exception $e) {
            dd($e);
            return redirect()->back('dashboard.admin.users.create')->with([
                'type' => 'danger',
                'message' => 'Ubah Password User Gagal, Terjadi kesalahan pada sistem.'
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
