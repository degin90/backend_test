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
Route::middleware(['auth'])->group(function () {
    Route::get('/', 'BackendController@index')->name('home');
    Route::get('/panel', 'BackendController@index')->name('dashboard');
    /* USER ROUTE */
    Route::get('/panel/user', 'UserController@index')->name('user');
    Route::get('/panel/user/show', 'UserController@index')->name('user.show');
    Route::get('/panel/user/add', 'UserController@add')->name('user.add');
    Route::post('/panel/user/add', 'UserController@add_form')->name('user.addpost');
    Route::get('/panel/user/view/{id}', 'UserController@view')->name('user.view');
    Route::get('/panel/user/edit/{id}', 'UserController@edit')->name('user.edit');
    Route::post('/panel/user/edit', 'UserController@edit_form')->name('user.editpost');
    Route::get('/panel/user/delete/{id}', 'UserController@delete')->name('user.delete');
    /* STUDENT ROUTE */
    Route::get('/panel/student', 'StudentController@index')->name('student');
    Route::post('/panel/student/show', 'StudentController@ajax')->name('student.ajax');
    Route::get('/panel/student/show', 'StudentController@index')->name('student.show');
    Route::get('/panel/student/add', 'StudentController@add')->name('student.add');
    Route::post('/panel/student/add', 'StudentController@add_form')->name('student.addpost');
    Route::get('/panel/student/view/{id}', 'StudentController@view')->name('student.view');
    Route::get('/panel/student/edit/{id}', 'StudentController@edit')->name('student.edit');
    Route::post('/panel/student/edit', 'StudentController@edit_form')->name('student.editpost');
    Route::get('/panel/student/delete/{id}', 'StudentController@delete')->name('student.delete');
});

Route::get('artisan', function () {
    $res[] = Artisan::call('config:clear');
    $res[] = Artisan::call('cache:clear');
    $res[] = Artisan::call('config:cache');
    return $res;
});

Route::get('migrate', function () {
    $res[] = Artisan::call('migrate --seed');
    return $res;
});

Route::get('/login', 'BackendController@login')->name('login');
Route::post('/login', 'BackendController@login_form')->name('login.post');
Route::get('/logout', function () {
    Auth::logout();
    Session::flash('success', 'Anda Berhasil Logout');
    return redirect()->route('login');
})->name('logout');

Route::post('/api/token', 'ApiController@get_token');
Route::post('/api/login', 'ApiController@login');
