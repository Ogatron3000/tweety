<?php

use App\Http\Controllers\ExploreController;
use App\Http\Controllers\FollowsController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\ProfileController;
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

Route::resource('home/tweets', TweetController::class)->except(['create'])->middleware(['auth']);

//Route::get('/dashboard', [TweetController::class, 'index'])->middleware(['auth'])->name('dashboard');
//Route::post('/dashboard', [TweetController::class, 'store'])->middleware(['auth'])->name('tweets.store');

// Profile
Route::get('/profiles/{user:username}', [ProfileController::class, 'show'])->name('profiles.show')->middleware(['auth']);
Route::get('/profiles/{user:username}/edit', [ProfileController::class, 'edit'])->name('profiles.edit')->middleware(['auth', 'can:edit,user']);
Route::put('/profiles/{user:username}', [ProfileController::class, 'update'])->name('profiles.update')->middleware(['auth']);

// Follows
Route::post('/profiles/{user:username}/follow', [FollowsController::class, 'store'])->name('follows.store')->middleware(['auth']);

// Explore
Route::get('/explore', [ExploreController::class, 'index'])->name('explore')->middleware(['auth']);

// Likes
Route::post('/likes', [LikeController::class, 'store'])->name('likes.store')->middleware(['auth']);
Route::delete('/likes/{id}', [LikeController::class, 'destroy'])->name('likes.destroy')->middleware(['auth']);


require __DIR__.'/auth.php';
