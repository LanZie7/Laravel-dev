<?php

use App\Http\Controllers\Account\IndexController as AccountIndexController;
use App\Http\Controllers\Admin\CategoryController as AdminCategoryController;
use App\Http\Controllers\Admin\NewsController as AdminNewsController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\Admin\MainController;
use App\Models\Category;
use App\Http\Controllers\NewsController;
use Illuminate\Support\Facades\Route;


//main page for the admin ???
Route::get('/admin', [MainController::class, 'index'])->name('admin.main');

Route::get('/admin/categories{id}/news', [AdminCategoryController::class, 'filter'])
    ->name('admin.categories.filter');


//user
Route::get('/', function () {
    return view('index');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::get('/news', [NewsController::class, 'index'])->name('news.index');
Route::get('/categories', [CategoryController::class, 'index'])->name('categories.index');
Route::get('/news/create', [NewsController::class, 'create'])->name('news.create');
Route::post('/news/create', [NewsController::class, 'store'])->name('news.store');
Route::get('/categories/{category}', [CategoryController::class, 'show'])->name('categories.show');
Route::get('/news/{news}', [NewsController::class, 'show'])->name('news.show');

// Route::resource('feedback', FeedbackController::class);
// Route::view('/feedback', 'feedback')->name('feedback');

Route::get('session', function () {
    session(['newSession' => 'newValue']);
    if(session()->has('newSession')) {
        session()->remove('newSession');
    }
    return "There is no sessions";
});


Route::group(['middleware' => 'auth'], function () {
    Route::get('/account', AccountIndexController::class)->name('account');
    Route::get('/logout', function () {
        \Auth::logout();
        return redirect()->route('login');
    })->name('logout');

    //admin
    Route::group(['prefix' => 'admin','middleware' => 'admin', 'as' => 'admin'], function() {
        Route::view('/', 'admin.index')->name('index');
        Route::resource('categories', AdminCategoryController::class);
        Route::resource('news', AdminNewsController::class);
    });
});

Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
