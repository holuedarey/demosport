<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post('login', 'UserController@login');
Route::post('register', 'UserController@register');

Route::group(['middleware' => 'auth:api'], function(){

    Route::get('users/{user}/comments','UserController@showComments');
    Route::resource('/comment', 'CommentController');
    Route::resource('/posts', 'PostController')->except(['show']);
    Route::get('/posts/{post}', 'PostController@show');
    Route::resource('/users', 'UserController');
    Route::resource('/questions', 'QuestionsController');
    Route::resource('/fundwallet', 'FundWalletController');
    Route::resource('/gametypes', 'GameTypeController');

    //Route::put('/userss', 'UserController@update');

    Route::get('search', 'PostController@getSearchResults');


});

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
