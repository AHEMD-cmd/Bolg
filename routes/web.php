<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/','FrontController@index');
//front post

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::middleware('auth')->prefix('admin')->group(function(){

    //categories
    Route::resource('category', 'CategoryController');

    //posts
    Route::resource('post', 'PostController');
    Route::get('soft/delete/{id}', 'PostController@softDelete')->name('soft.delete');
    Route::get('posts/trash', 'PostController@trash')->name('post.trash');
    Route::get('posts/restore/{id}', 'PostController@restore')->name('post.restore');

    //tag
    Route::resource('tag', 'TagController');

    //users
    Route::resource('user', 'UserController');

    //profile
    Route::get('profile/show', 'ProfileController@index')->name('profile.show');
    Route::post('profile/update', 'ProfileController@update')->name('profile.update');

    //permissions
    Route::get('user/not/admin/{id}', 'UserController@not_admin')->name('user.not.admin');
    Route::get('user/admin/{id}', 'UserController@admin')->name('user.admin');

    //setttings
    Route::get('settings', 'SettingsController@index')->name('settings');
    Route::post('settings/update', 'SettingsController@update')->name('settings.update');



});

Route::get('/sign_in/github', 'GithubLoginController@github')->name('git');
Route::get('/sign_in/github/redirect', 'GithubLoginController@github_redirect')->name('git.redirect');


//search
Route::get('search', 'FrontController@search')->name('search');

//single pages
Route::get('{slug}', 'FrontController@single_page')->name('post.single');
Route::get('tag/single/{id}', 'FrontController@tag')->name('tag.single')->where(['A-z\_\-']);
Route::get('category/single/{id}', 'FrontController@category')->name('category.single');


//news letter
Route::post('news_letter', 'News_letterController@store')->name('news_letter');
Route::get('news_letter/index', 'News_letterController@index')->name('news_letter.index');
