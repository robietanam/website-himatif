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

// Admin Routes
Route::group(['middleware' => ['auth', 'role:admin'], 'prefix' => 'dashboard/admin', 'namespace' => 'Dashboard\Admin', 'as' => 'dashboard.admin.'], function () {
    Route::get('/', 'DashboardController@index')->name('index');
    // Route::get('/profile', 'DashboardController@profile')->name('profile');

    // keanggotaan / user
    Route::resource('users', 'UserController')->except(['destroy']);
    Route::put('users/{user}/update-password', 'UserController@updatePassword')->name('users.update-password');
    // Route::get('keanggotaan/export', 'KeanggotaanController@export')->name('keanggotaan.export');
    // Route::delete('keanggotaan/delete', 'KeanggotaanController@delete')->name('keanggotaan.delete');

    // posts
    // Route::put('posts/publish', 'PostController@publish')->name('posts.publish');
    // Route::put('posts/draft', 'PostController@draft')->name('posts.draft');
    Route::resource('posts', 'PostController')->except(['destroy']);
    Route::delete('posts/destroys', 'PostController@destroys')->name('posts.destroys');

    // divisions
    Route::resource('divisions', 'DivisionController')->except(['destroy']);

    // pages
    Route::get('page-contents', 'PageController@index')->name('page-contents.index');
    Route::get('page-contents/{id}/edit', 'PageController@edit')->name('page-contents.edit');
    Route::put('page-contents/{id}', 'PageController@update')->name('page-contents.update');
});

// Pengurus Routes
Route::group(['middleware' => ['auth', 'role:pengurus'], 'prefix' => 'dashboard/pengurus', 'namespace' => 'Dashboard\Pengurus', 'as' => 'dashboard.pengurus.'], function () {
    Route::get('/', 'DashboardController@index')->name('index');

    // Proker
    Route::resource('prokers', 'ProkerController');
});

// Ajax Routes
Route::group(['prefix' => 'dashboard/ajax', 'namespace' => 'Ajax', 'as' => 'ajax.'], function () {
    // Posts
    Route::get('posts', 'PostController@getPosts')->name('getPosts');
    // Users
    Route::get('users', 'UserController@getUsers')->name('getUsers');
});

Route::group(['namespace' => 'Frontpage', 'as' => 'frontpage.'], function () {
    // Posts
    Route::get('/', 'HomepageController@getHomepage')->name('homepage');
    Route::get('tentang', 'HomepageController@getAbout')->name('about');
    Route::get('pengurus', 'HomepageController@getPengurus')->name('pengurus');
});
