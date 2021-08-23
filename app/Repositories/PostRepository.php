<?php

namespace App\Repositories;

use App\Post;

class PostRepository
{
    protected $post;

    public function __construct(Post $post)
    {   
        $this->post = $post;
    }

    /** 
     * Change Status of Post
     * 
     * @param $ids, $status
     * @return \Illuminate\Http\Response
     */ 
    public function setStatus($ids, $status)
    {
        $query = "id = $ids[0]";
        if (count($ids) > 1) {
            for ($i=1; $i < count($ids); $i++) { 
                $query .= " or id = $ids[$i]";
            }
        }

        $result = \DB::table('posts')->whereRaw($query)->update(['status' => $status]);
        \Session::flash('alert-type', 'success'); 
        \Session::flash('alert-message', 'Status Post Berhasil Diubah !'); 
        return redirect()->back();
    }
}