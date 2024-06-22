<?php

namespace App\Http\Controllers\Frontpage;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Repositories\CakapRepository;

class CakapHimatifFrontpageController extends Controller
{
    protected $cakapRepository; 

    public function __construct()
    {
        $this->cakapRepository = new CakapRepository;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse 
     */
    public function store(Request $request)
    {

        $request->request->add(['id_form'=> $request->cookie('id_form')]);
        
        $request->validate([
            'nama' => 'required|string|max:255',
                'email' => 'required|string|email|max:255|unique:form_cakaps',
                'id_form' => 'required|string|max:255|unique:form_cakaps',
                'bukti_pendaftaran' => 'required|image|mimes:jpeg,jpg,png|max:2048',
                'label_id' => 'required|exists:label_cakaps,id',
        ], [
            'nama.required' => "Mohon masukkan nama anda",
            'email.unique' => "Email sudah terdaftar, mohon tunggu info selanjutnya",
            'label_id.required' => "Mohon pilih Paket",
            'id_form.unique' => "Anda hanya bisa mendaftar 1 kali di 1 device",
            'bukti_pendaftaran.required' => 'Mohon unggah bukti follow',
            'bukti_pendaftaran.max' => 'Ukuran bukti follow tidak boleh lebih dari 2MB',
            'bukti_pendaftaran.image' => 'Bukti follow harus berupa gambar',
            'bukti_pendaftaran.mimes' => 'Bukti follow harus berupa file dengan format jpeg, jpg, atau png',
         ]
    );
            
        if ($request->hasCookie('id_form') == false){
            return redirect()->route('frontpage.cakap.show')->with([
                'type' => 'danger',
                'message' => 'Pendaftaran Gagal, Terjadi kesalahan pada sistem. Mohon refresh browser'
            ]);
        }

        try {
            $this->cakapRepository->save($request);
            // $this->postRepository->save($content);
            return redirect()->route('frontpage.cakap.show')->with([
                'type' => 'success',
                'message' => 'Berhasil mendaftar'
            ])->withCookie(cookie()->forever('cakap_form_success', true));
        } catch (\Exception $e) {
            return redirect()->route('frontpage.cakap.show')->with([
                'type' => 'danger',
                'message' => 'Pendaftaran Gagal, Terjadi kesalahan pada sistem. Mohon coba sekali lagi'
            ]);
        }
    }
}
