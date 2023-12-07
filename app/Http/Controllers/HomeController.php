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

      return view('user.membersList', compact('users'));
   }

   public function updateProfile(Request $request) {
      $user = Auth::user();
      
      $request->validate([
          'name' => 'nullable|string|max:255',
          'bio' => 'nullable|string|max:255',
          'location' => 'nullable|string|max:255',
          'birthdate' => 'nullable|date',
          'profile_image' => 'nullable|mimes:jpg,jpeg,png', 
      ]);
  
      if ($request->hasFile('profile_image')) {
          $profile_image = $request->file('profile_image');
  
          $name_gen = hexdec(uniqid());
          $img_ext = strtolower($profile_image->getClientOriginalExtension());
          $image_name = $name_gen . '.' . $img_ext;
          $up_loc = 'image/profile/';
          $last_img = $up_loc . $image_name;
  
          $profile_image->move($up_loc, $image_name);
  
          $user->update(['profile_image' => $last_img]);
      }
  
      $user->update([
          'name' => $request->input('name'),
          'bio' => $request->input('bio'),
          'location' => $request->input('location'),
          'birthdate' => $request->input('birthdate'),
      ]);
  
      return redirect()->back()->with('success', 'Profile updated successfully');
  }
  public function show($id)
    {
        $user = User::findOrFail($id);

        return view('user.viewProfile', compact('user'));
    }
}
