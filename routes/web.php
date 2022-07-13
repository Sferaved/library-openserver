<?php

use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\FacebookController;
use App\Http\Controllers\GoogleController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Vue\BookVueController;
use App\Http\Controllers\Vue\CategoryVueController;
use App\Http\Controllers\Vue\UserVueController;
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

    Route::get('/users', [UserController::class, 'index'])->middleware('role:superadministrator')
        ->name('users');

    Route::get('/users/create', function () {
         return view('usr.create');
    })->middleware('role:superadministrator')->name('create');

    Route::post('/users/create', [UserController::class, 'create'])
        ->middleware('role:superadministrator');

    Route::get('/users/all/{id}/update', [UserController::class, 'update'])
        ->middleware('role:superadministrator')
        ->name('update');

    Route::post('/users/all/{id}/update', [UserController::class, 'updateSubmit'])
        ->middleware('role:superadministrator')
        ->name('update-submit');

    Route::get('/users/all/{id}/destroy', [UserController::class, 'destroy'])
        ->middleware('role:superadministrator')
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


Route::name('book.')->group(function () {

    Route::get('/books', [BookController::class, 'index'])->middleware('verified')->name('books');




    Route::get('/books/create', function () {
        return view('book.create');
    })->middleware('role:superadministrator')->name('create');

    Route::post('/books/create', [BookController::class, 'create'])
        ->middleware('role:superadministrator');

     Route::get('/books/{id}/update', [BookController::class, 'show'])
        ->middleware('role:superadministrator')
        ->name('show');

    Route::post('/books/{id}/update', [BookController::class, 'update'])
        ->middleware('role:superadministrator')
        ->name('update');

     Route::get('/books/{id}/destroy', [BookController::class, 'destroy'])
        ->middleware('role:superadministrator')
        ->name('destroy');
});

Route::get('auth/google', [GoogleController::class, 'redirectToGoogle']);

Route::get('auth/google/callback', [GoogleController::class, 'handleGoogleCallback']);

Route::controller(FacebookController::class)->group(function () {
    Route::get('auth/facebook', 'redirectToFacebook')->name('auth.facebook');
    Route::get('auth/facebook/callback', 'handleFacebookCallback');
});





Route::get('/vue/books/all', [BookVueController::class, 'index']);
Route::get('/vue/categories/all', [CategoryVueController::class, 'index']);


Route::get('/booksv', function () {
    return view('book.booksv');
})->name('bv');

Route::get('/booksv/{any}', function () {
    return view('book.booksv');
})->where('any', '.*');

Route::get('/vue/books/all', [BookVueController::class, 'index']);
Route::get('/vue/books/{search_string}', [BookVueController::class, 'show']);

Route::get('/usersv', function () {
    return view('usr.usersv');
})->name('uv');

Route::get('/vue/users/all', [UserVueController::class, 'index']);
