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

// Add "user" endpoint, map it to the "getAllUsers" method in "UserController".
Route::get('/user', [UserController::class, 'getAllUsers']);

// Add "book" endpoint, map it to the "getAllBooks" method in "BookController".
Route::get('/book', [BookController::class, 'getAllBooks']);

// Add "book/{id}" endpoint, map it to the "getById" method in "BookController".
Route::get('/book/{id}', [BookController::class, 'getById']);



