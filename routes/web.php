<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [UserController::class, 'showLogin'])->name('users.login');
Route::get('/dashboard', [UserController::class, 'showDashboard'])->name('users.dashboard');
Route::get('/createUser', [UserController::class, 'showCreateUser'])->name('users.createUser');
Route::post('/logout', function () {
  Auth::logout();
  return redirect('/');
})->name('users.logout');
Route::post('/store', [UserController::class, 'storeData'])->name('users.storeData');
Route::post('/login', [UserController::class, 'checkLogin'])->name('users.checkLogin');
