<?php

namespace App\Http\Controllers\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Laravel\Ui\Presets\React;

class LoginController extends Controller
{ 
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    protected $redirecTo =RouteServiceProvider::HOME;

    public function __construct(Request $request)
    {
         
        $this->middleware('guest')->except('logout');
    }
    // public function logout(Request $request)
    // {
    //     $this->guard()->logout();
 
    //     $request->session()->flush();
 
    //     $request->session()->regenerate();
 
    //     return redirect('home');
            
    // }
    public function login(Request $request){
        $input = $request->all();
        $this->validate($request,[
            'email'=>'required|email',
            'password'=>'required'
        ]);
        if(auth()->attempt(['email'=>$input['email'], 'password'=>$input['password']])){
            if(auth()->user()->level == 'admin'){
                return redirect('/admin');
            }elseif(auth()->user()->level == 'pimpinan'){
                return redirect('/pimpinan');
            }else{
                return redirect('/home');
            }
        }else{
            return redirect()->route("login")->with("error", 'incorrect email or password');
        }
    }
}
