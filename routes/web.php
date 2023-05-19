<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\HouseController;
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


// Login
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login'])->name('login.post');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// Register
Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register'])->name('register.post');


// Route::get('/houses', [HouseController::class, 'index'])->name('houses.index');
// Route::get('/houses/create', [HouseController::class, 'create'])->name('houses.create');
// Route::post('/houses', [HouseController::class, 'store'])->name('houses.store');
// Route::get('/houses/{id}/edit', [HouseController::class, 'edit'])->name('houses.edit');
// Route::put('/houses/{id}', [HouseController::class, 'update'])->name('houses.update');
// Route::delete('/houses/{id}', [HouseController::class, 'destroy'])->name('houses.destroy');
// Protected Routes
Route::middleware('auth')->group(function () {
    
    Route::get('/houses', [HouseController::class, 'index'])->name('houses.index');
    Route::get('/houses/create', [HouseController::class, 'create'])->name('houses.create');
    Route::post('/houses', [HouseController::class, 'store'])->name('houses.store');
    Route::get('/houses/{id}/edit', [HouseController::class, 'edit'])->name('houses.edit');
    Route::put('/houses/{id}', [HouseController::class, 'update'])->name('houses.update');
    Route::delete('/houses/{id}', [HouseController::class, 'destroy'])->name('houses.destroy');
    Route::get('/', function () {return view('index'); });
});