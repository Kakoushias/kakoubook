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


Route::group(['middleware' => ['web']], function(){

    Route::get('/', function () {
        return view('welcome');
    })->name('home');

    Route::post('/signup', [
        'uses' => 'UserController@postSignUp',
        'as' => 'signup'
    ]);

    Route::post('/signin', [
        'uses' => 'UserController@postSignIn',
        'as' => 'signin'
    ]);

    Route::get('/logout', [
        'uses' => 'UserController@getLogout',
        'as' => 'logout'
    ]);

    Route::get('/account', [
        'uses' => 'UserController@getAccount',
        'as' => 'account'
    ]);

    Route::get('/friends', [
        'uses' => 'UserController@getFriends',
        'as' => 'friends',
        'middleware' => 'auth'
    ]);

    Route::get('/users', [
        'uses' => 'UserController@getUsers',
        'as' => 'users',
        'middleware' => 'auth'

    ]);

    Route::post('/updateaccount', [
        'uses' => 'UserController@postSaveAccount',
        'as' => 'account.save'
    ]);

    Route::get('/userimage/{filename}', [
        'uses'=> 'UserController@getUserImage',
        'as'=> 'account.image'
    ]);

    Route::get('/dashboard', [
        'uses' => 'PostController@getDashboard',
        'as' => 'dashboard',
        'middleware' => 'auth'
    ]);

    Route::post('/createpost', [
        'uses' => 'PostController@postCreatePost',
        'as' => 'post.create'
    ]);
    Route::get('/delete-post/{post_id}', [
        'uses' => 'PostController@getDeletePost',
        'as' => 'post.delete'
    ]);
    Route::post('/edit', [
        'uses' => 'PostController@postEditPost',
        'as'=> 'edit'
    ]);

    Route::post('/like', [
        'uses' => 'PostController@postLikePost',
        'as'=> 'like'
    ]);

    Route::get('/connect/{user_id}', [
        'uses' => 'UserController@getConnect',
        'as' => 'connect.users',
        'middleware' => 'auth'
    ]);

    Route::get('/profile/{user_id}', [
        'uses' => 'UserController@getProfile',
        'as' => 'profile',
        'middleware' => 'auth'
    ]);

    Route::post('/create/(user_id)', [
        'uses' => 'PostController@postLikePost',
        'as'=> 'like'
    ]);

    Route::post('/make-friends', [
        'uses' => 'UserController@makeFriends',
        'as'=> 'make.friends'
    ]);

    Route::get('/groupconnect/{group_id}', [
        'uses' => 'GroupController@getConnect',
        'as' => 'group.connect',
        'middleware' => 'auth'
    ]);

    Route::post('/group-join/{group_id}', [
        'uses' => 'GroupController@groupJoin',
        'as'=> 'group.join'
    ]);

    Route::resource('settings', 'SettingsController');

    Route::resource('comment', 'CommentController');

    Route::resource('group', 'GroupController');


});
