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

Route::get('/', 'IndexController')->name('home');

// ゲストユーザーが閲覧可能
Route::middleware(['guest'])->group(function () {
    Route::name('user.')->group(function () {
        // 会員登録
        Route::get('/register', 'UserController@getRegister')->name('register');
        Route::post('/register', 'UserController@postRegister')->name('register');
        // ログイン
        Route::get('/login', 'UserController@getLogin')->name('login');
        Route::post('/login', 'UserController@postLogin')->name('login');
    });
});

// ログイン済みユーザーが閲覧可能
Route::middleware(['auth'])->group(function () {
    Route::name('user.')->group(function () {
        // プロフィール
        Route::get('/profile', 'UserController@getProfile')->name('profile');
        // 設定
        Route::get('/setting', 'UserController@getSetting')->name('setting');
        // ログアウト
        Route::get('/logout', 'UserController@getLogout')->name('logout');
    });

    Route::name('release.')->group(function () {
        // releaseの作成
        Route::get('/release/add', 'ReleaseController@add')->name('add');
        // releaseのDB登録
        Route::post('/release/add', 'ReleaseController@create')->name('add');
        // releaseの編集
        Route::get('/release/{id}/edit', 'ReleaseController@edit')->name('edit');
        // releaseのDB更新
        Route::patch('/release/{id}/edit', 'ReleaseController@update')->name('edit');
        // releaseの削除
        Route::get('/release/{id}/delete', 'ReleaseController@del')->name('delete');
        // releaseのDB削除
        Route::delete('/release/{id}/delete', 'ReleaseController@remove')->name('delete');
    });
});

Route::get('/search', 'SearchController')->name('search.show');

Route::get('/release/{id}', 'ReleaseController@show')->name('release.show');