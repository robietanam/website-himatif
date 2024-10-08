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

use App\Http\Controllers\Frontpage\CakapHimatifFrontpageController;
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

    //review alumni
    Route::get('review-alumni', 'ReviewAlumniController@index')->name('review-alumni.index');
    Route::get('review-alumni/create', 'ReviewAlumniController@create')->name('review-alumni.create');
    Route::post('review-alumni/store', 'ReviewAlumniController@store')->name('review-alumni.store');
    Route::get('review-alumni/edit/{id}', 'ReviewAlumniController@edit')->name('review-alumni.edit');
    Route::put('review-alumni/update/{id}', 'ReviewAlumniController@update')->name('review-alumni.update');
    Route::delete('review-alumni/delete/{id}', 'ReviewAlumniController@destroy')->name('review-alumni.destroy');

    //pemilu kandidat
    Route::resource('pemilu-candidate', 'PemiluCandidateController')->except(['destroy']);
    Route::delete('pemilu-candidate/destroys', 'PemiluCandidateController@destroys')->name('pemilu-candidate.destroys');
    
    //pemilu vote
    Route::post('pemilu-vote/refresh', 'PemiluVoteController@refreshToken')->name('pemilu-vote.refresh');
    Route::post('pemilu-vote/createVoter', 'PemiluVoteController@createVoter')->name('pemilu-vote.addVoter');
    Route::post('pemilu-vote/sendEmail', 'PemiluVoteController@sendEmail')->name('pemilu-vote.email.send');
    Route::get('pemilu-vote/email-preview', 'PemiluVoteController@previewEmail')->name('pemilu-vote.email.preview');
    Route::delete('pemilu-vote/destroys', 'PemiluVoteController@destroys')->name('pemilu-vote.destroys');
    Route::resource('pemilu-vote', 'PemiluVoteController')->except(['destroy']);
    
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
    // Pemilu Kandidat
    Route::get('pemilu-candidate', 'PemiluCandidateController@getCandidate')->name('getCandidate');
    Route::get('pemilu-vote', 'PemiluVoteController@getVoter')->name('getVoter');
    
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
    Route::get('pemilu/info', 'PemiluController@infoPemilu')->name('pemilu.info');
    Route::post('cakap/simpan',[CakapHimatifFrontpageController::class, 'store'])->name('cakap.store');
});

Route::group(['namespace' => 'Frontpage', 'as' => 'frontpage.', 'middleware' => 'checkVotingPeriod'], function () {
    Route::get('pemilu', 'PemiluController@showPemilu')->name('pemilu');
    Route::get('pemilu/vote', 'PemiluController@votePemilu')->name('pemilu.vote');
    Route::post('pemilu/vote/submit', 'PemiluController@vote')->name('pemilu.submitVote');
});