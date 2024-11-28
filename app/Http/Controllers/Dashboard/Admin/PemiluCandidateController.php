<?php

namespace App\Http\Controllers\Dashboard\Admin;

use App\Http\Controllers\Controller;
use App\Models\PemiluCandidate;
use Illuminate\Http\Request;
use App\Repositories\PemiluCandidateRepository;

class PemiluCandidateController extends Controller
{
    protected $pemiluCandidateRepository;

    public function __construct()
    {
        $this->pemiluCandidateRepository = new PemiluCandidateRepository;
    }

    public function index()
    {
        try {
            $contents = $this->pemiluCandidateRepository->get();
            return view('dashboard.admin.pemilu-candidate.index', compact('contents'));
        } catch (\Exception $e) {
            abort(404);
        }
    }
    public function show()
    {
        return redirect()->route('dashboard.admin.pemilu-candidate.index');
    }
    public function edit($id)
    {
        $candidate = $this->pemiluCandidateRepository->findById($id);
        return view('dashboard.admin.pemilu-candidate.edit', compact('candidate'));
    }
    
    public function create()
    {
        return view('dashboard.admin.pemilu-candidate.create', );
    }

    public function store(Request $request)
    {
        \Validator::make($request->all(), [
            'nama' => 'required',
            'nim' => 'required',
            'photo' => 'image|mimes:jpeg,jpg,png|max:2048',
            'visi' => 'required',
            'misi' => 'required',
        ])->validate();
        
        try {
            $this->pemiluCandidateRepository->save($request->all());
            // $this->postRepository->save($content);
            return redirect()->route('dashboard.admin.pemilu-candidate.index')->with([
                'type' => 'success',
                'message' => 'Tambah Data Kandidat Berhasil'
            ]) ;
        } catch (\Exception $e) {
            throw $e;
            return redirect()->route('dashboard.admin.pemilu-candidate.create')->with([
                'type' => 'danger',
                'message' => 'Tambah Data Kandidat Gagal, Terjadi kesalahan pada sistem.'
            ]);
        }
    }

    public function update(Request $request, $id)
    {
        try {
            $this->pemiluCandidateRepository->update($id, $request->all());
            return redirect()->route('dashboard.admin.pemilu-candidate.index')->with([
                'type' => 'success',
                'message' => 'Ubah Data Post Berhasil'
            ]);
        } catch (\Exception $e) {
            return redirect()->route('dashboard.admin.pemilu-candidate.edit', $id)->with([
                'type' => 'danger',
                'message' => 'Ubah Data Post Gagal, Terjadi kesalahan pada sistem.'
            ]);
        }
    }
    
  
    public function destroys(Request $request)
    {
        $validator = \Validator::make($request->all(), [
            'id'        => ['required', 'array', 'min:1']
        ]);
        if ($validator->fails()) {
            return redirect()->back()->with([
                'type' => 'danger',
                'message' => 'Hapus Data Kandidat Gagal, id kandidat tidak ditemukan'
            ]);
        }

        try {
            $result = $this->pemiluCandidateRepository->destroys($request->id);

            return redirect()->route('dashboard.admin.pemilu-candidate.index')->with([
                'type' => 'success',
                'message' => "Hapus Data Post Berhasil, $result data post terhapus"
            ]);
        } catch (\Exception $e) {
            return redirect()->route('dashboard.admin.pemilu-candidate.index')->with([
                'type' => 'danger',
                'message' => 'Ubah Data Post Gagal, Terjadi kesalahan pada sistem.'
            ]);
        }
    }
}
