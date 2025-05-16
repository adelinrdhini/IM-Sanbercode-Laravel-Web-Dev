<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\profile;


class AuthController extends Controller
{
    public function showregister()
    {
        return view('Auth.register');
    }


    public function registeruser (Request $request)
    {
        $request->validate([
            'name' => 'required|min:5',
            'email' => 'required|string|email|max:255|unique:user',
            'password' => 'required|string|min:8|confirmed',
        ]);

        $userCount = User::count();

        $user = new User;
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->password = Hash::make($request->input('password'));
        $user->role = 'user'; // Default role for new users

        $user->role = $userCount === 0 ? 'admin' : 'user'; // Set the first user as admin

        $user->save();
        return redirect('/')->with('success', 'Registration successful! You can now log in.');

    }

    public function showlogin()
    {
      
        return view('Auth.login');
    }
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|string|email|max:255',
            'password' => 'required|string|min:8',
        ]);
        
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
        
            return redirect()->intended('/')->with('success', 'You have been logged in successfully.');
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/')->with('success', 'You have been logged out successfully.');
    }

    public function getprofile()
    {
        $userAuth = Auth::user()->profile;

        $userId = Auth::id();
        $profileData = profile::where('user_id', $userId)->first();

        if ($userAuth){
            return view ("profile.edit", ["profile"=> $profileData]);
        }else{
            return view ("profile.create");
        }
    }


    public function createprofile(request $request)
    {
        $request->validate([
            'age' => 'required|numeric',
            'address' => 'required|string|max:250',
        ]);

        $userId = Auth::id();

        $profile = new Profile;
        $profile->age = $request->input('age');
        $profile->address = $request->input('address');
        $profile->user_id = $userId;

        $profile->save();

        return redirect('/profile')->with ('success', 'Profile made successfully.');
        
    }

    public function updateprofile(request $request, $id)
    {
        $request->validate([
            'age' => 'required|numeric',
            'address' => 'required|string|max:250',
        ]);

        $profile = profile::find($id);
        $profile->age = $request->input('age');
        $profile->address = $request->input('address');

        $profile->save();

        return redirect('/profile')->with ('success', 'Profile updated successfully.');
        
    }
    
}

