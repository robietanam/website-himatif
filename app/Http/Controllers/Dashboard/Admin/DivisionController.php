<?php

namespace App\Http\Controllers\Dashboard\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\DivisionRepository;

class DivisionController extends Controller
{
    private $divisionRepository;

    public function __construct()
    {
        $this->divisionRepository = new DivisionRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $divisions = $this->divisionRepository->get();
        return view('dashboard.admin.divisions.index', compact('divisions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $divisionParents = $this->divisionRepository->getParent();
        return view('dashboard.admin.divisions.create', compact('divisionParents'));
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
            'name_slug' => 'required',
            'description' => 'required',
        ])->validate();

        try {
            $this->divisionRepository->save($request->all());
            return redirect()->route('dashboard.admin.divisions.index')->with([
                'type' => 'success',
                'message' => 'Tambah Data Divisi Berhasil'
            ]);
        } catch (\Exception $e) {
            return redirect()->route('dashboard.admin.divisions.create')->with([
                'type' => 'danger',
                'message' => 'Tambah Data Divisi Gagal, Terjadi kesalahan pada sistem.'
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
        $divisionParents = $this->divisionRepository->getParent();
        $division = $this->divisionRepository->findById($id);

        if (!$division) {
            abort(404);
        }

        return view('dashboard.admin.divisions.edit', compact([
            'division',
            'divisionParents'
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
            'name_slug' => 'required',
            'description' => 'required',
        ])->validate();

        try {
            $this->divisionRepository->update($id, $request->all());
            return redirect()->route('dashboard.admin.divisions.index')->with([
                'type' => 'success',
                'message' => 'Ubah Data Divisi Berhasil'
            ]);
        } catch (\Exception $e) {
            dd($e);
            return redirect()->route('dashboard.admin.divisions.edit', $id)->with([
                'type' => 'danger',
                'message' => 'Ubah Data Divisi Gagal, Terjadi kesalahan pada sistem.'
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
