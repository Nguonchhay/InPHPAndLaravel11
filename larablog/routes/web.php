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

Route::group([
    'middleware' => 'auth'
], function() {

    Route::group([
        'middleware' => 'admin_role'
    ], function() {
        Route::get('/admin/categories', [\App\Http\Controllers\CategoryController::class, 'index'])->name('categories.index');
        Route::get('/admin/categories/create', [\App\Http\Controllers\CategoryController::class, 'create'])->name('categories.create');
        Route::post('/admin/categories', [\App\Http\Controllers\CategoryController::class, 'store'])->name('categories.store');
        Route::get('/admin/categories/{category}', [\App\Http\Controllers\CategoryController::class, 'edit'])->name('categories.edit');
        Route::put('/admin/categories/{category}', [\App\Http\Controllers\CategoryController::class, 'update'])->name('categories.update');
        Route::delete('/admin/categories/{category}', [\App\Http\Controllers\CategoryController::class, 'destroy'])->name('categories.destroy');

    });
    
    Route::group([
        'prefix' => '/admin/posts'
    ], function() {
        Route::get('/', [\App\Http\Controllers\PostController::class, 'index'])->name('admin.posts.index');
        Route::get('/create', [\App\Http\Controllers\PostController::class, 'create'])->name('admin.posts.create');
        Route::post('/', [\App\Http\Controllers\PostController::class, 'store'])->name('admin.posts.store');
        Route::get('/{post}', [\App\Http\Controllers\PostController::class, 'edit'])->name('admin.posts.edit')->middleware('can:updatePost,post');
        Route::put('/{post}', [\App\Http\Controllers\PostController::class, 'update'])->name('admin.posts.update')->middleware('can:updatePost,post');
        Route::delete('/{post}', [\App\Http\Controllers\PostController::class, 'destroy'])->name('admin.posts.destroy')->middleware('can:deletePost,post');
    });
});
