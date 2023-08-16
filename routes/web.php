<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\PostController;
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

Route::get('/', [PostController::class,'index']);
Route::group(['namespace' => 'App\Http\Controllers'], function()
{
Route::group(['middleware' => ['guest']], function() {
    /**
     * Register Routes
     */
    Route::get('/register', 'UserController@registration')->name('register.show');
    Route::post('/register', 'UserController@register')->name('register.post');

    /**
     * Login Routes
     */
    Route::get('/login', 'UserController@index')->name('user.login');
    Route::post('/login', 'UserController@login')->name('login.post');
   
    
});
});
Route::group(['namespace' => 'App\Http\Controllers'], function()
{
Route::group(['middleware' => ['auth']], function() {
Route::get('logout', [UserController::class,'logout'])->name('logout');
Route::get('dashboard', [UserController::class,'dashboard'])->name('dashboard');
Route::get('create-post','PostController@create')->name('post.create');
Route::post('save-post','PostController@store')->name('post.store');
Route::get('post-list','PostController@show')->name('post.show');
Route::get('edit-post/{id}','PostController@edit')->name('post.edit');
Route::put('edit-update/{id}','PostController@update')->name('post.update');
Route::get('delete-post/{id}',[PostController::class,'delete'])->name('post.delete');

});


});
Route::group(['middleware' => ['admin.guest']], function() {
Route::get('/admin/login', [AdminController::class,'index'])->name('admin.login');
Route::post('/admin/login', [AdminController::class,'login'])->name('adminLogin.post');
});
Route::group(['namespace' => 'App\Http\Controllers','middleware' => ['admin']], function() {
Route::get('/admin/logout', [AdminController::class,'logout'])->name('admin.logout');
Route::get('/admin/dashboard', [AdminController::class,'dashboard'])->name('admin.dashboard');
Route::get('/admin/users-list',[AdminController::class,'userList'])->name('users.list');
Route::get('/admin/user-edit/{id}',[AdminController::class,'edit'])->name('user.edit');
Route::post('/admin/user-update/{id}',[AdminController::class,'update'])->name('user.update');
Route::get('/admin/user-delete/{id}',[AdminController::class,'delete'])->name('user.delete');
Route::get('/admin/user-status/{id}',[AdminController::class,'status'])->name('user.status');
Route::get('/admin/user-post/{id}','AdminController@userPost')->name('user.post');
Route::get('/admin/edit-post/{id}','AdminController@postEdit')->name('admin.post.edit');
Route::put('/admin/edit-update/{id}','AdminController@postUpdate')->name('admin.post.update');
Route::get('/admin/delete-post/{id}',[AdminController::class,'postDelete'])->name('admin.post.delete');
Route::get('/admin/post-status/{id}',[AdminController::class,'postStatus'])->name('post.status');

});
