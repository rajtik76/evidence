<?php

use App\Http\Controllers\EvidenceController;
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

Route::get('/user/login', [UserController::class, 'loginForm'])->name('user.login');
Route::post('/user/login', [UserController::class, 'authenticate'])->name('user.authenticate');

Route::middleware('auth:web')->group(function () {
    Route::get('/language/{language}', [\App\Http\Controllers\LanguageController::class, 'switch'])->name('language.switch');
    Route::get('/', [EvidenceController::class, 'index'])->name('evidence.index');
    Route::get('/user/logout', [UserController::class, 'logout'])->name('user.logout');

    Route::controller(\App\Http\Controllers\DepartmentController::class)->group(function () {
        Route::get('/department/index', 'index')->name('department.index');
        Route::get('/department/edit/{department}', 'edit')->name('department.edit');
        Route::get('/department/delete/{department}', 'delete')->name('department.delete');
        Route::post('/department/update/{department}', 'update')->name('department.update');
        Route::get('/department/new', 'new')->name('department.new');
        Route::post('/department/store', 'store')->name('department.store');
    });

    Route::middleware('admin')->group(function () {
        Route::get('/user/list', [UserController::class, 'list'])->name('user.list');
        Route::get('/user/delete/{user}', [UserController::class, 'delete'])->name('user.delete');
        Route::get('/user/edit/{user}', [UserController::class, 'edit'])->name('user.edit');
        Route::post('/user/edit/{user}', [UserController::class, 'update'])->name('user.update');
        Route::get('/user/new', [UserController::class, 'new'])->name('user.new');
        Route::post('/user/new', [UserController::class, 'store'])->name('user.store');
    });
});
