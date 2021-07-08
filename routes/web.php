<?php

use App\Http\Controllers\IndexController;
use App\Http\Controllers\CategoryController;
use App\Models\Category;
use App\Http\Controllers\NewsController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});

// Route::get('/', [IndexController::class, 'index']);

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::get('/news', [NewsController::class, 'index'])->name('news.index');
Route::get('/categories', [CategoryController::class, 'index'])->name('categories.index');
Route::get('/news/create', [NewsController::class, 'create'])->name('news.create');
Route::post('/news/create', [NewsController::class, 'store'])->name('news.store');
Route::get('/categories/{category}', [CategoryController::class, 'show'])->name('categories.show');
Route::get('/news/{news}', [NewsController::class, 'show'])->name('news.show');

require __DIR__.'/auth.php'; // logging in: Kate... lady... 12345678
