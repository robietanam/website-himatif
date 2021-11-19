<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::view('dashboard/admin/keanggotaan', 'dashboard.admin.keanggotaan.index');

Auth::routes();

Route::group(['prefix' => 'dashboard/admin', 'namespace' => 'Dashboard\Admin', 'as' => 'dashboard.admin.'], function () {
    // Route::get('/', 'DashboardController@index')->name('index');
    // Route::get('/profile', 'DashboardController@profile')->name('profile');

    // keanggotaan
    // Route::get('keanggotaan/export', 'KeanggotaanController@export')->name('keanggotaan.export');
    // Route::resource('keanggotaan', 'KeanggotaanController')->except([ 'destroy' ]);
    // Route::delete('keanggotaan/delete', 'KeanggotaanController@delete')->name('keanggotaan.delete');

    // posts
    // Route::put('posts/publish', 'PostController@publish')->name('posts.publish');
    // Route::put('posts/draft', 'PostController@draft')->name('posts.draft');
    Route::resource('posts', 'PostController')->except(['destroy']);
    Route::delete('posts/destroys', 'PostController@destroys')->name('posts.destroys');

    // pages
    Route::get('page-contents', 'PageController@index')->name('page-contents.index');
    Route::get('page-contents/{id}/edit', 'PageController@edit')->name('page-contents.edit');
    Route::put('page-contents/{id}', 'PageController@update')->name('page-contents.update');
});

Route::group(['prefix' => 'dashboard/ajax', 'namespace' => 'Ajax', 'as' => 'ajax.'], function () {
    // Posts
    Route::get('posts', 'PostController@getPosts')->name('getPosts');
});

Route::group(['namespace' => 'Frontpage', 'as' => 'frontpage.'], function () {
    // Posts
    Route::get('/', 'HomepageController@getHomepage')->name('homepage');
    Route::get('tentang', 'HomepageController@getAbout')->name('about');
});

// Route::view('/', 'frontpage.modules.beranda')->name('frontpage.home');
// Route::view('pengurus', 'frontpage.modules.pengurus')->name('frontpage.members');
// Route::view('postingan/', 'frontpage.modules.blogs-index');
// Route::view('postingan/{slug}', 'frontpage.modules.blogs-show');
