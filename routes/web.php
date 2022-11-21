<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FormController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ResetUserController;
use App\Http\Controllers\UserController;
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

Route::middleware(['auth.nologin'])->group(function () {
    Route::get('/login', function () {
        return view('login');
    })->name('login');

    Route::get('/admin/login', function () {
        return view('admin.login');
    })->name('admin_login');

    Route::post('/login', [AuthController::class, 'login'])->name('handle_login');
    Route::post('/admin/login', [AuthController::class, 'loginAdmin'])->name('handle_admin_login');

    Route::get('/lupa/nim', function () {
        return view('user.forgot.nim');
    })->name('lupa_nim');
    Route::get('/lupa/password', function () {
        return view('user.forgot.password');
    })->name('lupa_password');

    Route::post('/lupa/nim', [ResetUserController::class, 'lupaNim'])->name('handle_lupa_nim');
    Route::post('/lupa/password', [ResetUserController::class, 'lupaPassword'])->name('handle_lupa_password');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

    Route::get('/ubah-password', [UserController::class, 'indexChangePassword'])->name('change_password');
    Route::post('/ubah-password/{id}', [UserController::class, 'changePassword'])->name('handle_change_password');
});

Route::middleware(['auth', 'auth.user'])->group(function () {
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
});

Route::middleware(['auth', 'auth.admin'])->prefix('admin')->group(function () {
    Route::get('/', function () {
        return view('admin.index');
    })->name('admin_dashboard');

    Route::get('/users', [UserController::class, 'index'])->name('admin_user_list');
    Route::get('/users/tambah', function () {
        return view('admin.userman.add_form');
    })->name('admin_user_create');
    Route::get('/users/{id}', [UserController::class, 'indexDetail'])->name('admin_user_detail');
    Route::get('/users/{id}/update', [UserController::class, 'indexUpdate'])->name('admin_user_update');
    Route::get('/users/{id}/delete', [UserController::class, 'indexDelete'])->name('admin_user_delete');

    Route::post('/users', [UserController::class, 'create'])->name('handle_admin_user_create');
    Route::post('/user/{id}/update', [UserController::class, 'update'])->name('handle_admin_user_update');
    Route::post('/user/{id}/delete', [UserController::class, 'delete'])->name('handle_admin_user_delete');

    Route::get('/form', [FormController::class, 'getListFormAdmin'])->name('admin_form_list');
    Route::get('/form/{id}', [FormController::class, 'getDetailForm'])->name('admin_form_detail');
    Route::post('/form/{id}', [FormController::class, 'approveForm'])->name('handle_form_approve');

    Route::post('/users/{id}/reset', [ResetUserController::class, 'resetUser'])->name('handle_admin_reset_user');

    Route::get('/forgot', [ResetUserController::class, 'index'])->name('forgot_list');
    Route::get('/forgot/{id}', [ResetUserController::class, 'indexForgotNim'])->name('forgot_nim_detail');
});
