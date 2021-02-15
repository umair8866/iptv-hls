<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
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

Route::get('/login', function () {
    return view('/login');
});


Route::get('/',[PageController::class,'videoplayer']);
Route::get('/videoplayer',[PageController::class,'videoplayer']);

Route::get('/admin',[PageController::class,'dashboard']);
Route::get('/admin/dashboard',[PageController::class,'dashboard']);
Route::get('/admin/channels',[PageController::class,'channels']);
Route::get('/admin/company',[PageController::class,'company']);
Route::get('/admin/addchannel',[PageController::class,'addchannelview']);
Route::get('/admin/addcompany',[PageController::class,'addcompanyview']);
Route::post('/admin/addnewchannel',[PageController::class,'addchannel']);
Route::post('/admin/addnewcompany',[PageController::class,'addcompany']);
Route::post('/getvideo',[PageController::class,'getvideourl']);
Route::get('/admin/editchannel/{id}',[PageController::class,'editchannel']);
Route::post('/admin/editnewchannel/{id}',[PageController::class,'updatechannel']);
Route::get('/admin/deletechannel/{id}',[PageController::class,'deletechannel']);
Route::get('/admin/editcompany/{id}',[PageController::class,'editcompany']);
Route::post('/admin/editnewcompany/{id}',[PageController::class,'updatecompany']);
Route::get('/admin/deletecompany/{id}',[PageController::class,'deletecompany']);





Auth::routes();
Route::post('/login', '\App\Http\Controllers\Auth\LoginController@login');
Route::get('/logout', '\App\Http\Controllers\Auth\LoginController@logout');