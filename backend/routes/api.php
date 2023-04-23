<?php

use App\Http\Controllers\BookController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

/* User Endpoints */

// Add "user" endpoint, map it to the "getAllUsers" method in "UserController".
// All endpoints work the same!
Route::get('/user', [UserController::class, 'getByParams']);
Route::post('/user', [UserController::class, 'createUser']);
Route::put('/user/{id}', [UserController::class, 'updateUser']);
Route::delete('/user/{id}', [UserController::class, 'deleteUser']);

/* Book Endpoints */
Route::get('/book', [BookController::class, 'getByParams']);
Route::post('/book', [BookController::class, 'createBook']);
Route::put('/book/{id}', [BookController::class, 'updateBook']);
Route::delete('/book/{id}', [BookController::class, 'deleteBook']);