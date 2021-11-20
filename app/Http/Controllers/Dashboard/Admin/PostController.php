<?php

namespace App\Http\Controllers\Dashboard\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\PostRepository;
use App\Repositories\CategoryRepository;

class PostController extends Controller
{
    protected $postRepository;
    protected $categoryRepository;

    public function __construct()
    {
        $this->postRepository = new PostRepository;
        $this->categoryRepository = new CategoryRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.admin.posts.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = $this->categoryRepository->get();
        return view('dashboard.admin.posts.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        \Validator::make($request->all(), [
            'title' => 'required',
            'body' => 'required',
            'photo' => 'image|mimes:jpeg,jpg,png|max:2048',
            'category_id' => 'required',
        ])->validate();

        try {
            $this->postRepository->save($request->all());
            return redirect()->route('dashboard.admin.posts.index')->with([
                'type' => 'success',
                'message' => 'Tambah Data Post Berhasil'
            ]);
        } catch (\Exception $e) {
            return redirect()->route('dashboard.admin.posts.create')->with([
                'type' => 'danger',
                'message' => 'Tambah Data Post Gagal, Terjadi kesalahan pada sistem.'
            ]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $post = $this->postRepository->findBySlug($slug);
        if ($post) {
            return view('dashboard.admin.posts.show', compact('post'));
        } else {
            abort(404);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = $this->postRepository->findById($id);
        $categories = $this->categoryRepository->get();

        return view('dashboard.admin.posts.edit', compact(['post', 'categories']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        \Validator::make($request->all(), [
            'title' => 'required',
            'body' => 'required',
            'photo' => 'image|mimes:jpeg,jpg,png|max:2048',
            'category_id' => 'required',
        ])->validate();

        try {
            $this->postRepository->update($id, $request->all());

            return redirect()->route('dashboard.admin.posts.index')->with([
                'type' => 'success',
                'message' => 'Ubah Data Post Berhasil'
            ]);
        } catch (\Exception $e) {
            dd($e);
            return redirect()->route('dashboard.admin.posts.edit', $id)->with([
                'type' => 'danger',
                'message' => 'Ubah Data Post Gagal, Terjadi kesalahan pada sistem.'
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
            $result = $this->postRepository->destroys($request->id);

            return redirect()->route('dashboard.admin.posts.index')->with([
                'type' => 'success',
                'message' => "Hapus Data Post Berhasil, $result data post terhapus"
            ]);
        } catch (\Exception $e) {
            return redirect()->route('dashboard.admin.posts.index')->with([
                'type' => 'danger',
                'message' => 'Ubah Data Post Gagal, Terjadi kesalahan pada sistem.'
            ]);
        }
    }
}
