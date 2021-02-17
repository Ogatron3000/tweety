<?php

use App\Http\Controllers\TweetController;
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

Route::get('/', function () {
    return view('welcome');
})->middleware('guest');

//Route::get('/dashboard', function () {
//    return view('dashboard');
//})->middleware(['auth'])->name('dashboard');

Route::resource('tweets', TweetController::class)->except(['create'])->middleware(['auth']);

//Route::get('/dashboard', [TweetController::class, 'index'])->middleware(['auth'])->name('dashboard');
//Route::post('/dashboard', [TweetController::class, 'store'])->middleware(['auth'])->name('tweets.store');

require __DIR__.'/auth.php';
