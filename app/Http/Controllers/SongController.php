<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Http\Controllers\MusicBrainzController;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\ReportedSong;

class SongController extends Controller
{
    private $musicBrainzController;
    public function __construct(MusicBrainzController $musicBrainzController)
    {
        $this->musicBrainzController = $musicBrainzController;
    }

    public function getSongDetailsFromMusicBrainz($id)
    {
        $user = Auth::user();
        $likedSongs = $user->liked_songs ?? [];
        $song = $this->musicBrainzController->getSong($id, "releases+artists+tags");

        $songObject = [
            'id' => $song["id"],
            'cover' => "http://coverartarchive.org/release/" . $song["releases"][0]["id"] . "/front" ?? "image/DefaultSongCover.png",
            'album' => $song["releases"][0]["title"] ?? "N/A",
            'country' => $song["releases"][0]["country"] ?? "N/A",
            'title' => $song["title"] ?? "N/A",
            'artist' => $song["artist-credit"][0]["name"] ?? "N/A",
            'duration' => $this->convertMsToMins($song["length"]) ?? "N/A",
            'genre' => $song["tags"][0]["name"] ?? "N/A",
            'song_link' => "No Link",
            'hasLikedSong' => isset($likedSongs[$song["id"]]),
        ];
        return response()->json($songObject);
    }
    
    public function likeSong(Request $request) {
        $user = Auth::user();
        $likedSongs = $user->liked_songs ?? [];

        // Get the song id from the request
        $songId = $request->input('songId');

        // Retrieves song metadata from MusicBrainz
        $song = $this->musicBrainzController->getSong($songId, "releases");
        
        // Check if the song is already liked
        if (isset($likedSongs[$songId])) {
            // Song is already liked, so remove it
            unset($likedSongs[$songId]);

            // Update the user's record in the database
            $user->update(['liked_songs' => $likedSongs]);
            return response()->json(['message' => 'Song removed from liked songs.']);

        } else {
            // Song is not liked, so add it
            // Create a JSON object for the song
            $songObject = [
                'id' => $songId,
                'releaseId' => $song["releases"][0]["id"],
                'title' => $song["title"],
                'db' => "MusicBrainz",
            ];
            // Add the song object to the liked songs json
            $likedSongs[$songId] = $songObject;

            // Update the user's record in the database
            $user->update(['liked_songs' => $likedSongs]);
            return response()->json(['message' => 'Song added to liked songs.']);
        }
    }
    
    public function rateSong(Request $request) {
        $user = Auth::user();
        $ratedSongs = $user->rated_songs ?? [];

        // Get the song id from the request
        $songId = $request->input('songId');
        $rating = $request->input('rating');

        // Retrieves song metadata from MusicBrainz
        $song = $this->musicBrainzController->getSong($songId, "releases");
        
        // Song is not liked, so add it
        // Create a JSON object for the song
        $songObject = [
            'id' => $songId,
            'rating' => $rating,
            'releaseId' => $song["releases"][0]["id"],
            'title' => $song["title"],
            'db' => "MusicBrainz",
        ];
        // Add the song object to the liked songs json
        $ratedSongs[$songId] = $songObject;

        // Update the user's record in the database
        $user->update(['rated_songs' => $ratedSongs]);
        $starMessage = ($rating == 1) ? "1 star." : $rating . " stars.";
        return response()->json(['message' => 'Song successfully rated ' . $starMessage]);
    }

    public function addToPlaylist(Request $request) {
        $user = Auth::user();
        $playlist = $user->playlist ?? [];

        // Get the song id from the request
        $songId = $request->input('songId');

        // Retrieves song metadata from MusicBrainz
        $song = $this->musicBrainzController->getSong($songId, "releases");
        
        if (!isset($playlist[$songId])) {
            // Song is not liked, so add it
            // Create a JSON object for the song
            $songObject = [
                'id' => $songId,
                'releaseId' => $song["releases"][0]["id"],
                'title' => $song["title"],
                'db' => "MusicBrainz",
            ];
            // Add the song object to the liked songs json
            $playlist[$songId] = $songObject;

            // Update the user's record in the database
            $user->update(['playlist' => $playlist]);
            return response()->json(['message' => 'Song added to playlist.']);
        } else {
            return response()->json(['message' => 'Song is already in your playlist']);
        }
    }

    public function getLikedSongs() {
        $user = Auth::user();
        $likedSongs = $user->liked_songs ?? [];

        return response()->json(['likedSongs' => $likedSongs]);
    }

    public function getRatedSongs() {
        $user = Auth::user();
        $ratedSongs = $user->rated_songs ?? [];

        return response()->json(['ratedSongs' => $ratedSongs]);
    }

    public function getPlaylist() {
        $user = Auth::user();
        $playlist = $user->playlist ?? [];

        return response()->json(['playlist' => $playlist]);
    }

    public function getLikedSongsOfUser($userId) {
        $user = User::find($userId);
        $likedSongs = $user->liked_songs ?? [];

        return response()->json(['likedSongs' => $likedSongs]);
    }

    public function getRatedSongsOfUser($userId) {
        $user = User::find($userId);
        $ratedSongs = $user->rated_songs ?? [];

        return response()->json(['ratedSongs' => $ratedSongs]);
    }

    public function getPlaylistOfUser($userId) {
        $user = User::find($userId);
        $playlist = $user->playlist ?? [];

        return response()->json(['playlist' => $playlist]);
    }

    private function convertMsToMins($milliseconds)
    {
        if ($milliseconds) {
            $seconds = floor($milliseconds / 1000);
            $minutes = floor($seconds / 60);
            $seconds %= 60;

            return $minutes . ':' . sprintf('%02d', $seconds);
        }

        return null;
    }
}