<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\DB;

class VerifyIfLogged
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
       
        $requestNomor = $request->nomor_perkara;
        $requestId = $request->perkara_id;

        $data = DB::table('perkara') 
        ->where('perkara_id', $request->perkara_id)
        ->where('nomor_perkara',$request->nomor_perkara)
        ->get();

        if(count($data) > 0){
            foreach($data as $datas){
            }
            return response()->redirectTo('/user');
            // return response()->view('admin.layout.dashboard');
        }
            return response()->redirectTo('/login');
        return $next($request);
    }
}
