<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Session;

class MasterAdminDokter
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
        if(Session::get('role') == 'master' || Session::get('role') == 'admin' || Session::get('role') == 'dokter'){
            return $next($request);
        }
        else{
            abort(403);
        }
    }
}
