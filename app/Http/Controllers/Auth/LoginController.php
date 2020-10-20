<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\DB;
use Illuminate\Routing\Redirector;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\User;
use Exception;

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
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function index(){ 
        return view('login');
    }

    public function logout(){
        Session::flush();
        return redirect('login')->with('success','Logout Berhasil');
    }

    public function storeLogin(Request $request){
        $username = $request->get('username');
        $pass = md5($request->get('password'));

        $user = DB::table('users')
        ->where('username',$username)
        ->first();

        if($user != null && $user->username == $username){
            if($pass == $user->password){
                Session::put('username',$user->username);
                Session::put('role',$user->role);
                Session::put('id',$user->id);
                Session::put('login',TRUE);
                if($user->role == "master"){
                    return redirect()->route('masterindex')->with('success','Login Berhasil');
                }
                else if($user->role == "admin"){
                    return "admin";
                }
                else if($user->role == "dokter"){
                    return "dokter";
                }
                else{
                    return error(404);
                }
            }
            else{
                return redirect()->route('index')->with('error','Username atau Password Salah, Harap Hubungi Super Admin');
            }
        }
        else{
            return redirect()->route('index')->with('error','Login Gagal Harap Hubungi Super Admin');
        }
    }
}
