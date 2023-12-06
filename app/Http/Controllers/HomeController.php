<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class HomeController extends Controller {
   public function index() {

      $role = Auth::user()->role;

      if($role == '1') {

         return view('admin.adminHomepage');

      } else {
         return view('user.userHomepage');
      }
   }

   public function showAllUsers() {
      $users = User::where('id', '!=', auth()->id())
         ->where('role', '!=', 1)
         ->get();

      return view('user.userHomePage', compact('users'));
   }

   public function updateProfile(Request $request) {
      $user = Auth::user();

      // Validate the incoming request data
      $request->validate([
         'name' => 'nullable|string|max:255',
         'bio' => 'nullable|string|max:255',
         'location' => 'nullable|string|max:255',
         'birthdate' => 'nullable|date',
         'profile_image' => 'required|mimes:jpg,jpeg,png',
      ]);

      $profile_image = $request->file('profile_image');

        $name_gen = hexdec(uniqid());
        $img_ext = strtolower($profile_image->getClientOriginalExtension());
        $image_name = $name_gen . '.' . $img_ext;
        $up_loc = 'image/profile/';
        $last_img = $up_loc . $image_name;

        $profile_image->move($up_loc, $image_name);

      // Update the user's profile information
      $user->update([
         'name' => $request->input('name'),
         'bio' => $request->input('bio'),
         'location' => $request->input('location'),
         'birthdate' => $request->input('birthdate'),
         'profile_image' => $last_img,
      ]);

      return redirect()->back()->with('success', 'Profile updated successfully');
   }
}
