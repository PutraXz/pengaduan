<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\Models\User;
use Auth;
use Illuminate\Support\Facades\Session;
class HomeController extends Controller
{
    use AuthenticatesUsers;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function adminHome(Request $request)
    {
        // $data = $request->session()->all();
        // dd($data);
        // $email = auth()->user()->name;
        // dd($email);
        
        return view('admin.home');
        
        
        
    }
    public function masyarakatHome(){
        return view('masyarakat.home');
    }
    public function pimpinanHome(){
        return view('pimpinan.home');
    }
    public function logout(Request $request)
    {
        $this->guard()->logout();
 
        $request->session()->flush();
 
        $request->session()->regenerate();
 
        return redirect('home');
    }
}
