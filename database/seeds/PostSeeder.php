<?php

use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $url_dummy_post = "https://jsonplaceholder.typicode.com/posts";
        $json_str = file_get_contents($url_dummy_post);
        $json_obj = json_decode($json_str);
        $posts = [];
        foreach($json_obj as $post){
            $posts[] = [
                'title'         => $post->title,
                'slug'          => \Str::slug($post->title),
                'body'          => $post->body,
                'photo'         => null,
                'user_id'       => mt_rand(1,2),
                'category_id'   => mt_rand(1,3),
            ];
        }
        
        DB::table('posts')->insert($posts);
        $this->command->info("Data Dummy Roles berhasil diinsert");
    }
}
