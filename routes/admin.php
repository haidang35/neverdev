<?php

use App\Http\Controllers\Admin\BlogController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\TopicController;
use Illuminate\Support\Facades\Route;

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

Route::middleware(['auth', 'admin', 'localization'])->prefix('admin')->name('admin.')->group(function() {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
    Route::prefix('blog')->name('blog.')->group(function() {
        Route::get('/', [BlogController::class, 'index'])->name('index');
        Route::get('/create', [BlogController::class, 'create'])->name('create');
        Route::post('/store', [BlogController::class, 'store'])->name('store');
        Route::get('/{id}/edit', [BlogController::class, 'edit'])->name('edit');
        Route::post('/{id}/update', [BlogController::class, 'update'])->name('update');
        Route::post('/ckeditor/upload', [BlogController::class, 'ckeditorUpload'])->name('ckeditor.upload');
    });
    Route::prefix('topic')->name('topic.')->group(function() {
        Route::get('/', [TopicController::class, 'index'])->name('index');
        Route::post('/store', [TopicController::class, 'store'])->name('store');       
        Route::post('/{id}/update', [TopicController::class, 'update'])->name('update');       
    });
    Route::get('change-language/{language}', [DashboardController::class, 'changeLanguage'])->name('change-language');
});

