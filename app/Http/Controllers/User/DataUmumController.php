<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class DataUmumController extends Controller
{
    public function index(){
        $url = request()->segment(2);
        $data = DB::table('perkara')
        ->join('perkara_pihak1','perkara.perkara_id','=','perkara_pihak1.perkara_id')
        ->join('perkara_pihak2','perkara.perkara_id','=','perkara_pihak2.perkara_id')
        ->join('perkara_data_pernikahan','perkara.perkara_id',
        
        '=','perkara_data_pernikahan.perkara_id')
        ->select(
            'perkara.*',
            'perkara_pihak1.nama AS nama_pemohon',
            'perkara_pihak1.alamat AS alamat_pemohon',
            'perkara_pihak2.nama AS nama_termohon',
            'perkara_pihak2.alamat AS alamat_termohon',
            'perkara_data_pernikahan.*')
        ->where('perkara.perkara_id',$url)->first();
        
        $kuasa = DB::table('perkara_pengacara')
        ->select('perkara_pengacara.nama as kuasa_pemohon')
        ->where('pihak_ke',1)
        ->where('perkara_id',$url)
        ->get();
        
        $kuasa2 = DB::table('perkara_pengacara')
        ->select('perkara_pengacara.nama as kuasa_termohon')
        ->where('pihak_ke',2)
        ->where('perkara_id',$url)
        ->get();

        
        $datasidang = DB::table('perkara_jadwal_sidang')
        ->latest('tanggal_sidang')
        ->where('perkara_id',$url)
        ->first();

        $jadwal_agenda = DB::table('perkara_jadwal_sidang')
        ->select('perkara_id', 'tanggal_sidang as start', 'agenda as title',DB::raw('CONCAT("Dimulai Pukul ",jam_sidang," WIB", " Sampai Jam ", sampai_jam," WIB "," di Ruangan Sidang ",ruangan) AS description'))
        ->where('perkara_id',$url)
        ->get();
        
        

        return view('user.dataumum.index',compact('data','url','kuasa','kuasa2','datasidang','jadwal_agenda'));
    }
}
