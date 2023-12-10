<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Http\Controllers\MusicBrainzController;

class SongController extends Controller
{
    private $musicBrainzController;
    public function __construct(MusicBrainzController $musicBrainzController)
    {
        $this->musicBrainzController = $musicBrainzController;
    }

    public function getSongDetailsFromMusicBrainz($id)
    {
        $song = $this->musicBrainzController->getSong($id, "releases+artists+tags");
        $songObject = [
            'id' => $song["id"],
            'cover' => "http://coverartarchive.org/release/" . $song["releases"][0]["id"] . "/front" ?? "N/A",
            'album' => $song["releases"][0]["title"] ?? "N/A",
            'country' => $song["releases"][0]["country"] ?? "N/A",
            'title' => $song["title"] ?? "N/A",
            'artist' => $song["artist-credit"][0]["name"] ?? "N/A",
            'duration' => $song["length"] . " ms" ?? "N/A",
            'genre' => $song["tags"][0]["name"] ?? "N/A",
            'song_link' => "No Link",
        ];
        return response()->json($songObject);
    }
}