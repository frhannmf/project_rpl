<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FormController;
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

    Route::get('/list-form', [FormController::class, 'getListFormUser'])->name('list_form');

    Route::get('/form/submit-sma', [FormController::class, 'indexSubmitSma'])->name('submit_sma');
    Route::post('/form/submit-sma', [FormController::class, 'submitSma'])->name('handle_submit_sma');

    Route::get('/form/retrieve-sma', [FormController::class, 'indexRetrieveSma'])->name('retrieve_sma');
    Route::post('/form/retrieve-sma', [FormController::class, 'retrieveSma'])->name('handle_retrieve_sma');

    Route::get('/form/retrieve-stis', [FormController::class, 'indexRetrieveStis'])->name('retrieve_stis');
    Route::post('/form/retrieve-stis', [FormController::class, 'retrieveStis'])->name('handle_retrieve_stis');

    Route::get('/form/request-sk-stis', [FormController::class, 'indexRequestSkAlumniStis'])->name('request_sk_alumni_stis');
    Route::post('/form/request-sk-stis', [FormController::class, 'requestSkAlumniStis'])->name('handle_request_sk_alumni_stis');

    Route::get('/form/request-surat-pddikti', [FormController::class, 'indexRequestSuratPddikti'])->name('request_surat_pddikti');
    Route::post('/form/request-surat-pddikti', [FormController::class, 'requestSuratPddikti'])->name('handle_request_surat_pddikti');

    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
});
