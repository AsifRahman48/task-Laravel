<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\TodoController;
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
    Route::get('Todo_show',[TodoController::class,'show'])->name('todo.show');
    Route::get('todo_delete/{id}',[TodoController::class,'destroy'])->name('todo.destroy');
    Route::get('todo_create',[TodoController::class,'create'])->name('todo.create');
    Route::post('todo_submit',[TodoController::class,'store'])->name('todo.store');
    Route::get('todo_edit/{id}',[TodoController::class,'edit'])->name('todo.edit');
    Route::post('todo_update/{id}',[TodoController::class,'update'])->name('todo.update');
});


