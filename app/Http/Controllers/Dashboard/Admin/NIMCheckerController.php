<?php

namespace App\Http\Controllers\Dashboard\Admin;

use App\Http\Controllers\Controller;
use App\Models\NIMChecker;
use Illuminate\Http\Request;

use App\Repositories\PageContentRepository;

class NIMCheckerController extends Controller
{
    protected $pageContentRepository;

    public function __construct()
    {
        
        $this->pageContentRepository = new PageContentRepository;
    }
    public function index()
    {
        try {
            $contents = $this->pageContentRepository->get();
            return view('dashboard.admin.nim-checker.index', compact('contents'));
        } catch (\Exception $e) {
            abort(404);
        }
    }
    //
    public function store(Request $request) {
        $dataCollection = collect(json_decode(file_get_contents($request['data']), true));
        
        
        NIMChecker::truncate();
        foreach ($dataCollection as $mhsdata) {
            $data_kuliah = $mhsdata['dataLengkap']['datastatuskuliah'];
            $mhs = $mhsdata['mahasiswa'];
            $data_awal =  $data_kuliah[0];
            $recent_status = end($data_kuliah);

            $angkatan = substr($data_awal['id_smt'], 0, 4);
            $status_akhir = $recent_status['nm_stat_mhs'];

            if ($status_akhir == "Drop-Out/Putus Studi"){
                continue;
            }

            $nimChecker = new NIMChecker;
            
            $nimChecker->name = $mhs['nama'];
            $nimChecker->id = $mhs['id'];
            $nimChecker->nim = $mhs['nipd'];
            $nimChecker->angkatan = $angkatan;
            $nimChecker->status = $status_akhir;

    
            $nimChecker->save();
        }
         
        return redirect()->route('dashboard.admin.nim-checker.index')->with([
            'type' => 'success',
            'message' => 'Tambah Data NIM Berhasil'
        ]);
    }
}
