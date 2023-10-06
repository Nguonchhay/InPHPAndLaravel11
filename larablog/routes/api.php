<?php

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

Route::get('/categories', [\App\Http\Controllers\Api\CategoryAPIController::class, 'index']);

Route::post('/login', [\App\Http\Controllers\Api\UserAPIController::class, 'login']);

// Route::group([
//     'prefix' => 'categories',
//     'middleware' => ['auth:sanctum']
// ], function() {
//     Route::post('/', [\App\Http\Controllers\Api\CategoryAPIController::class, 'store']);
//     Route::put('/{category}', [\App\Http\Controllers\Api\CategoryAPIController::class, 'update']);
//     Route::delete('/{category}', [\App\Http\Controllers\Api\CategoryAPIController::class, 'destroy']);
// });


Route::get('/categories/{category}', [\App\Http\Controllers\Api\CategoryAPIController::class, 'show'])->middleware('api_client');

Route::group([
    'prefix' => 'categories',
    'middleware' => 'auth:api'
], function() {
    Route::post('/', [\App\Http\Controllers\Api\CategoryAPIController::class, 'store']);
    Route::put('/{category}', [\App\Http\Controllers\Api\CategoryAPIController::class, 'update']);
    Route::delete('/{category}', [\App\Http\Controllers\Api\CategoryAPIController::class, 'destroy']);
});

// Route::get('/posts', [\App\Http\Controllers\Api\PostAPIController::class, 'index']);
// Route::group([
//     'prefix' => 'posts',
//     'middleware' => ['auth:sanctum']
// ], function() {
//     Route::post('/', [\App\Http\Controllers\Api\PostAPIController::class, 'store']);
//     Route::put('/{post}', [\App\Http\Controllers\Api\PostAPIController::class, 'update']);
//     Route::delete('/{post}', [\App\Http\Controllers\Api\PostAPIController::class, 'destroy']);
// });

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
