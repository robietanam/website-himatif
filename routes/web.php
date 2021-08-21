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


// Route::group(['prefix' => 'dashboard/admin', 'namespace' => 'Dashboard\Admin', 'as' => 'dashboard.admin.'], function() {
//     // Route::get('/', 'DashboardController@index')->name('index');
//     // Route::get('/profile', 'DashboardController@profile')->name('profile');

//     // keanggotaan
//     Route::get('keanggotaan/export', 'KeanggotaanController@export')->name('keanggotaan.export');
//     Route::resource('keanggotaan', 'KeanggotaanController')->except([ 'destroy' ]);
//     Route::delete('keanggotaan/delete', 'KeanggotaanController@delete')->name('keanggotaan.delete');

//     // posts
//     Route::put('posts/publish', 'PostController@publish')->name('posts.publish');
//     Route::put('posts/draft', 'PostController@draft')->name('posts.draft');
//     Route::resource('posts', 'PostController')->except([ 'destroy' ]);
// });

// Route::group(['prefix' => 'dashboard/ajax', 'namespace' => 'Ajax', 'as' => 'ajax.'], function() {
//     // Users
//     Route::get('keanggotaan', 'UserController@getKeanggotaan')->name('getKeanggotaan');
//     // Posts
//     Route::get('posts', 'PostController@getPosts')->name('getPosts');
// });

Route::view('homepage', '_ui.frontpage.modules.homepage');
Route::view('about', '_ui.frontpage.modules.about');
// Route::view('blogs/', '_ui.frontpage.modules.blogs-index');
// Route::view('blogs/{slug}', '_ui.frontpage.modules.blogs-show');
