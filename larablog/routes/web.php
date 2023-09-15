<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [\App\Http\Controllers\PageController::class, 'home'])->name('pages.home');
Route::get('/about-us', [\App\Http\Controllers\PageController::class, 'about'])->name('pages.about');

Auth::routes();

Route::get('/admin/categories', [\App\Http\Controllers\CategoryController::class, 'index'])->name('categories.index');
