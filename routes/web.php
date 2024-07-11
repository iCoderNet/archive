<?php

use App\Http\Controllers\AdvencedSearchController;
use App\Http\Controllers\ArticlesController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\FAQController;
use App\Http\Controllers\PersonSearchController;
use App\Http\Controllers\SuggetsController;
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

Route::get('/', function () {
    return view('index');
})->name('home');

Route::get('/contact', function () {
    return view('pages.contact');
})->name('contact');
Route::post('/contact', [ContactController::class, 'submitContact'])->name('contact.submit');

Route::get('/suggest', function () {
    return view('pages.suggest');
})->name('suggest');
Route::post('/suggest', [SuggetsController::class, 'submitSugget'])->name('suggest.submit');


Route::get('/faq', function () {
    return view('pages.faq');
})->name('faq');
Route::post('/faq', [FAQController::class, 'submitFAQ'])->name('faq.submit');


Route::get('/person', [PersonSearchController::class, 'index'])->name('person');
Route::get('/advanced-search', [AdvencedSearchController::class, 'index'])->name('search.advanced');

Route::get('articles/', [ArticlesController::class, 'index'])->name('articles.index');
Route::get('articles/{id}', [ArticlesController::class, 'show'])->name('articles.show');
Route::get('videos/', [ArticlesController::class, 'videos'])->name('articles.videos');
Route::get('videos/{id}', [ArticlesController::class, 'video'])->name('articles.video');
Route::get('photos/', [ArticlesController::class, 'photos'])->name('articles.photos');
Route::get('photos/{id}', [ArticlesController::class, 'photo'])->name('articles.photo');


Route::get('lang/{locale}', [App\Http\Controllers\LocalizationController::class, 'index']);
