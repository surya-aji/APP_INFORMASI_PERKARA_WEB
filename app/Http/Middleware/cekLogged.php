<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
// use Illuminate\Support\Facades\Auth;

class cekLogged
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {

        // if (!Auth::guard('user')->check()) {
        //     // return redirect('/user/{$id}');
        //     return $next($request);
        // }
        // return $next($request);


        $login = DB::table('pihak') 
        ->where('nomor_indentitas', $request->nik)
        ->where('telepon',$request->nomor_telepon)
        ->first();

        if(isset($login)){
            // return redirect('/')->with('gagal','Silahkan Login Terlebih dahulu');
            return redirect()->route('cekLogin', ['id' => $login->id]);
        }

        return redirect('/')->with('gagal','Silahkan Login Terlebih dahulu');
      
        // return $next($request);
    }
}
