<?php

namespace App\Http\Controllers\Authentication;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;


class LoginController extends Controller
{
    public function showFormLogin(){
        return view('auth.login');
    }
    public function login(Request $request){
        $data = DB::table('perkara') 
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
}
