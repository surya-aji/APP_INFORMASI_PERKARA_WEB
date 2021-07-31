<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class LoginController extends Controller
{
    public function login(Request $request){
        $data = DB::connection('mysql3')->table('perkara')
        ->where(DB::raw("BINARY `nomor_perkara`"), $request->nomor_perkara)
       //  ->where('password', $request->password)
        ->get();
     
       if (count($data) > 0) {
        foreach ($data as $logg) {
         $result["success"] = "1";
         $result["message"] = "success";
         //untuk memanggil data sesi Login
           // =========================
           $result["perkara_id"] = $logg->perkara_id;
           $result["tanggal_pendaftaran"] = $logg->tanggal_pendaftaran;
           $result["jenis_perkara_nama"] = $logg->jenis_perkara_nama;
           $result["nomor_perkara"] = $logg->nomor_perkara;
           $result["nomor_register"] = $logg->nomor_urut_register;
           $result["pihak_satu"] = $logg->pihak1_text;
           $result["pihak_satu"] = $logg->pihak2_text;
       //   $result["id"] = $logg->id;
       //   $result["nama"] = $logg->nama;
       //   $result["nim"] = $logg->nim;
       //   $result["email"] = $logg->email;
        }
        return response()->json($result);
       } else {
        return response()->json(['error'=>'anda belum terdaftar'],401);
       }
    }
}
