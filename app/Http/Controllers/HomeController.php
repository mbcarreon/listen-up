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
      ]);

      // Update the user's profile information
      $user->update([
         'name' => $request->input('name'),
         'bio' => $request->input('bio'),
         'location' => $request->input('location'),
         'birthdate' => $request->input('birthdate'),
      ]);

      return redirect()->back()->with('success', 'Profile updated successfully');
   }
}
