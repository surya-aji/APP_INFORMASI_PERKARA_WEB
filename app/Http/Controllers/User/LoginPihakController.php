<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Client\Response;
use Illuminate\Support\Facades\Session;

class LoginPihakController extends Controller
{

    public function index()
    {
        return view('auth.pihak.login');
    }
    public function store(Request $request)
    {

        $data = DB::connection('mysql3')->table('pihak')
        ->leftJoin('perkara_pihak1','pihak.id','=','perkara_pihak1.pihak_id' )
        ->leftJoin('perkara_pihak2','pihak.id','=','perkara_pihak2.pihak_id' ) 
        ->select('perkara_pihak1.perkara_id as get')
        ->where('pihak.nomor_indentitas', $request->nik)
        ->where('pihak.telepon',$request->nomor_telepon)
        ->first();
        
 
        if($data){
            response()->json(['success' => 'success'], 200);
          
            return redirect("/user/{$data->get}")->with(['login' => 'selamat anda berhasil login']);
            // dd($data);
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

    public function logout(Request $request){
        $request->session()->flush();
        return redirect('/');
    }
}
