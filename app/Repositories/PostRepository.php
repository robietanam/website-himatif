<?php

namespace App\Repositories;

use Yajra\DataTables\DataTables;
use App\Models\Post;

class PostRepository
{
    /**
     * Get datatable for ajax
     *
     * @return mixed
     */
    public function getDatatable()
    {
        $posts = Post::orderBy('created_at', 'desc')->get();
        return DataTables::of($posts)
            ->addColumn('photo', function ($post) {
                if ($post->photo) {
                    return '<div class="img-wrapper img-wrapper-table"><img src=' . asset('storage/' . $post->photo) . ' alt=""></div>';
                } else {
                    return '<div class="img-wrapper img-wrapper-table"><i class="fas fa-image text-white"></i></div>';
                }
            })
            ->addColumn('title', function ($post) {
                return $post->title;
            })
            ->addColumn('slug', function ($post) {
                return "<a href=" . route('dashboard.admin.posts.show', $post->slug) . ">$post->slug</a>";
            })
            ->addColumn('category', function ($post) {
                return $post->category->name ?? '-';
            })
            ->addColumn('status', function ($post) {
                return $post->status === '1' ?
                    '<span class="badge badge-success"><i class="fas fa-share-square mr-1"></i> Published</span>' :
                    '<span class="badge badge-secondary"><i class="fas fa-archive mr-1"></i> Draft</span>';
            })
            ->addColumn('is_featured', function ($post) {
                return $post->is_featured ?
                    '<span class="badge badge-success"><i class="fas fa-check"></i></span>' :
                    '<span class="badge badge-secondary"><i class="fas fa-minus-square"></i></span>';
            })
            ->addColumn('body', function ($post) {
                return substr(strip_tags($post->body), 0, 40) . ((strlen(strip_tags($post->body)) > 40) ? '...' : '');
            })
            ->addColumn('created_at', function ($post) {
                return \Carbon\Carbon::parse($post->created_at)->translatedFormat('d F Y');
            })
            ->addColumn('user_id', function ($post) {
                return $post->user->name ?? '-';
            })
            ->rawColumns(['slug', 'photo', 'status', 'is_featured'])
            ->make(true);
    }

    /**
     * @return Collection
     */
    public function get(int $limit = 8, array $condition = [], array $orCondition = [])
    {
        return Post::orderBy('created_at', 'desc')
            ->when(count($condition) > 0, function ($q) use ($condition) {
                $q->where($condition);
            })
            ->when(count($orCondition) > 0, function ($q) use ($orCondition) {
                $q->orWhere($orCondition);
            })
            ->limit($limit)->get();
    }

    public function count(array $condition = [])
    {
        return Post::when(count($condition) > 0, function ($q) use ($condition) {
            $q->where($condition);
        })->count();
    }

    /**
     * Get Post by id
     *
     * @param int $id
     * @return Post
     */
    public function findById($id)
    {
        return Post::find($id);
    }

    /**
     * Get Post by slug
     *
     * @param string slug
     * @return Post
     */
    public function findBySlug($slug)
    {
        return Post::where('slug', $slug)->first();
    }

    /**
     * @param Post $data
     * @return Post
     */
    public function save($data)
    {
        try {
            $slug = \Str::slug($data['title'], '-');

            $post = new Post;
            $post->title = $data['title'];
            $post->body = \Purifier::clean($data['body']);
            $post->category_id = $data['category_id'];
            $post->slug = $this->findBySlug($slug) ? $slug .= '-' . \Str::random(5) . time() : $slug;
            $post->created_at = now();
            $post->user_id = \Auth::user()->id ?? 1;

            // check if has photo request
            if (isset($data['photo'])) {
                $post->photo = $data['photo']->store('photo/post', 'public');
            }

            $post->save();
            return $post->fresh();
        } catch (\Throwable $t) {
            report($t);
            throw $t;
        }
    }

    /**
     * @param int $id
     * @param Post $data
     * @return Post
     */
    public function update($id, $data)
    {
        try {
            $slug = \Str::slug($data['title'], '-');

            $post = Post::find($id);
            $post->title = $data['title'];
            $post->body = \Purifier::clean($data['body']);
            $post->category_id = $data['category_id'];
            $post->updated_at = now();

            // check if slug is changing
            if ($post->slug !== $slug) {
                if ($this->findBySlug($slug)) {
                    $slug .= '-' . \Str::random(5) . time();
                }
                $post->slug = $slug;
            }

            // check if has photo request
            if (isset($data['photo'])) {
                if ($post->photo && file_exists(storage_path('app/public/' . $post->photo))) {
                    \Storage::delete('public/' . $post->photo);
                }
                $post->photo = $data['photo']->store('photo/post', 'public');
            }

            $post->save();
            return $post;
        } catch (\Throwable $t) {
            report($t);
            throw $t;
        }
    }

    /**
     * @param array ids
     */
    public function destroys(array $ids)
    {
        $query = "id = $ids[0]";
        if (count($ids) > 1) {
            foreach ($ids as $i => $id) {
                // skip index 0, already appened on '$query'
                if ($i !== 0) $query .= " or id = $id";
            }
        }

        $result = \DB::table('posts')->whereRaw($query)->delete();

        return $result;
    }
}
