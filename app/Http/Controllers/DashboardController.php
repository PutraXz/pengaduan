<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function adminUser(){
        $users = User::all()->except(Auth::id());
        return view('admin.user', compact('users'));
    }
}
