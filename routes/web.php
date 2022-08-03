<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
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
/*
Route::get('dashboard',function (){
    return view('dashboard');
}); */

    Route::get('login',[AdminController::class,'admin'])->name('login');
    Route::post('login',[AdminController::class,'login'])->name('login');

    Route::get('register',[AdminController::class,'register_view'])->name('register');
    Route::post('register',[AdminController::class,'register'])->name('register');

//Route::post('login_form',[AdminController::class,'admin']);
Route::get('login',[AdminController::class,'admin'])->name('login');
Route::post('login',[AdminController::class,'login'])->name('login');

Route::get('register',[AdminController::class,'register_view'])->name('register');
Route::post('register',[AdminController::class,'register'])->name('register');

Route::group(['middleware'=>'auth'],function (){
    Route::get('dashboard',[AdminController::class,'dashboard'])->name('dashboard');
    Route::get('logout',[AdminController::class,'logout'])->name('logout');
});

