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

use Illuminate\Support\Facades\Route;

Route::group(['middleware' => 'guest'], function () {
    Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
    Route::post('login', 'Auth\LoginController@login');
});

Route::post('logout', 'Auth\LoginController@logout')->name('logout');

// Admin Routes
Route::group(['middleware' => ['auth', 'role:admin'], 'prefix' => 'dashboard/admin', 'namespace' => 'Dashboard\Admin', 'as' => 'dashboard.admin.'], function () {
    Route::get('/', 'DashboardController@index')->name('index');
    // Route::get('/profile', 'DashboardController@profile')->name('profile');

    // keanggotaan / user
    Route::resource('users', 'UserController')->except(['destroy']);
    Route::post('users/update-status', 'UserController@updateStatus')->name('users.update-status');
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

    // prokers
    Route::resource('prokers', 'ProkerController');
    Route::put('prokers/users/{id?}', 'ProkerController@updateUser')->name('prokers.update.user');
    Route::post('prokers/users', 'ProkerController@storeUser')->name('prokers.store.user');
    Route::post('prokers/update-status', 'ProkerController@updateStatus')->name('prokers.update-status');
    Route::delete('prokers/users/{id?}', 'ProkerController@destroyUser')->name('prokers.destroy.user');

    // pages
    Route::get('page-contents', 'PageController@index')->name('page-contents.index');
    Route::get('page-contents/{id}/edit', 'PageController@edit')->name('page-contents.edit');
    Route::put('page-contents/{id}', 'PageController@update')->name('page-contents.update');

    //nim
    Route::get('nim-checker', 'NIMCheckerController@index')->name('nim-checker.index');
    Route::post('nim-checker/update', 'NIMCheckerController@store')->name('nim-checker.update');

    // Himatif x Cakap
    Route::get('cakap','CakapHimatif@index')->name('cakap.index');
    Route::delete('cakap/destroys', 'CakapHimatif@destroys')->name('cakap.destroys');
    Route::post('cakap/update-kode', 'CakapHimatif@updateKode')->name('cakap.kode.update');
    Route::post('cakap/email', 'CakapHimatif@showEmail')->name('cakap.email.index');
    Route::post('cakap/sendEmail', 'CakapHimatif@sendEmail')->name('cakap.email.send');
    Route::get('cakap/email-preview', 'CakapHimatif@previewCakap')->name('cakap.email.preview');
    Route::delete('cakap/destroys-kode', 'CakapHimatif@destroyskode')->name('cakap.kode.destroys');
    
    Route::get('cakap/email-send', 'EmailController@emailCakaps')->name('cakap.email.sends');
});

// Pengurus Routes
Route::group(['middleware' => ['auth', 'role:pengurus'], 'prefix' => 'dashboard/pengurus', 'namespace' => 'Dashboard\Pengurus', 'as' => 'dashboard.pengurus.'], function () {
    Route::get('/', 'DashboardController@index')->name('index');

    Route::resource('prokers', 'ProkerController');
    Route::put('prokers/users/{id?}', 'ProkerController@updateUser')->name('prokers.update.user');
    Route::post('prokers/users', 'ProkerController@storeUser')->name('prokers.store.user');
});

// Ajax Routes
Route::group(['middleware' => ['auth', 'role:admin'],'prefix' => 'dashboard/ajax', 'namespace' => 'Ajax', 'as' => 'ajax.'], function () {
    // Posts
    Route::get('posts', 'PostController@getPosts')->name('getPosts');
    // Prokers
    Route::get('prokers', 'ProkerController@getProkers')->name('getProkers');
    Route::get('prokers/{proker_id}/users', 'ProkerController@getProkerUsers')->name('getProkerUsers');
    // Users
    Route::get('users', 'UserController@getUsers')->name('getUsers');
    Route::get('users/{id?}', 'UserController@findUserById')->name('findUserById');
    // Cakaps
    Route::get('cakaps', 'FormCakapController@getCakaps')->name('getCakaps');
    Route::get('cakaps-kode', 'FormCakapController@getCakapKode')->name('getCakapKode');
    Route::get('cakaps-email', 'FormCakapController@getCakapsEmail')->name('getCakapsEmail');
});

Route::group(['namespace' => 'Frontpage', 'as' => 'frontpage.'], function () {
    // Posts
    Route::get('/', 'HomepageController@getHomepage')->name('homepage');
    Route::get('tentang', 'HomepageController@getAbout')->name('about');
    Route::get('pengurus', 'HomepageController@getPengurus')->name('pengurus');
    Route::get('proker', 'HomepageController@getProker')->name('proker');
    Route::get('proker/{id}', 'HomepageController@showProker')->name('proker.show');
    Route::get('berita', 'HomepageController@getBerita')->name('berita');
    Route::get('berita/{slug}', 'HomepageController@showBerita')->name('berita.show');
    Route::get('nim-checker', 'HomepageController@getNIM')->name('nim-checker');
    Route::get('CakapxHimatif', 'HomepageController@showCakap')->name('cakap.show');
    Route::post('cakap/simpan','CakapHimatifFrontpage@store')->name('cakap.store');
});
