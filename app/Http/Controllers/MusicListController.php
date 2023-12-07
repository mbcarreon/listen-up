<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\MusicList;

class MusicListController extends Controller
{
    public function AllMusicList()
    {
        $musiclist = MusicList::latest()->paginate(10);
        return view('admin.admin-musicList', compact('musiclist')); // Change 'user.admin-musicList' to 'admin.admin-musicList'
    }

    public function AddMusicList(Request $request)
    {
        $validated = $request->validate([
            'brand_name' => 'required|unique:brands|max:255',
            'author' => 'required|unique:brands|max:255',
        ], [
            'brand_name.required' => 'Please input brand name',
            'brand_name.max' => 'Brand name must be less the 255 characters',

        ]);

        MusicList::insert([
            'music_name' => $request->music_name,
            'author' => $request->author,
        ]);
        return redirect()->back()->with('success', 'Music Inserted Successfully');
    }
}
