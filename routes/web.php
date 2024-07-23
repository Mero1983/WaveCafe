<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\BeverageController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\Auth\VerificationController;


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

//users(adding,editing&updating,usersList)

Route::get('/admin/addUser',[UserController::class,'create'])->name('addUser');
Route::post('insertUser',[UserController::class,'store'])->name('insertUser');
Route::get('/admin/users',[UserController::class,'index'])->name('users');

Route::get('admin.editUser/{id}',[UserController::class,'edit'])->name('editUser');
Route::put('UpdateUser/{id}',[UserController::class,'update'])->name('updateUser');



// category(adding,editing,delete)
Route::get('/admin/addCategory',[CategoryController::class,'create'])->name('addCategory');
Route::post('insertCategory',[CategoryController::class,'store'])->name('insertCategory');
Route::get('/admin/categories',[CategoryController::class,'index'])->name('categories');

Route::get('admin/editCategory/{id}',[CategoryController::class,'edit'])->name('editCategory');
Route::put('updateCategory/{id}',[CategoryController::class,'update'])->name('updateCategory');
Route::delete('delCategory/{id}',[CategoryController::class,'destroy'])->name('delCategory');

//beverages(adding,editing&updating,image,delete)

Route::get('/admin/addBeverage',[BeverageController::class,'create'])->name('addBeverage');
Route::post('insertBeverage',[BeverageController::class,'store'])->name('insertBeverage');
Route::get('/admin/beverages',[BeverageController::class,'index'])->name('beverages');

Route::get('/admin/editBeverage/{id}',[BeverageController::class,'edit'])->name('editBeverage');
Route::put('UpdateBeverage/{id}',[BeverageController::class,'update'])->name('updateBeverage');
Route::delete('delBeverage/{id}',[BeverageController::class,'destroy'])->name('delBeverage');
//contact

Route::get('/includes/contact', [ContactController::class, 'showContactForm'])->name('contact.form');
Route::post('/includes/contact', [ContactController::class, 'sendContactMail'])->name('contact.send');