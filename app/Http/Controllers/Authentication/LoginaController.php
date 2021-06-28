<?php

namespace App\Http\Controllers\Authentication;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;


class LoginController extends Controller
{
    public function showFormLogin(){
        return view('auth.login');
    }
    public function login(Request $request){
        $data = DB::table('pihak') 
        ->where('perkara_id', $request->perkara_id)
        ->where('nomor_perkara',$request->nomor_perkara)
        ->get();
        

        if(count($data)>0){
            foreach($data as $datas){
            }
            return view('admin.layout.dashboard');
        }else{
            return redirect('/login')->with('gagal','Anda Belum Terdaftar di Sistem Kami');
        }
        
    }

    public function getDataUser(Request $request){
        $username = $request->perkara_id;
        $id = $request->nomor_perkara;

        $user = DB::table('perkara')
        ->select('perkara.*')
        ->where('perkara_id',$username)
        ->where('nomor_perkara',$id)
        ->get();
        return view()->compact($user);  
        
    }
}
