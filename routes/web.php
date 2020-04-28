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



Route::group(['prefix'=>'admin'], function(){

    Auth::routes();
    
Route::resource('/home', 'HomeController');

Route::resource('/users', 'AdminUsersController')->middleware('auth');
Route::resource('/comments', 'AdminCommentsController')->middleware('auth');
Route::resource('/posts', 'AdminPostsController')->middleware('auth');
Route::resource('/questions', 'AdminQuestionsController')->middleware('auth');
Route::resource('/outstanding', 'AdminUsersPaymentOutstandingController')->middleware('auth');
Route::resource('/gametype', 'AdminGameTypeController')->middleware('auth');


Route::name('home.post')->get('/posts/{id}', 'AdminPostsController@show')->middleware('auth');
Route::name('home.comment')->get('/comments/{id}', 'AdminCommentsController@show')->middleware('auth');



});






