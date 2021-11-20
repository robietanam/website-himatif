<?php

namespace App\Repositories;

use App\Models\PageContent;

class PageContentRepository
{

    /**
     * Get all contents
     *
     * @param int id
     * @return Collection PageContent
     */
    public function get()
    {
        return PageContent::all();
    }

    /**
     * Find Content by slug
     *
     * @param string $slug
     * @return Collection PageContent
     */
    public function findBySlug($slug)
    {
        return PageContent::where('slug', $slug)->first();
    }

    /**
     * Find Content by id
     *
     * @param int id
     * @return Collection PageContent
     */
    public function find($id)
    {
        return PageContent::find($id);
    }

    /**
     * Update Content
     *
     * @param int $id
     * @param PageConent $data
     * @return Collection PageContent
     */
    public function updateContentData($id, $data)
    {
        try {
            $content = PageContent::find($id);

            $content->data = json_decode(($content->data));
            foreach ($data as $i => $value) {
                // dd($content->data->$i->content);
                // dd($value['type'] === 'image' && isset($value['content']));
                if ($value['type'] === 'image') {
                    if (isset($value['content'])) {
                        if ($content->data->$i && file_exists(storage_path('app/public/' . $content->data->$i->content))) {
                            \Storage::delete('public/photo/' . $content->data->$i->content);
                        }
                        $content->data->$i->content = $value['content']->store("photo/page-contents", 'public');
                    }
                } else if ($value['type'] === 'mediumtext') {
                    $content->data->$i->content = \Purifier::clean($value['content']);
                } else {
                    $content->data->$i->content = $value['content'];
                }
            }

            $content->data = json_encode($content->data);
            $content->save();
            return $content;
        } catch (\Throwable $t) {
            report($t);
            throw $t;
        }
    }
}
