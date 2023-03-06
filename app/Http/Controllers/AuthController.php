<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    // Function to login page
    public function login() {
        return view('/login');
    }

    // Function to register page
    public function register() {
        return view('/register');
    }

    // Function register process
    public function registerProcess(Request $request) {
        // cek value inputan
        // dd($request->all());

        // validasi input
        $validated = $request->validate([
            'username' => 'required|unique:users|max:255',
            'password' => 'required|max:255',
            'phone'    => 'max:255',
            'address'  => 'required'
        ]);

        // Enkripsi password
        $request['password'] = Hash::make($request->password);

        // Add to database
        $user = User::create($request->all());

        Session::flash('status', 'success');
        Session::flash('message', 'Registration success, Wait admin for approval');

        return redirect('/register');

    }
    
    // Authentication for login processing
    public function authenticating(Request $request) {

        $credentials = $request->validate([
            'username' => ['required'],
            'password' => ['required'],
        ]);
 
        // Checking data on database (login validation)
        if (Auth::attempt($credentials)) {
            
            // Checking user status is active or not
            if (Auth::user()->status != 'active') {

                Auth::logout();
                $request->session()->invalidate();
                $request->session()->regenerateToken();
                Session::flash('status', 'failed');
                Session::flash('message', 'Your account is not active yet, please contact admin!');
                return redirect('/login'); 

            }
            // Session login
            // $request->session()->regenerate();
            if (Auth::user()->role_id == 1) {
                return redirect('dashboard');
            }

            if (Auth::user()->role_id == 2) {
                return redirect('profile');
            }
            
        }
        
        // If account is invalid (unregistered)
        Session::flash('status', 'failed');
        Session::flash('message', 'Login Invalid');
        return redirect('/login');
    }

    public function logout(Request $request) {

        // Controller untuk logout
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('login');
    } 
    
}
