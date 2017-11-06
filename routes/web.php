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

Route::get('/', function () {
    return view('welcome');
});

Route::resource('/Backend/roles', 'Backend\RolesController');

Route::group(['middleware' => 'admin'], function() {
    Route::get('admin', [
        'as' => 'admin.home',
        'uses' => 'Backend\DashboardController@index'
    ]);
});

Route::resource('/Backend/users','Backend\UsersController');
Route::resource('/Backend/roles', 'Backend\RolesController');
Route::resource('/Backend/permissions', 'Backend\PermissionsController');

//Route::get('/about', 'AboutController@index');
//Route::get('/articles', 'ArticlesController@index');
//Route::get('article/{id}', 'ArticlesController@getById')->name('article.detail');


//Route::resource('/admin/posts', 'Admin\PostsController');

//Route::resource('/admin/categories','Admin\CategoriesController');
//Route::resource('/admin/tags','Admin\TagsController');


//Route::get('/blog', 'PostsController@index')->name('blog.index');
//Route::get('blog/{id}', 'PostsController@show')->name('blog.show');
//
//Route::get('/list','CategoriesController@index')->name('list.index');
//Route::get('/list/single/{id}','CategoriesController@single')->name('list.single');
//
//Route::get('login/{provider}',          'Auth\SocialAccountController@redirectToProvider');
//Route::get('login/{provider}/callback', 'Auth\SocialAccountController@handleProviderCallback');

Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');
//Route::get('/profile/{id}', 'HomeController@profile')->name('profile');
//
//Route::get('/send', 'EmailController@index');
//Route::post('/send', 'EmailController@send')->name('send');
//Route::post('/notify', 'EmailController@notify');

