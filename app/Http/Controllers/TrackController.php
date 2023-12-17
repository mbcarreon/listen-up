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
}
