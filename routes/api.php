<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\User\RegisterController;
use App\Http\Controllers\User\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post('auth/login', LoginController::class)->name('auth.login');
Route::post('users', RegisterController::class)->name('users');

Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::post('auth/logout', LogoutController::class)->name('auth.logout');
    Route::post('user/image', [UserController::class, 'uploadImage'])->name('user.image');
});
