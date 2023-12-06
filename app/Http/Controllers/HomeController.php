<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class HomeController extends Controller
{
    public function index() {

         $role = Auth::user()->role;

         if($role == '1'){

            return view('admin.adminHomepage');

         } else{
            return view('user.userHomepage');
         }
    }

    public function showAllUsers()
{
   $users = User::where('role', '!=', 1)->get();

    return view('user.userHomePage', compact('users'));
}
}
