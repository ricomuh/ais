<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\LandingPageController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\StaffPageController;
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

Route::get('/', HomeController::class)->name('home');

Route::get('/page/{page:slug}', [LandingPageController::class, 'show'])->name('page');
Route::get('/faqs', [LandingPageController::class, 'faqs'])->name('faqs');

Route::group(['prefix' => '/news', 'as' => 'news.'], function () {
    Route::get('/', [NewsController::class, 'index'])->name('index');
    Route::get('/search', [NewsController::class, 'search'])->name('search');
    Route::get('/tag/{tag:slug}', [NewsController::class, 'tag'])->name('tag');
    Route::get('/read/{post:slug}', [NewsController::class, 'show'])->name('read');
});

Route::group(['prefix' => '/staff', 'as' => 'staff.'], function () {
    Route::get('/', [StaffPageController::class, 'index'])->name('index');
    Route::get('/{staff}', [StaffPageController::class, 'show'])->name('detail');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__ . '/auth.php';
