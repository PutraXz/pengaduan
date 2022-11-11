<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Pengaduan;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Whoops\Run;

class AdminController extends Controller
{
    public function createUser(){
        return view('admin.add_user');
    }
    public function addUser(Request $request){
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->level = $request->level;
        $user->save();
        return redirect('/admin/user');
    }
    public function showUser(){
        $users = User::all()->except(Auth::id());
        return view('admin.user', compact('users'));
    }
    public function editUser($id){
        $user = User::whereId($id)->first();
        return view('admin.edit_user')->with('user', $user);
    }
    public function updateUser(Request $request, $id){
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
    public function pengaduan(){
        $users = User::with(['pengaduan'])->whereNotIn('level', ['admin', 'pimpinan'])->get();
        
        return view('admin.pengaduan', compact('users'));
    }
    public function status(Request $request, $kode){
        switch ($request->input('action')){
            case 'konfirmasi':
                $pengaduan = Pengaduan::find($kode);
                $pengaduan->status = 'Di Konfirmasi';
                $pengaduan->save();
                return redirect('admin/pengaduan');
                break;
            case 'ditolak':
                $pengaduan = Pengaduan::find($kode);
                $pengaduan->status = 'Di Tolak';
                $pengaduan->save();
                return redirect('admin/pengaduan');
                break;
        }
    }
}
