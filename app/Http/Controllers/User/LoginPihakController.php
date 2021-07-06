<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class LoginPihakController extends Controller
{

    public function index()
    {
        return view('auth.pihak.login');
    }
    public function store(Request $request)
    {

        $data = DB::connection('mysql3')->table('pihak') 
        ->where('nomor_indentitas', $request->nik)
        ->where('telepon',$request->nomor_telepon)
        ->first();
        
 
        if($data){
            return redirect("/user/{$data->id}");
        }else{
            return redirect('/')->with('gagal','Anda Belum Terdaftar di Sistem Kami');
        }
    }
    public function getDataUser(Request $request){
        $nohp = $request->perkara_id;
        $nik = $request->nomor_perkara;

        $user = DB::connectton('mysql3')->table('perkara')
        ->select('perkara.*')
        ->where('perkara_id',$username)
        ->where('nomor_perkara',$id)
        ->get();
        return view()->compact($user);  
        
    }
}
