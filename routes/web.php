<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GoogleLoginController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::get('/', function (){
    return view('login');
});
Route::get('/login', [GoogleLoginController::class, 'redirectToGoogle'])->name('login.google');
Route::get('/login/callback', [GoogleLoginController::class, 'handleGoogleCallback'])->name('login.google.callback');
Route::get('/home', function (){
    return view('home');
});
Route::get('/logout', [GoogleLoginController::class, 'logout'])->name('logout.google');

