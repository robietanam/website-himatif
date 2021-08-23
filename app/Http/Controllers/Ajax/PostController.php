<?php

namespace App\Http\Controllers\Ajax;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class PostController extends Controller
{
    public function getPosts(Request $request)
    {
        $posts = \App\Post::all();
        return DataTables::of($posts)
            ->addColumn('photo', function($post) {
                if ($post->photo) {
                    return '<div class="img-wrapper img-wrapper-table"><img src='. asset('storage/'.$post->photo) .' alt=""></div>';
                } else {
                    return '<div class="img-wrapper img-wrapper-table"><i class="fas fa-image text-white"></i></div>';
                }
            })
            ->addColumn('title', function($post){
                return $post->title;
            })
            ->addColumn('slug', function($post){
                return $post->slug;
            })
            ->addColumn('category', function($post){
                return $post->category->name;
            })
            ->addColumn('status', function($post){
                return $post->status === '1' ? 
                    '<span class="badge badge-success"><i class="fas fa-share-square mr-1"></i> Published</span>' :
                    '<span class="badge badge-secondary"><i class="fas fa-archive mr-1"></i> Draft</span>';
            })
            ->addColumn('is_featured', function($post){
                return $post->is_featured ? 
                    '<span class="badge badge-success"><i class="fas fa-check"></i></span>' :
                    '<span class="badge badge-secondary"><i class="fas fa-minus-square"></i></span>';
            })
            ->addColumn('body', function($post){
                return substr(strip_tags($post->body), 0, 40).( (strlen(strip_tags($post->body)) > 40) ? '...' : ''  );
            })
            ->addColumn('created_at', function($post){
                return \Carbon\Carbon::parse($post->created_at)->translatedFormat('d F Y');
            })
            ->addColumn('user_id', function($post){
                return $post->user->name;
            })->rawColumns(['photo', 'status', 'is_featured'])->make(true);
    }
}
