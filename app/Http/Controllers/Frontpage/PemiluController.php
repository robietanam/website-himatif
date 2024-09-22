<?php

namespace App\Http\Controllers\Frontpage;

use App\Http\Controllers\Controller;
use App\Models\PemiluCandidate;
use App\Models\PemiluVote;
use Illuminate\Http\Request;

use App\Repositories\PemiluVoteRepository;
use App\Repositories\PemiluCandidateRepository;

class PemiluController extends Controller
{
    protected $pemiluVoteRepository; 
    protected $pemiluCandidateRepository; 

    public function __construct()
    {
        $this->pemiluVoteRepository = new PemiluVoteRepository;
        $this->pemiluCandidateRepository = new PemiluCandidateRepository;
    }

    public function showPemilu()
    {
        $candidates =  $this->pemiluCandidateRepository->get();
        return view('frontpage.modules.pemilu-index',  compact('candidates'));
    }

    public function votePemilu()
    {
        $candidates =  $this->pemiluCandidateRepository->get();
        return view('frontpage.modules.pemilu-vote',  compact('candidates'));
    }

    public function infoPemilu()
    {
        return view('frontpage.modules.pemilu-info', );
    }

    public function vote(Request $request)
{

    // Validate the request data
    $messages = [
        'nim.required' => 'NIM harus diisi.',
        'nim.digits' => 'NIM harus terdiri dari 12 digit angka.',
        'token.required' => 'Token harus diisi.',
        'candidate_id.required' => 'Anda harus memilih seorang kandidat.',
    ];

    // Validate the request data
    $validator = \Validator::make($request->all(), [
        'nim' => 'required|digits:12',  // NIM must be exactly 12 digits
        'token' => 'required|string|max:255',
        'candidate_id' => 'required|integer',
    ], $messages);

    // If validation fails, redirect back with errors
    if ($validator->fails()) {
        return redirect()->back()->with([
            'type' => 'error',
            'message' => $validator->errors()->first() // Use the first error message
        ])->withInput();
    }
    
    $candidate = PemiluCandidate::find($request->candidate_id);
    if (!$candidate) {
        return redirect()->back()->with([
            'type' => 'error',
            'message' => 'Kandidat yang Anda pilih tidak ditemukan, silahkan hubungi panitia bila ada kesalahan.'
        ]);
    }

    $voter = PemiluVote::where('nim', $request->nim)->first();
    if (!$voter) {
        return redirect()->back()->with([
            'type' => 'error',
            'message' => 'NIM anda belum terdaftar, silahkan hubungi panitia bila ada kesalahan.'
        ]);
    }

    if ($voter->vote_status !== 0) {
        return redirect()->back()->with([
            'type' => 'error',
            'message' => 'Suara sudah pernah dipakai, silahkan hubungi panitia bila ada kesalahan.'
        ]);
    }
    
    if ($voter->token !== $request->token) {
        return redirect()->back()->with([
            'type' => 'error',
            'message' => 'Token tidak valid, silahkan hubungi panitia bila ada kesalahan.'
        ]);
    }

    $voter->update([
        'vote_status' => $request->candidate_id,
    ]);

    return redirect()->route('frontpage.pemilu.info', ['status' => 'success']);
}
}
