<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;

Route::get('/', function () {
    return view('test');
});
//Route::get('team', [addBeverageController::class, 'AddBeverage'])->name('team');



Route::prefix('auth')->group(function () {
Route::get('login', [LoginController::class, 'login'])->name('login');
Route::post('login', [LoginController::class, 'login']);


Route::get('register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('register', [RegisterController::class, 'register']);




});



Auth::routes(['verify'=>true]);

Route::get('home', [App\Http\Controllers\HomeController::class, 'index'])->middleware('verified')->name('home');



Route::get('/admin/addUser',[UserController::class,'create'])->name('addUser');
Route::post('insertUser',[UserController::class,'store'])->name('insertUser');
Route::get('/admin/users',[UserController::class,'index'])->name('users');

Route::get('editUser/{id}',[UserController::class,'edit'])->name('editUser');
Route::put('updateUser/{id}',[UserController::class,'update'])->name('updateUser');
Route::get('showUser/{id}',[UserController::class,'show'])->name('showUser');
Route::delete('delUser',[UserController::class,'destroy'])->name('delUser');
Route::get('restoreUser/{id}',[UserController::class,'restore'])->name('restoreUser');

