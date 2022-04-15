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
    Route::get('/', [EvidenceController::class, 'index'])->name('evidence.index');
    Route::get('/user/logout', [UserController::class, 'logout'])->name('user.logout');
});
