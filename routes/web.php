<?php

use App\Http\Controllers\ProfileController;
use \App\Http\Controllers\SearchController;
use \App\Http\Controllers\ImageDownloadController;
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

//Route::middleware('restricted.ip')->group(function () {
    Route::get('/', function () {
        return view('welcome');
    });

    Route::get('/dashboard', function () {
        return view('dashboard');
    })->middleware(['auth'])->name('dashboard');

    Route::middleware('auth')->group(function () {
        Route::controller(ProfileController::class)->group(function () {
            Route::get('/profile', 'edit')->name('profile.edit');
            Route::patch('/profile', 'update')->name('profile.update');
            Route::delete('/profile', 'destroy')->name('profile.destroy');
            Route::patch('/profile/avatar/update', 'updateAvatar')->name('profile.avatar.update');
        });

        Route::controller(SearchController::class)->group(function (){
            Route::get('/search', 'index')->name('search.view');
            Route::post('/search', 'search')->name('search.find');
        });

        Route::controller(ImageDownloadController::class)->group(function (){
            Route::get('/gallery', 'index')->name('gallery.view');
            Route::post('/gallery/download', 'download_image')->name('gallery.download');
        });
    });

    require __DIR__.'/auth.php';
//});


