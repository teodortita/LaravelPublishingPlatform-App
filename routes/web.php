<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    return view('general.index');
})->name('general.index');

/*GitHub Socialite*/
Route::get('login/github', 'Auth\LoginController@redirectToProvider');
Route::get('login/github/callback', 'Auth\LoginController@handleProviderCallback');

Route::get('markAllRead', function() {
    Auth::user()->unreadNotifications->markAsRead();
    return redirect()->back();
})->name('markAllRead');

Route::get('markRead/{notification_id}', [
    'uses' => 'PostController@markRead',
    'as' => 'markRead'
]);

Route::group(['prefix' => 'rates'], function() {
    Route::get('{param1}/{param2}/{param3}/{startYear}/{endYear}', [
        'uses' => 'RateChartController@getIndex',
        'as' => 'rates.index'
    ]);
    
    Route::post('', [
        'uses' => 'RateChartController@index',
        'as' => 'rates.index'
    ]);
});

Route::group(['prefix' => 'crypto'], function() {
    Route::get('{param1}/{param2}', [
        'uses' => 'CryptoController@getIndex',
        'as' => 'crypto.index'
    ]);
    
    Route::post('', [
        'uses' => 'CryptoController@index',
        'as' => 'crypto.index'
    ]);
});

Route::group(['prefix' => 'calculate'], function() {
    Route::get('rates', [
        'uses' => 'RateChartController@calculate',
        'as' => 'rates.calculate'
    ]);
    Route::get('crypto', [
        'uses' => 'CryptoController@calculate',
        'as' => 'crypto.calculate'
    ]);
});

Route::get('articles', [
    'uses' => 'PostController@getIndex',
    'as' => 'blog.index'
]);

Route::get('user/{id}', [
    'uses' => 'PostController@getUserPosts',
    'as' => 'blog.userPosts'
]);

Route::get('post/{id}', [
    'uses' => 'PostController@getPost',
    'as' => 'blog.post'
]);

Route::get('post/{id}/like', [
    'uses' => 'PostController@getLikePost',
    'as' => 'blog.post.like'
]);

Route::get('tag/{name}', [
    'uses' => 'PostController@getTagPosts',
    'as' => 'blog.tag'
]);

Route::group(['prefix' => 'admin', 'middleware' => ['auth']], function() {
    Route::get('', [
        'uses' => 'PostController@getAdminIndex',
        'as' => 'admin.index'
    ]);

    Route::get('create', [
        'uses' => 'PostController@getAdminCreate',
        'as' => 'admin.create'
    ]);

    Route::post('create', [
        'uses' => 'PostController@postAdminCreate',
        'as' => 'admin.create'
    ]);

    Route::get('edit/{id}', [
        'uses' => 'PostController@getAdminEdit',
        'as' => 'admin.edit'
    ]);

    Route::post('edit', [
        'uses' => 'PostController@postAdminUpdate',
        'as' => 'admin.update'
    ]);

    Route::get('delete/{id}', [
        'uses' => 'PostController@getAdminDelete',
        'as' => 'admin.delete'
    ]);
});

Auth::routes();
