<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MusicBrainzController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\SettingsController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MusicListController;
use App\Http\Controllers\SongController;
use App\Http\Controllers\TrackController;

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

    Route::get('/user/membersList', function () {
        return view('user/membersList');
    })->name('user/membersList');

    Route::get('/user/viewLike', function () {
        return view('user/viewLike');
    })->name('user/viewLike');

    Route::get('/user/viewRating', function () {
        return view('user/viewRating');
    })->name('user/viewRating');

    Route::get('/user/viewPlaylist', function () {
        return view('user/viewPlaylist');
    })->name('user/viewPlaylist');

    Route::get('/user/viewTracks', function () {
        return view('user/viewTracks');
    })->name('user/viewTracks');

    Route::get('/admin/admin-musicList', function () {
        return view('admin/admin-musicList');
    })->name('admin/admin-musicList');
    

    //for Users
    Route::get('/home', [HomeController::class, 'index'])->name('home');
    Route::get('redirects', 'App\Http\Controllers\HomeController@index');
    Route::get('/users/all', [HomeController::class, 'showAllUsers'])->name('users');
    Route::get('/user/membersList', [HomeController::class, 'showAllUsers'])->name('/user/membersList');

    Route::post('/user/update-profile', [HomeController::class, 'updateProfile'])->name('user.update-profile');
    Route::post('/user/update-playlist_name', [HomeController::class, 'updatePlaylistName'])->name('user.update-playlist_name');
    Route::get('/user/{id}', [HomeController::class, 'show'])->name('user.show');

    
    Route::post('/like-song', [SongController::class, 'likeSong']);
    Route::post('/rate-song', [SongController::class, 'rateSong']);
    Route::post('/add-to-playlist', [SongController::class, 'addToPlaylist']);
    Route::get('/get-liked-songs', [SongController::class, 'getLikedSongs']);
    Route::get('/get-rated-songs', [SongController::class, 'getRatedSongs']);
    Route::get('/get-playlist', [SongController::class, 'getPlaylist']);
  
    Route::get('/get-liked-songs/{id}', [SongController::class, 'getLikedSongsOfUser']);
    Route::get('/get-rated-songs/{id}', [SongController::class, 'getRatedSongsOfUser']);
    Route::get('/get-playlist/{id}', [SongController::class, 'getPlaylistOfUser']);
    
    Route::get('/get-song-details/music-brainz/{id}', [SongController::class, 'getSongDetailsFromMusicBrainz']);
    Route::post('/report-song', [SongController::class, 'reportSong']);
    Route::get('/get-reported-songs', 'SongController@getReportedSongs');
    // Add this route to handle the "Make Admin" action in HomeController
    Route::post('/make-admin/{user}', [HomeController::class, 'makeAdmin'])->name('make-admin');

    Route::post('/tracks/store', [TrackController::class, 'store'])->name('tracks.store');
    Route::get('/tracks/all', [TrackController::class, 'getAllTracks'])->name('tracks.all');
    Route::get('/tracks/homepage', [TrackController::class, 'getHomepageTracks'])->name('tracks.homepage');
    Route::get('/get-song-details/listen-up/{id}', [TrackController::class, 'getSongDetailsFromListenUp']);

    Route::post('/report-track', [TrackController::class, 'reportTrack']);
    Route::post('/delete-track', [TrackController::class, 'deleteTrack']);
    Route::post('/resolve-track', [TrackController::class, 'resolveTrack']);
    Route::get('/get-reported-tracks', [TrackController::class, 'getReportedTracks']);
    
    Route::post('/like-track', [TrackController::class, 'likeTrack']);
    Route::post('/add-track-to-playlist', [TrackController::class, 'addToPlaylist']);
});

//for viewing music list
Route::get('/musiclist/all', [MusicListController::class, 'AllMusicList'])->name('musiclist');
Route::post('/mlist/add', [MusicListController::class, 'AddMusicList'])->name('add.music');

//for contacts
Route::get('/contact', [ContactController::class, 'index'])->name('contact.form');
Route::post('/contact', [ContactController::class, 'submitForm'])->name('contact.submit');