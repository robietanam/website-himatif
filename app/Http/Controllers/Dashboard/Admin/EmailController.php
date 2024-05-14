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
        ];
        return view('mail.CakapMail', compact('details'));
    }
    public function emailCakaps(Request $request)
    {
        
        //define validation rules
        $validator = Validator::make($request->all(), [
            'data'     => 'required',
        ]);

        //check if validation fails
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        
        $data = $request->data;

        $details = [
            'nama' => $data['nama'],
            'email' =>  $data['email'],
            'kode' => $data['kode']
            ];
           
        Mail::to($data['email'])->send(new \App\Mail\CakapMail($details));
        
        dd("Email sudah terkirim.");

    }
    public function index(){

        
    
        }
}

?>