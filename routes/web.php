<?php

use App\Http\Controllers\CarouselController;
use App\Http\Controllers\FaqController;
use App\Http\Controllers\FeaturedTagController;
use App\Http\Controllers\FooterLinkController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ImageUploadController;
use App\Http\Controllers\LandingPageController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\StaffController;
use App\Http\Controllers\StaffPageController;
use App\Http\Controllers\SubMenuController;
use App\Http\Controllers\SubMenuTitleController;
use App\Http\Controllers\TagController;
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

Route::group(['middleware' => 'auth', 'prefix' => '/dashboard'], function () {
    Route::view('/', 'dashboard')->name('dashboard');


    Route::group(['as' => 'dashboard.'], function () {
        Route::post('/uploadImg', ImageUploadController::class)->name('uploadImg')->withoutMiddleware('auth');
        Route::resource('/tags', TagController::class);
        Route::resource('/featuredTags', FeaturedTagController::class);
        Route::resource('/footerLinks', FooterLinkController::class);
        Route::resource('/faqs', FaqController::class);
        Route::resource('/menus', MenuController::class);
        Route::resource('/subMenuTitles', SubMenuTitleController::class);
        Route::resource('/subMenus', SubMenuController::class);
        Route::resource('/carousels', CarouselController::class);
        Route::resource('/staff', StaffController::class);
        Route::resource('/pages', PageController::class);
    });
});

require __DIR__ . '/auth.php';
