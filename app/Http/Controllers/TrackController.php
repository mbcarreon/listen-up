<?php

namespace App\Http\Controllers;

use App\Models\Track;
use Illuminate\Http\Request;

class TrackController extends Controller
{
    public function store(Request $request)
    {
        // Validate the form data
        $request->validate([
            'title' => 'required|string',
            'artist' => 'required|string',
            'album' => 'required|string',
            'country' => 'required|string',
            'genre' => 'required|string',
            'duration' => 'required|string',
            'cover' => 'required|mimes:jpg,jpeg,png',
            'song_link' => 'required|string',
        ]);

        // Upload the cover picture
        if ($request->hasFile('cover')) {
            $cover = $request->file('cover');

            $name_gen = hexdec(uniqid());
            $img_ext = strtolower($cover->getClientOriginalExtension());
            $image_name = $name_gen . '.' . $img_ext;
            $up_loc = 'image/cover/';
            $last_img = $up_loc . $image_name;

            $cover->move($up_loc, $image_name);

            // Create a new track
            Track::create([
                'title' => $request->input('title'),
                'artist' => $request->input('artist'),
                'album' => $request->input('album'),
                'country' => $request->input('country'),
                'genre' => $request->input('genre'),
                'duration' => $request->input('duration'),
                'cover' => $last_img,
                'song_link' => $request->input('song_link'),
            ]);
            return response()->json(['message' => 'Track successfully submitted']);
        } else {
            return response()->json(['message' => 'An error occured during your request']);
        }
    }

    public function getAllTracks()
    {
        $tracks = Track::all();
        return response()->json(['tracks' => $tracks]);
    }

    public function getHomepageTracks()
    {
        $tracks = Track::paginate(5);
        return response()->json(['tracks' => $tracks]);
    }

    public function getReportedTracks() {
        $tracks = Track::where('isReported', true)->get();
        return response()->json(['tracks' => $tracks]);
    }

    public function getSongDetailsFromListenUp($id)
    {
        $track = Track::find($id);
        if ($track) {
            $songObject = [
                'id' => $track["id"],
                'cover' => $track["cover"],
                'album' => $track["album"],
                'country' => $track["country"],
                'title' => $track["title"],
                'artist' => $track["artist"],
                'duration' => $track["duration"],
                'genre' => $track["genre"],
                'song_link' => $track["song_link"],
                'isReported' => $track["isReported"],
                'hasLikedSong' => isset($likedSongs[$track["id"]]),
            ];
            return response()->json($songObject);
        } else {
            return response()->json(['message' => 'Track not found'], 404);
        }
    }

    public function reportTrack(Request $request) {
        $songId = $request->input('songId');
        $track = Track::find($songId);
        $track->update(['isReported' => true]);
        return response()->json(['message' => 'Track has been reported successfully.']);
    }
    
    public function deleteTrack(Request $request) {
        $songId = $request->input('songId');
        $track = Track::find($songId);

        if (!$track) {
            return response()->json(['message' => 'Track not found.']);
        }

        $track->delete();
        return response()->json(['message' => 'Track has been deleted successfully.']);
    }

    public function resolveTrack(Request $request) {
        $songId = $request->input('songId');
        $track = Track::find($songId);
        $track->update(['isReported' => false]);
        return response()->json(['message' => 'Track has been resolved successfully.']);
    }
}