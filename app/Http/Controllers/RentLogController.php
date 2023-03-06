<?php

namespace App\Http\Controllers;

use App\Models\RentLogs;
use Illuminate\Http\Request;

class RentLogController extends Controller
{
    //
    public function index() {
        $rentlog = RentLogs::with(['user', 'book'])->get();
        return view('rentlog', ['rentlog' => $rentlog]);
    }
}
