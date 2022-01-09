<?php

use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\BlogController;
use App\Http\Controllers\Guess\HomeController;
use App\Http\Controllers\Guess\PageController;
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

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/load-more', [HomeController::class, 'indexLoadMore'])->name('home.load-more');
Route::get('/admin/login', [AuthController::class, 'index'])->name('auth.login.index');
Route::post('/admin/login', [AuthController::class, 'login'])->name('auth.login.post');
Route::get('/admin/register', [AuthController::class, 'registration'])->name('auth.register');
Route::post('/admin/register', [AuthController::class, 'customRegistration'])->name('auth.register.custom');
Route::get('/admin/logout', [AuthController::class, 'signOut'])->name('auth.logout');
Route::get('/change-language/{languague}', [HomeController::class, 'changeLanguage'])->name('change-language');
Route::get('/tags', [PageController::class, 'tags'])->name('page.tags');
Route::get('/tags/{slug}', [PageController::class, 'tagBlogs'])->name('page.tag');
Route::get('/tags/{slug}/load-more', [PageController::class, 'tagBlogsLoadMore'])->name('page.tag.load-more');
Route::get('/contact', [PageController::class, 'contact'])->name('page.contact');
Route::post('/subscribe -news', [HomeController::class, 'subscribeNews'])->name('subscribe.news');
Route::post('/contact', [HomeController::class, 'contact'])->name('contact');
Route::get('/sitemap.xml', [PageController::class, 'generateSiteMap'])->name('sitemap');
Route::get('/blogs/search', [HomeController::class, 'searchBlog'])->name('blogs.search');

//Customize Pages - Last Line
Route::get('/{slug}', [PageController::class, 'pageCustom'])->name('page.custom');

