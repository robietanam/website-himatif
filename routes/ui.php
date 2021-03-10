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

Route::view('404', '_ui.frontpage.modules.404');

Route::view('about', '_ui.frontpage.modules.about');
