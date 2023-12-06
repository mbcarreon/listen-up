<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MusicBrainzController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\SettingsController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MusicListController;

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
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    //route for navbar
    Route::get('/user/musicList', function () {
        return view('user/musicList');
    })->name('user/musicList');

    Route::get('/admin/admin-musicList', function () {
        return view('admin/admin-musicList');
    })->name('admin/admin-musicList');

    //for Users
    Route::get('/home', [HomeController::class, 'showAllUsers'])->name('home');
    Route::get('redirects', 'App\Http\Controllers\HomeController@showAllUsers');
    Route::get('/users/all', [HomeController::class, 'showAllUsers'])->name('users');

    Route::post('/user/update-profile', [HomeController::class, 'updateProfile'])->name('user.update-profile');
});

//for viewing music list
Route::get('/musiclist/all', [MusicListController::class, 'AllMusicList'])->name('musiclist');
Route::post('/mlist/add', [MusicListController::class, 'AddMusicList'])->name('add.music');

//for contacts
Route::get('/contact', [ContactController::class, 'index'])->name('contact.form');
Route::post('/contact', [ContactController::class, 'submitForm'])->name('contact.submit');