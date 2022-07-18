<?php

use App\Http\Controllers\AuthController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::resource('books', 'App\Http\Controllers\API\SwaggerController');
Route::resource('booksApi', 'App\Http\Controllers\API\BookApiController');

Route::post('register', [AuthController::class,'register']);
Route::post('login', [AuthController::class,'login']);
Route::group(['middleware' => ['auth:api']], function () {
    Route::post('logout', [AuthController::class, 'logout']);
});
