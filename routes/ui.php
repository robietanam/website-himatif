<?php

/*
|--------------------------------------------------------------------------
| UI Routes
|--------------------------------------------------------------------------
|
| This Routes for frontend Development
| just run for local development
| please use it for local
|
*/
// For Documentation
Route::view('docs', '_ui.frontpage._docs.index');

Route::view('homepage', '_ui.frontpage.modules.homepage');
<<<<<<< HEAD

Route::view('404', '_ui.frontpage.modules.404');

=======
Route::view('blog', '_ui.frontpage.modules.blog');
Route::view('blogs', '_ui.frontpage.modules.blogs');
>>>>>>> 3225209ea033bddf59ced81520136fb10bd3a44a
Route::view('about', '_ui.frontpage.modules.about');
