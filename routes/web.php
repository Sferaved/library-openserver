<?php

use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\UserController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

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
    return view('welcome');
})->name('welcome');

Route::name('user.')->group(function () {
    Route::view('/private', 'private')->middleware('verified')->name('private');
    Route::get('auth/login', function () {
        if (Auth::check()) {
            return redirect(route('user.private'));
        }
        return view('/auth/login');
    })->name('login');

    Route::post('auth/login', [LoginController::class, 'login']);

    Route::get('/logout', function () {
        Auth::logout();
        return redirect('/');
    })->name('logout');

    Route::get('/registration', function () {
        if (Auth::check()) {
            return redirect(route('user.private'));
        }
        return view('registration');
    })->name('registration');

    Route::post('/registration', [RegisterController::class, 'save']);

    Route::get('/users', [UserController::class, 'index'])->name('users');

    Route::get('/users/create', function () {
         return view('usr.create');
    })->name('create');

    Route::post('/users/create', [UserController::class, 'create']);

    Route::get('/users/all/{id}/update', [UserController::class, 'update'])
        ->name('update');

    Route::post('/users/all/{id}/update', [UserController::class, 'updateSubmit'])
        ->name('update-submit');

    Route::get('/users/all/{id}/destroy', [UserController::class, 'destroy'])
        ->name('destroy');

});

Route::get('/email/verify', function () {
    return view('verify-email');
})->middleware('auth')->name('verification.notice');

Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();
    return redirect('/');
})->middleware(['auth', 'signed'])->name('verification.verify');

Route::post('/email/verification-notification', function (Request $request) {
    $request->user()->sendEmailVerificationNotification();

    return redirect('/')->with('success', 'Verification link sent!');
})->middleware(['auth', 'throttle:6,1'])->name('verification.send');


Route::get('forget-password', [ForgotPasswordController::class, 'showForgetPasswordForm'])
    ->name('forget.password.get');
Route::post('forget-password', [ForgotPasswordController::class, 'submitForgetPasswordForm'])
    ->name('forget.password.post');
Route::get('reset-password/{token}', [ForgotPasswordController::class, 'showResetPasswordForm'])
    ->name('reset.password.get');
Route::post('reset-password', [ForgotPasswordController::class, 'submitResetPasswordForm'])
    ->name('reset.password.post');

Route::get('/books', [BookController::class, 'index'])->middleware('verified')->name('books');
