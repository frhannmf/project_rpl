<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;
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


Route::get('/login', function () {
    return view('login');
})->name('login');

Route::post('/login', [AuthController::class, 'login'])->name('handle_login');

Route::middleware(['auth'])->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('user_dashboard');
    Route::get('/profil', [ProfileController::class, 'index'])->name('edit_profile');
    Route::post('/profil/{id}/update', [ProfileController::class, 'update'])->name('handle_edit_profile');
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
});
