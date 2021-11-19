<?php
    
namespace App\Services;

use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Repositories\PostRepository;

class PostService
{
    protected $postRepository;

    public function __construct(PostRepository $postRepository)
    {
        $this->postRepository = $postRepository;
    }

    public function changeStatusOf(Request $request, $status) 
    {
        $validator = \Validator::make($request->all(), [
            'id'        => ['required', 'array', 'min:1']
        ]);

        if ($validator->fails()) {
            if ($status === '1') {
                \Session::flash('alert-type', 'danger'); 
                \Session::flash('alert-message', 'Publish Post tidak berhasil, Terjadi kesalahan !'); 
            } else {
                \Session::flash('alert-type', 'danger'); 
                \Session::flash('alert-message', 'Pindah ke Draft Post tidak berhasil, Terjadi kesalahan !'); 
            }

            return redirect()->back();
        }

        return $this->postRepository->setStatus($request->id, $status);
    }
}