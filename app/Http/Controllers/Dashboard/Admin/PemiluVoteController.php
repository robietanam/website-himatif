<?php

namespace App\Http\Controllers\Dashboard\Admin;

use App\Http\Controllers\Controller;
use App\Mail\PemiluMail;
use App\Models\PemiluVote;
use Illuminate\Http\Request;
use App\Repositories\PemiluVoteRepository;
use Illuminate\Support\Facades\Mail;

class PemiluVoteController extends Controller
{
    protected $pemiluVoteRepository;

    public function __construct()
    {
        $this->pemiluVoteRepository = new PemiluVoteRepository;
    }
    
    public function show()
    {
        return redirect()->route('dashboard.admin.pemilu-vote.index');
    }

    public function index()
    {
        try {
            $countAll = $this->pemiluVoteRepository->countTotal();
            
            return view('dashboard.admin.pemilu-vote.index', compact('countAll'));
        } catch (\Exception $e) {
            abort(404);
        }
    }

    public function edit($id)
    {
        $content = $this->pemiluVoteRepository->findById($id);
        return view('dashboard.admin.pemilu-vote.edit', compact('content'));
    }
    
    public function create()
    {
        return view('dashboard.admin.pemilu-vote.create', );
    }
    public function createVoter(Request $request)
    {
        \Validator::make($request->all(), [
            'nim_list' => 'nullable|string',
            'csv' => 'nullable|file|mimes:csv,txt|max:2048',
        ])->validate();
        
        try {
            $this->pemiluVoteRepository->createVoter($request);
            // $this->postRepository->save($content);
            return redirect()->route('dashboard.admin.pemilu-vote.index')->with([
                'type' => 'success',
                'message' => 'Tambah Data Vote Berhasil'
            ]) ;
        } catch (\Exception $e) {
            throw $e;
            return redirect()->route('dashboard.admin.pemilu-vote.index')->with([
                'type' => 'danger',
                'message' => 'Tambah Data Vote Gagal, Terjadi kesalahan pada sistem.'
            ]);
        }
    }
    public function store(Request $request)
    {
        \Validator::make($request->all(), [
            'nim' => 'required',
            'vote_status' => 'required',
            'email_status' => 'required',
        ])->validate();
        
        try {
            $this->pemiluVoteRepository->save($request->all());
            // $this->postRepository->save($content);
            return redirect()->route('dashboard.admin.pemilu-vote.index')->with([
                'type' => 'success',
                'message' => 'Tambah Data Vote Berhasil'
            ]) ;
        } catch (\Exception $e) {
            return redirect()->route('dashboard.admin.pemilu-vote.create')->with([
                'type' => 'danger',
                'message' => 'Tambah Data Vote Gagal, Terjadi kesalahan pada sistem.'
            ]);
        }
    }

    public function update(Request $request, $id)
    {
        
        try {
            $this->pemiluVoteRepository->update($id, $request->data);
            return redirect()->back()->with([
                'type' => 'success',
                'message' => 'Ubah Data Vote Berhasil'
            ]);
        } catch (\Exception $e) {
            return redirect()->route('dashboard.admin.pemilu-vote.edit', $id)->with([
                'type' => 'danger',
                'message' => 'Ubah Data Vote Gagal, Terjadi kesalahan pada sistem.'
            ]);
        }
    }
    
    public function previewEmail(){
        try {

            $details = [
                'nim' => '21241010267',
                'token' => 'KqXcTLRR',
            ];
            return new PemiluMail($details);
        } catch (\Exception $e){
            throw $e;
        }
    }

    public function sendEmail(Request $request){
            
        $validatedData = $request->validate([
            'id' => 'required|array',
            'id.*' => 'required|string|max:255',
            'nim' => 'required|array',
            'nim.*' => 'required|string|max:255',
            'token' => 'required|array',
            'token.*' => 'required|string|max:255',
        ]);   
        
        try {
            for ($i = 0; $i < count($validatedData['id']); $i++) {
                $id = $validatedData['id'][$i];
                $nim = $validatedData['nim'][$i];
                $token = $validatedData['token'][$i];
    
                try {
                    // Prepare the data for the email
                    $data = [
                        'nim' => $nim,
                        'token' => $token,
                    ];
    
                    // Send email to the user
                    Mail::to($nim . '@mail.unej.ac.id')->send(new PemiluMail($data));
                    
                    // Update email status to 1 for success
                    PemiluVote::where('id', $id)->update(['email_status' => 1]);
    
                } catch (\Exception $e) {
                    // Update email status to 2 for failure
                    PemiluVote::where('id', $id)->update(['email_status' => 2]);
    
                    // Log the error message if needed
                    \Log::error('Email sending failed for NIM: ' . $nim . ' - Error: ' . $e->getMessage());
                }
            }
    
            return redirect()->route('dashboard.admin.pemilu-vote.index')->with([
                'type' => 'success',
                'message' => 'Email Berhasil Dikirim'
            ]);
    
        } catch (\Exception $e) {
            // Log the main exception
            \Log::error('Error during email sending process: ' . $e->getMessage());
    
            return redirect()->route('dashboard.admin.pemilu-vote.index')->with([
                'type' => 'danger',
                'message' => 'Kirim, Terjadi kesalahan pada sistem.'
            ]);
        }
    }
    public function refreshToken(Request $request, $id)
    {
        
        try {
            $this->pemiluVoteRepository->refreshToken($id);
            return redirect()->back()->with([
                'type' => 'success',
                'message' => 'Ubah Data Vote Berhasil'
            ]);
        } catch (\Exception $e) {
            return redirect()->route('dashboard.admin.pemilu-vote.edit', $id)->with([
                'type' => 'danger',
                'message' => 'Ubah Data Vote Gagal, Terjadi kesalahan pada sistem.'
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
                'message' => 'Hapus Data Vote Gagal, id voter tidak ditemukan'
            ]);
        }

        try {
            $result = $this->pemiluVoteRepository->destroys($request->id);

            return redirect()->route('dashboard.admin.pemilu-vote.index')->with([
                'type' => 'success',
                'message' => "Hapus Data Vote Berhasil, $result data Vote terhapus"
            ]);
        } catch (\Exception $e) {
            return redirect()->route('dashboard.admin.pemilu-vote.index')->with([
                'type' => 'danger',
                'message' => 'Ubah Data Vote Gagal, Terjadi kesalahan pada sistem.'
            ]);
        }
    }
}
