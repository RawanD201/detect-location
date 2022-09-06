<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserLogsController;
use App\Http\Controllers\Auth\ChangePasswordController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\IndexController;

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

require __DIR__ . '/auth.php';




Route::middleware(['auth', 'isUser'])->group(function () {

    Route::get('/dashboard', [IndexController::class, 'index'])->name('dashboard');

    Route::get('/logs', [UserLogsController::class, 'all'])->name('log');

    Route::name('users.')->group(function () {
        Route::get('/users', [RegisteredUserController::class, 'all'])->name('index');
        Route::post('/users', [RegisteredUserController::class, 'store'])->name('store');
        Route::patch('/users/{id}', [RegisteredUserController::class, 'update'])->name('update');
        Route::get('/users/{id}', [RegisteredUserController::class, 'edit'])->name('edit');
        Route::delete('/users/{id}', [RegisteredUserController::class, 'destroy'])->name('delete');
        Route::get('/changePassword', [ChangePasswordController::class, 'index'])->name('changePassword');
        Route::post('/changePassword', [ChangePasswordController::class, 'updatePassword'])->name('updatePassword');
    });
});
