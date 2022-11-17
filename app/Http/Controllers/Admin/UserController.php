<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Bukti;
use App\Models\Pengaduan;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Whoops\Run;
use Carbon\Carbon;
use Illuminate\Support\Facades\File; 
use Illuminate\Support\Facades\Validator;
class UserController extends Controller
{
    public function index(){
        $users = User::all()->except(Auth::id());
        return view('admin.user', compact('users'));
    }
    public function create(){
        return view('admin.add_user');
    }
    public function add(Request $request){
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->level = $request->level;
        $user->save();
        return redirect('/admin/user');
    }
    public function edit($id){
        $user = User::whereId($id)->first();
        return view('admin.edit_user')->with('user', $user);
    }
    public function update(Request $request, $id){
        $user = User::find($id); 
        $user->name = $request->name;
        $user->email = $request->email;
        $user->save();
        return redirect('/admin/user');
    }
    public function destroy($id){
        $user = User::find($id);
        $user->delete();
        return redirect('/admin/user');
    }
}
