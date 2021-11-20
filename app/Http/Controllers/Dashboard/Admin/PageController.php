<?php

namespace App\Http\Controllers\Dashboard\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\PageContentRepository;
use App\Repositories\PageRepository;

class PageController extends Controller
{
    protected $pageContentRepository;

    public function __construct()
    {
        $this->pageContentRepository = new PageContentRepository;
    }

    public function index()
    {
        try {
            $contents = $this->pageContentRepository->get();
            return view('dashboard.admin.page-contents.index', compact('contents'));
        } catch (\Exception $e) {
            abort(404);
        }
    }

    public function edit($id)
    {
        $content = $this->pageContentRepository->find($id);
        return view('dashboard.admin.page-contents.edit', compact('content'));
    }

    public function update(Request $request, $id)
    {
        $request_validation = [];
        $validation = [];

        foreach ($request->data as $i => $data) {
            $request_validation["data[$i][content]"] = $data['content'] ?? '';
            switch ($data['type']) {
                case 'image':
                    $validation["data[$i][content]"] = 'image|mimes:jpeg,jpg,png|max:2048';
                    break;
                default:
                    $validation["data[$i][content]"] = 'required';
                    break;
            }
        }

        \Validator::make($request_validation, $validation)->validate();

        try {
            $this->pageContentRepository->updateContentData($id, $request->data);
            return redirect()->back()->with([
                'type' => 'success',
                'message' => 'Ubah Data Post Berhasil'
            ]);
        } catch (\Exception $e) {
            return redirect()->route('dashboard.admin.page-contents.edit', $id)->with([
                'type' => 'danger',
                'message' => 'Ubah Data Post Gagal, Terjadi kesalahan pada sistem.'
            ]);
        }
    }
}
