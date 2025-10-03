<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Profile;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function renderRegister(){
        return view('auth.register');
    }

    public function createUser(Request $request){
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required|confirmed|min:8',
            'role' => 'required|in:admin,user',
        ]);

        $user = new User;
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->password = Hash::make($request->input('password'));
        $user->role = $request->input('role');

        $user->save();

        return redirect('/')->with('success', 'register berhasil');
    }

    public function showLogin(){
        return view('auth.login');
    }

    public function login(Request $request){
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
 
            return redirect()->intended('/')->with('success', 'Login berhasil');
        }

        return back()->withErrors([
            'email' => 'Email tidak ditemukan.',
        ])->onlyInput('email');
    }

    public function logout(Request $request){

        Auth::logout();
 
        $request->session()->invalidate();
    
        $request->session()->regenerateToken();
    
        return redirect('/')->with('success', 'Anda telah logout');
    }

    public function getProfile(){
        $userAuth = Auth::User()->profile;

        $userId = Auth::id();

        $profileData = Profile::where('user_id', $userId)->first();

        if($userAuth){
            return view('profile.edit', ['profile' => $profileData]);
        }else{
            return view('profile.create');
        }
    }

    public function createProfile(Request $request){
        $request->validate([
            'age' => 'required|numeric',
            'address' => 'required',
        ]);

        $profile = new Profile;
        $profile->age = $request->input('age');
        $profile->address = $request->input('address');
        $profile->user_id = $userId = Auth::id();

        $profile->save();

        return redirect('/profile');
    }

        public function updateProfile(Request $request, $id){
        $request->validate([
            'age' => 'required|numeric',
            'address' => 'required',
        ]);

        $profile = Profile::find($id);
        $profile->age = $request->input('age');
        $profile->address = $request->input('address');

        $profile->save();

        return redirect('/profile')->with('success', 'Berhasil update profile');
    }
}
