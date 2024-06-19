<?php 

namespace App\Http\Controllers\Dashboard\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class EmailController extends Controller
{
    public function previewCakap(){
        $details = [
            'nama' => 'Test Nama',
            'email' => 'testmail123@mail.com',
            'kode' => '232324',
            'label' => 'Kode1'
        ];
        return view('mail.CakapMail', compact('details'));
    }
    public function emailCakaps(Request $request)
    {
        
        //define validation rules
        $validatedData = $request->validate([
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
        dd($validatedData);

        //check if validation fails
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        
        $data = $request->data;

        $details = [
            'nama' => $data['nama'],
            'email' =>  $data['email'],
            'kode' => $data['kode'],
            'label' => $data['label'],
            ];
           
        Mail::to($data['email'])->send(new \App\Mail\CakapMail($details));
        
        dd("Email sudah terkirim.");

    }
    public function index(){

        
    
        }
}

?>