<?php

namespace App\Http\Controllers;

use App\Models\RentLogs;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{

    public function index() {
        $users = User::where('role_id', 2)->where('status', 'active')->get();
        return view('user', ['users' => $users]);
    }
    //
    public function profile() {
        
        // $request->session()->flush();
        $rentlog = RentLogs::with(['user', 'book'])->where('user_id', Auth::user()->id)->get();
        return view('profile', ['rentlog' => $rentlog]);
    }

    public function registeredUser() {

        $registeredUsers = User::where('status', 'inactive')->where('role_id', '2')->get();
        return view('registered-user', ['registeredUsers' => $registeredUsers]);
    }

    // Show detail user
    public function show($slug) {
        $user = User::where('slug', $slug)->first();
        $rentlog = RentLogs::with(['user', 'book'])->where('user_id', $user->id)->get();
        return view('user-detail', ['user' => $user, 'rentlog' => $rentlog]);
    }

    // Approve user
    public function approve($slug) {
        $user = User::where('slug', $slug)->first();
        $user->status = 'active';
        $user->save();
        return redirect('user-detail/'.$slug)->with('status', 'User approved successfully');
    }

    // Go to ban page
    public function ban($slug) {
        $user = User::where('slug', $slug)->first();
        return view('user-delete', ['user' => $user]);
    }

    // Banned User
    public function destroy($slug) {
        $user = User::where('slug', $slug)->first();
        $user->delete();
        return redirect('users')->with('status', 'User banned successfully');
    }

    // View and go to the deleted data page
    public function bannedList() {
        $bannedList = User::onlyTrashed()->get();
        return view('user-banned-list', ['bannedList' => $bannedList]);
    }
    
    // Restore data
    public function restore($slug) {
        $user = User::withTrashed()->where('slug', $slug)->first();
        $user->restore();
        return redirect('users')->with('status', 'User Restored Successfully');
    }
}
 