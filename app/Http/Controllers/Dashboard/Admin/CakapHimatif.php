<?php

namespace App\Http\Controllers\Dashboard\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

use App\Repositories\CakapRepository;

class CakapHimatif extends Controller
{
    protected $cakapRepository;

    public function __construct()
    {
        $this->cakapRepository = new CakapRepository;
    }
    
    public function index(){

        return response(view('dashboard.admin.cakap.index'));
    }
    public function showEmail(Request $request){
        $dataForm = $request->only('id','nama', 'id_form', 'email', 'status');
        // dd($dataForm);
        return response(view('dashboard.admin.cakap.email', compact('dataForm')) );
    }
    
    //
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse 
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|max:2',
            'email' => 'required|unique:form_cakaps,email',
            'id_form' => 'required|unique:form_cakaps,id_form',
        ]);

        try {
            
            $this->cakapRepository->save($request->all());
            // $this->postRepository->save($content);
            return redirect()->route('cakap.show')->with([
                'type' => 'success',
                'message' => 'Berhasil mendaftar'
            ]);
        } catch (\Exception $e) {
            return redirect()->route('dashboard.admin.posts.create')->with([
                'type' => 'danger',
                'message' => 'Pendaftaran Gagal, Terjadi kesalahan pada sistem. Mohon coba sekali lagi'
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroys(Request $request)
    {
        $validator = \Validator::make($request->all(), [
            'id'        => ['required', 'array', 'min:1']
        ]);
        if ($validator->fails()) {
            return redirect()->back()->with([
                'type' => 'danger',
                'message' => 'Hapus Data Post Gagal, id post tidak ditemukan'
            ]);
        }

        try {
            $result = $this->cakapRepository->destroys($request->id);

            return redirect()->route('dashboard.admin.cakap.index')->with([
                'type' => 'success',
                'message' => "Hapus Data Cakap Berhasil, $result data Cakap terhapus"
            ]);
        } catch (\Exception $e) {
            return redirect()->route('dashboard.admin.cakap.index')->with([
                'type' => 'danger',
                'message' => 'Ubah Data Cakap Gagal, Terjadi kesalahan pada sistem.'
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroyskode(Request $request)
    {
        $validator = \Validator::make($request->all(), [
            'id'        => ['required', 'array', 'min:1']
        ]);
        if ($validator->fails()) {
            return redirect()->back()->with([
                'type' => 'danger',
                'message' => 'Hapus Data Post Gagal, id post tidak ditemukan'
            ]);
        }

        try {
            $result = $this->cakapRepository->destroysKode($request->id);

            return redirect()->route('dashboard.admin.cakap.index')->with([
                'type' => 'success',
                'message' => "Hapus Data Cakap Berhasil, $result data Cakap terhapus"
            ]);
        } catch (\Exception $e) {
            return redirect()->route('dashboard.admin.cakap.index')->with([
                'type' => 'danger',
                'message' => 'Ubah Data Cakap Gagal, Terjadi kesalahan pada sistem.'
            ]);
        }
    }

    public function updateKode(Request $request){
        $data = $this->csvToArray($request['data']);
        // dd($data);
        try {
            $result = 0;
            foreach  ($data as $no => $kode){
                $this->cakapRepository->saveKode($kode);
                $result += 1;
            }

            return redirect()->route('dashboard.admin.cakap.index')->with([
                'type' => 'success',
                'message' => "Berhasil menambah $result kode"
            ]);
        } catch (\Exception $e) {
            return redirect()->route('dashboard.admin.cakap.index')->with([
                'type' => 'danger',
                'message' => 'Gagal menambah kode, Terjadi kesalahan pada sistem.'
            ]);
        }
        
    }

    function csvToArray($filename = '', $delimiter = ',')
    {
        if (!file_exists($filename) || !is_readable($filename))
            return false;

        $header = null;
        $data = array();
        if (($handle = fopen($filename, 'r')) !== false)
        {
            while (($row = fgetcsv($handle, 1000, $delimiter)) !== false)
            {
                if (!$header)
                    $header = $row;
                else
                    $data[] = array_combine($header, $row);
            }
            fclose($handle);
        }

        return $data;
    }
}
