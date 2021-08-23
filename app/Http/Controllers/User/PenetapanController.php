<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class PenetapanController extends Controller
{
    public function index(){
        $url = request()->segment(2);
        $penetapan = DB::connection('mysql3')->table('perkara_penetapan')
        ->where('perkara_penetapan.perkara_id',$url)->first();

        $data = DB::connection('mysql3')->table('perkara') 
        ->where('perkara_id',$url)
        ->first();

        
        $datasidang = DB::connection('mysql3')->table('perkara_jadwal_sidang')
        ->latest('tanggal_sidang')
        ->where('perkara_id',$url)
        ->first();

        $tahap =  DB::connection('mysql3')->table('perkara_proses')
        ->select('*')
        ->where('perkara_id',$url)
        ->get();


        $jadwal_agenda = DB::connection('mysql3')->table('perkara_jadwal_sidang')
        ->select('perkara_id', 'tanggal_sidang as start', 'agenda',DB::raw('CONCAT("Dimulai Pukul ",jam_sidang," WIB", " Sampai Jam ", sampai_jam," WIB "," di Ruangan Sidang ",ruangan) AS description'), DB::raw('CONCAT("sidang") AS title'))
        ->where('perkara_id',$url)
        ->get();
        return view('user.penetapan.index',compact('penetapan','data','url','datasidang','jadwal_agenda','tahap'));
    }
}
