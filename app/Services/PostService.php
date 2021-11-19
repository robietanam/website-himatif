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

    /**
     * Get datatable posts.
     *
     * @return mixed
     */
    public function getDatatable()
    {
        return $this->postRepository->getDatatable();
    }

    /**
     * Get Post for frontpage 'load more'
     *
     * @return Collection
     */
    public function get(int $limit)
    {
        return $this->postRepository->get($limit);
    }

    /**
     * Validate post data.
     * Store to DB if there are no errors.
     *
     * @param array $data
     * @return String
     */
    public function save($data)
    {
        try {
            $validator = Validator::make($data, [
                'title' => 'required',
                'slug' => 'required',
                'photo' => 'image|mimes:jpeg,jpg,png|max:2048',
            ]);


            if ($validator->fails()) {
                throw new \InvalidArgumentException((array) json_decode($validator->errors()));
            }

            return $this->postRepository->save($data);
        } catch (\Throwable $t) {
            throw $t;
            return false;
        }
    }
}
