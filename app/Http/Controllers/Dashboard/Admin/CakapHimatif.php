<?php

namespace App\Http\Controllers\Dashboard\Admin;

use App\Http\Controllers\Controller;
use App\Models\FormCakap;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Mail\CakapKodeMail;

use App\Repositories\CakapRepository;
use Illuminate\Support\Facades\Mail;

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
        // dd($dataForm);
        return response(view('dashboard.admin.cakap.email', compact('dataForm')) );
    }
    public function previewCakap(){
        $details = [
            'nama' => 'Test Nama',
            'email' => 'testmail123@mail.com',
            'kode' => '232324',
            'label' => 'Kode1'
        ];
        return new CakapKodeMail($details, storage_path("app/termsCakap/TnC English Club 3 Months - Cakap x Himatif Unej.pdf"));
    }

    public function sendEmail(Request $request){
        $validatedData = $request->validate([
            'id' => 'required|array',
            'id.*' => 'required|string|max:255',
            'nama' => 'required|array',
            'nama.*' => 'required|string|max:255',
            'email' => 'required|array',
            'email.*' => 'required|string|email|max:255',
            'id_form' => 'required|array',
            'id_form.*' => 'required|string|max:255',
            'kode' => 'required|array',
            'kode.*' => 'required|string|max:255',
            'label' => 'required|array',
            'label.*' => 'required|string|max:255',
            'status' => 'required|array',
            'status.*' => 'required|string|in:0,1,2',
        ]);
        $pathTerms = [
            "Cakap English Club 3 Bulan" => storage_path("app/termsCakap/TnC English Club 3 Months - Cakap x Himatif Unej.pdf"),
            "Cakap Japanese Club 3 Bulan" => storage_path("app/termsCakap/TnC Japanese Club 3 Months - Cakap x Himatif Unej.pdf"),
            "Belajar Mengolah Data untuk Calon Data Engineer" => storage_path("app/termsCakap/TnC Self Paced Learning Belajar Mengolah Data untuk Calon Data Engineer - Cakap x Himatif Unej.pdf"),
            "Belajar Memproduksi Sebuah Karya Animasi 2D untuk Calon Animator" => storage_path("app/termsCakap/TnC Self Paced Learning Belajar Memproduksi Sebuah Karya Animasi 2D untuk Calon Animator - Cakap x Himatif Unej.pdf"),
        ];
        foreach ($validatedData['id'] as $id) {
            $formCakap = FormCakap::find($id);

            if ($formCakap) {
                try {
                    $details = [
                        'nama' => $formCakap->nama,
                        'email' =>  $formCakap->email,
                        'kode' => $formCakap->cakapKode->kode,
                        'label' => $formCakap->label->name,
                        ];
                    // Update the form status to 1 after email is successfully sent
                    $formCakap->update(['status' => '1']);
                    
                    
                    $termsFilePath = $pathTerms[$formCakap->label->name];
                    // Send email to the user
                    Mail::to($formCakap->email)->send(new CakapKodeMail($details, $termsFilePath));

                    return redirect()->route('dashboard.admin.cakap.index')->with([
                        'type' => 'success',
                        'message' => 'Email Berhasil Dikirim'
                    ]);
                } catch (\Exception $e) {
                    
                    $formCakap->update(['status' => '2']);
                    throw $e;
                    // Log the error or handle it as necessary
                    // Optionally update the form status to indicate failure
                    
                }
            }
        }

        return redirect()->route('dashboard.admin.cakap.index')->with([
            'type' => 'success',
            'message' => 'Terdapat Error'
        ]);
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
            throw $e;
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
