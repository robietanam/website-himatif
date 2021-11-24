<?php

namespace App\Http\Controllers\Dashboard\Admin;

use App\Constant\GlobalConstant;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\ProkerRepository;
use App\Repositories\ProkerDivisionRepository;
use App\Repositories\ProkerUserRepository;
use App\Repositories\UserRepository;

class ProkerController extends Controller
{
    private $prokerRepository;
    private $prokerDivisionRepository;
    private $prokerUserRepository;
    private $userRepository;

    public function __construct()
    {
        $this->prokerRepository = new ProkerRepository;
        $this->prokerDivisionRepository = new ProkerDivisionRepository;
        $this->prokerUserRepository = new ProkerUserRepository;
        $this->userRepository = new UserRepository;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $countAllProker = $this->prokerRepository->count();
        $countActiveProker = $this->prokerRepository->count([['status', '1']]);
        $countInactiveProker = $this->prokerRepository->count([['status', '0']]);
        return view('dashboard.admin.prokers.index', compact([
            'countAllProker',
            'countActiveProker',
            'countInactiveProker',
        ]));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = \Validator::make($request->all(), [
            'logo' => 'required|image|mimes:jpeg,jpg,png|max:2048',
            'name' => 'required',
            'description' => 'required',
        ]);

        // custom validation errors redirect
        if ($validator->fails()) {
            $validator->getMessageBag()->add('store', '1');

            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        try {
            $proker = $this->prokerRepository->save($request->all());
            return redirect()->route('dashboard.admin.prokers.edit', $proker->id)->with([
                'type' => 'success',
                'message' => 'Tambah Proker Berhasil, selanjutnya atur proker dan lengkapi data'
            ]);
        } catch (\Exception $e) {
            return redirect()->back()->with([
                'type' => 'danger',
                'message' => 'Tambah Proker Gagal, Terjadi kesalahan pada sistem.' . $e->getMessage()
            ]);
        }
    }
    public function storeUser(Request $request)
    {
        $validator = \Validator::make($request->all(), [
            'proker_id' => 'required',
            'name' => 'required',
            'nim' => 'required',
            'phone' => 'required',
            'proker_division_id' => 'required',
        ]);

        // custom validation errors redirect
        if ($validator->fails()) {
            $validator->getMessageBag()->add('storeUser', '1');

            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        try {
            $this->prokerUserRepository->save($request->all());
            return redirect()->back()->with([
                'type' => 'success',
                'message' => 'Tambah Data Anggota Proker Berhasil'
            ]);
        } catch (\Exception $e) {
            return redirect()->back()->with([
                'type' => 'danger',
                'message' => 'Tambah Data Anggota Proker Gagal, Terjadi kesalahan pada sistem.' . $e->getMessage()
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
        $proker = $this->prokerRepository->findById($id);
        if ($proker) {
            return view('dashboard.admin.prokers.show', compact([
                'proker',
            ]));
        } else {
            abort(404);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id, Request $request)
    {
        // $tab_open = $request->get('tab');
        $proker = $this->prokerRepository->findById($id);
        $prokerDivisions = $this->prokerDivisionRepository->get();
        $users = $this->userRepository->get();
        return view('dashboard.admin.prokers.edit', compact([
            'proker',
            'users',
            'prokerDivisions',
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
            'logo' => 'image|mimes:jpeg,jpg,png|max:2048',
            'name' => 'required',
            'description' => 'required',
            'link_registration' => 'required_if:is_registration_open,1',
        ])->validate();

        try {
            $this->prokerRepository->update($id, $request->all());
            return redirect()->route('dashboard.admin.prokers.index')->with([
                'type' => 'success',
                'message' => 'Ubah Proker Berhasil'
            ]);
        } catch (\Exception $e) {
            return redirect()->back()->with([
                'type' => 'danger',
                'message' => 'Ubah Proker Gagal, Terjadi kesalahan pada sistem.' . $e->getMessage()
            ]);
        }
    }

    public function updateStatus(Request $request)
    {
        try {
            $result = $this->prokerRepository->setStatus($request->id, $request->status);
            return redirect()->route('dashboard.admin.prokers.index')->with([
                'type' => 'success',
                'message' => "Ubah Status Data Proker Berhasil, $result data Sudah diubah"
            ]);
        } catch (\Exception $e) {
            dd($e);
            return redirect()->route('dashboard.admin.prokers.index')->with([
                'type' => 'danger',
                'message' => 'Ubah Status Data Proker gagal, Terjadi kesalahan pada sistem.'
            ]);
        }
    }

    public function updateUser(Request $request, $user_id)
    {
        $validator = \Validator::make($request->all(), [
            'name' => 'required',
            'nim' => 'required',
            'proker_division_id' => 'required',
        ]);

        // custom validation errors redirect
        if ($validator->fails()) {
            $validator->getMessageBag()->add('updateUser_user_id', $user_id);

            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        try {
            $this->prokerUserRepository->update($user_id, $request->all());
            return redirect()->back()->with([
                'type' => 'success',
                'message' => 'Ubah Data Anggota Proker Berhasil'
            ]);
        } catch (\Exception $e) {
            return redirect()->back()->with([
                'type' => 'danger',
                'message' => 'Ubah Data Anggota Proker Gagal, Terjadi kesalahan pada sistem.' . $e->getMessage()
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

    public function destroyUser($user_id)
    {
        try {
            $this->prokerUserRepository->delete($user_id);
            return redirect()->back()->with([
                'type' => 'success',
                'message' => 'Hapus Data Anggota Proker Berhasil'
            ]);
        } catch (\Exception $e) {
            return redirect()->back()->with([
                'type' => 'danger',
                'message' => 'Hapus Data Anggota Proker Gagal, Terjadi kesalahan pada sistem.' . $e->getMessage()
            ]);
        }
    }
}
