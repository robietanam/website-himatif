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
                'label_id' => 'required|exists:label_cakaps,id',
        ], [
            'nama' => "Mohon masukkan nama anda",
            "email" => "Email sudah terdaftar, mohon tunggu info selanjutnya",
            "label_id" => "Mohon pilih Paket",
            "id_form" => "Anda hanya bisa mendaftar 1 kali di 1 device"
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
            ]);
        } catch (\Exception $e) {
            return redirect()->route('frontpage.cakap.show')->with([
                'type' => 'danger',
                'message' => 'Pendaftaran Gagal, Terjadi kesalahan pada sistem. Mohon coba sekali lagi'
            ]);
        }
    }
}
