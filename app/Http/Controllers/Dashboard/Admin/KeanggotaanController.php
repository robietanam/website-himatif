<?php

namespace App\Http\Controllers\Dashboard\Admin;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;

class KeanggotaanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.admin.keanggotaan.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $divisions = \App\Division::all();
        $roles = \App\Role::all();
        return view('dashboard.admin.keanggotaan.create')->with([
            'divisions' => $divisions,
            'roles' => $roles,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validation = \Validator::make($request->all(), [
            'name'              => 'required|min:5|max:191',
            'nim'               => 'required|numeric|digits:12',
            'email'             => 'required|email|unique:users',
            'password'          => 'required|min:8',
            'phone'             => 'digits_between:10,12',
            'photo'             => 'image|mimes:jpeg,jpg,png|max:2048',
            'status'            => 'required',
            'division_id'       => 'required',
            'role_id'           => 'required'
        ])->validate();

        $user = new User;
        if ($request->file('photo')) {
            $file = $request->file('photo')->store('photo/anggota', 'public');
            $user->photo = $file;
        }
        $user->name = $request->name;
        $user->nim = $request->nim;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->phone = $request->phone;
        $user->status = $request->status;
        $user->year_entry = $request->year_entry;
        $user->created_at = now();
        $user->division_id = $request->division_id;
        $user->role_id = $request->role_id;
        $user->save();

        \Session::flash('alert-type', 'success'); 
        \Session::flash('alert-message', 'Data Anggota Berhasil Ditambahkan!');

        return redirect()->route('dashboard.admin.keanggotaan.create');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $divisions = \App\Division::all();
        $roles = \App\Role::all();
        $user = User::find($id);

        return view('dashboard.admin.keanggotaan.edit')->with([
            'user' => $user,
            'divisions' => $divisions,
            'roles' => $roles,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validation = \Validator::make($request->all(), [
            'name'              => 'required|min:5|max:191',
            'nim'               => 'numeric|digits:12',
            'email'             => 'email|unique:users',
            'phone'             => 'digits_between:10,12',
            'photo'             => 'image|mimes:jpeg,jpg,png|max:2048',
            'status'            => 'required',
            'division_id'       => 'required',
            'role_id'           => 'required'
        ])->validate();

        $user = User::find($id);
        if ($request->file('photo')) {
            if($user->photo && file_exists(storage_path('app/public/' . $user->photo))){
                \Storage::delete('public/'.$user->photo);
            }
            $file = $request->file('photo')->store('photo/anggota', 'public');
            $user->photo = $file;
        }
        $user->name = $request->name;
        $user->phone = $request->phone;
        $user->status = $request->status;
        $user->year_entry = $request->year_entry;
        $user->updated_at = now();
        $user->division_id = $request->division_id;
        $user->role_id = $request->role_id;
        $user->save();

        \Session::flash('alert-type', 'success'); 
        \Session::flash('alert-message', 'Data Anggota Berhasil Ditambahkan!');

        return redirect()->route('dashboard.admin.keanggotaan.edit', $id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function delete(Request $request)
    {
        $validator = \Validator::make($request->all(), [
            'id'        => ['required', 'array', 'min:1']
        ]);
        if ($validator->fails()) {
            \Session::flash('alert-type', 'danger'); 
            \Session::flash('alert-message', 'Hapus Data gagal, Terjadi kesalahan !'); 

            return redirect()->route('dashboard.admin.keanggotaan.index');
        }

        $ids = $request->id;
        $query = "id = $ids[0]";
        if (count($ids) > 1) {
            for ($i=1; $i < count($ids); $i++) { 
                $query .= " or id = $ids[$i]";
            }
        }

        $result = \DB::table('users')->whereRaw($query)->delete();
        \Session::flash('alert-type', 'success'); 
        \Session::flash('alert-message', 'Hapus Data Berhasil !'); 
        return redirect()->route('dashboard.admin.keanggotaan.index');
    }
}
