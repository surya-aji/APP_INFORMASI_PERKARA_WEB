<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class PenetapanController extends Controller
{
    public function index(){
        $url = request()->segment(2);

        // $penetapan = DB::table('perkara_penetapan')
        // ->join('perkara_hakim_pn','perkara_penetapan.perkara_id','=','perkara_hakim_pn.perkara_id')
        // ->join('perkara_panitera_pn','perkara_penetapan.perkara_id','=','perkara_panitera_pn.perkara_id')
        // ->join('perkara_jurusita','perkara_penetapan.perkara_id','=','perkara_jurusita.perkara_id')
        // ->select(
        //     'perkara_penetapan.penetapan_majelis_hakim as tanggal_penetapan',
        //     'perkara_penetapan.*',
        //     'perkara_hakim_pn.tanggal_penetapan as tanggal_penetapan_hakim',
        //     'perkara_hakim_pn.jabatan_hakim_nama as jabatan_hakim',
        //     'perkara_hakim_pn.hakim_nama as nama_hakim',
        //     'perkara_panitera_pn.tanggal_penetapan as tanggal_penetapan_panitera*',
        //     'perkara_panitera_pn.panitera_nama as nama_panitera*',
        //     'perkara_jurusita.tanggal_penetapan as tanggal_penetapan_jurusita',
        //     'perkara_jurusita.jurusita_nama as nama_jurusita'
        //     )
        // ->where('perkara_penetapan.perkara_id',$url)->first();

        $penetapan = DB::connection('mysql3')->table('perkara_penetapan')
        ->where('perkara_penetapan.perkara_id',$url)->first();

        // $hakim = DB::table('perkara_hakim_pn')
        //  ->join('perkara_penetapan','perkara_penetapan.majelis_hakim_id','=','perkara_hakim_pn.hakim_id')
        // ->select('perkara_hakim_pn.hakim_nama')
        // ->where('perkara_hakim_pn.perkara_id',$url)
        // ->get();

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
