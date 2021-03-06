<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Session;
use Exception;

class CekLogin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $pass = md5($request->get('password'));
        $user = \App\User::where([['username', $request->username],['password',$pass]])->first();
        try{
            Session::put('username',$user->username);
            Session::put('role',$user->role);
            if ($user->role == 'master') {
                return redirect()->route('masterindex')->with('success','Login Berhasil');
            }
            else if ($user->role == 'dokter') {
                return redirect()->route('dokterindex')->with('success','Login Berhasil');
            }
            else if ($user->role == 'admin') {
                return redirect()->route('adminindex')->with('success','Login Berhasil');
            }
        }catch(\Exception $e){
            return redirect()->route('login')->with('error','Login Gagal');
        }

        return $next($request);
    }
}
