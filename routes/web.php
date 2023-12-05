<?php

use Illuminate\Support\Facades\Route;
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

    Route::get('/user/musicList', function () {
        return view('user/musicList');
    })->name('user/musicList');

    Route::get('/admin/admin-musicList', function () {
        return view('admin/admin-musicList');
    })->name('admin/admin-musicList');

    Route::get('redirects', 'App\Http\Controllers\HomeController@index');
});

Route::get('/musiclist/all', [MusicListController::class, 'AllMusicList'])->name('musiclist');
Route::post('/mlist/add', [MusicListController::class, 'AddMusicList'])->name('add.music');
Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::get('/contact', [ContactController::class, 'index'])->name('contact.form');
Route::post('/contact', [ContactController::class, 'submitForm'])->name('contact.submit');