<?php
namespace App\Traits;

use Exception;
use App\Models\Post;

/**
 *
 */
trait SlugGeneratorTrait
{
    /**
     * @param string $type ['post']
     * @param string $name
     *
     * @return string
     */
    public function generate_slug(string $type, string $name) : string
    {
        $slug = preg_replace('/[^A-Za-z0-9 ]/', '', $name);
        $slug = str_replace(' ', '-', $slug);

        switch ($type) {
            case 'post':
                $data = Product::where('slug', $slug)->first();
                break;
            default:
                throw new Exception("Invalid slug type", 500);
                break;
        }

        if(!empty($data)){
            return $this->generate_slug($type, $name.' '.mt_rand(0, 20));
        }

        return $slug;
    }
}

