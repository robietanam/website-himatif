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

Route::view('dashboard/admin/keanggotaan', 'dashboard.admin.keanggotaan.index');


Route::group(['prefix' => 'dashboard/admin', 'namespace' => 'Dashboard\Admin', 'as' => 'dashboard.admin.'], function() {
    // Route::get('/', 'DashboardController@index')->name('index');
    // Route::get('/profile', 'DashboardController@profile')->name('profile');
    
    // keanggotaan
    Route::resource('keanggotaan', 'KeanggotaanController')->except([ 'destroy' ]);
    Route::delete('keanggotaan/delete', 'KeanggotaanController@delete')->name('keanggotaan.delete');
});

Route::group(['prefix' => 'dashboard/ajax', 'namespace' => 'Ajax', 'as' => 'ajax.'], function() {
    // Users
    Route::get('keanggotaan', 'UserController@getKeanggotaan')->name('getKeanggotaan');
});