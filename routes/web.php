<?php


Route::get('/', 'hospitalsController@top');


Route::resource('hospitals','hospitalsController');
Route::post('search','hospitalsController@search')->name('search.search');
Route::get('search','hospitalsController@result')->name('search.result');

Route::get('signup','Auth\RegisterController@showRegistrationForm')->name('signup.get'); //会員登録画面の表示
Route::post('signup','Auth\RegisterController@register')->name('signup.post'); //会員登録
Route::get('login','Auth\LoginController@showLoginForm')->name('login'); //ログインフォームの表示
Route::post('login','Auth\LoginController@login')->name('login.post'); //ログイン
Route::get('logout','Auth\LoginController@logout')->name('logout.get');//ログアウト

Route::group(['middleware' => ['auth']], function () {
     Route::resource('users', 'UsersController', ['only' => 'show']);//マイページの表示
     Route::resource('reviews','ReviewsController');
});




//hospitalの登録処理:store
//hospitalの登録画面を表示する:create
//hospitalを編集して登録処理:update
//hospitalを編集する画面を表示する:edit
//hospitalを消去する:destroy
//hospitalの詳細個別ページを表示:show
//hospitalの一覧表示:index
