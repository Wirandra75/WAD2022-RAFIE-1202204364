<?php

use App\Http\Controllers\LoginRegisterController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ShowroomController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Cookie;

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
    $setelNavbar = Cookie::get('navbar') ? Cookie::get('navbar') : '#3563e9';
    return view('welcome', compact('setelNavbar'));
});
Route::get('/login', [LoginRegisterController::class, 'index'])->name('login')->middleware('guest');
Route::get('/register', [LoginRegisterController::class, 'register']);
Route::post('/register', [LoginRegisterController::class, 'store']);
Route::post('/login', [LoginRegisterController::class, 'index']);
Route::post('/login', [LoginRegisterController::class, 'login']);
Route::post('/logout', [LoginRegisterController::class, 'logout']);
Route::get('/profile', [ProfileController::class, 'index']);
Route::put('/profile/{user}', [ProfileController::class, 'update']);
Route::resource('/showroom', ShowroomController::class)->middleware('auth');
