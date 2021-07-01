<?php

namespace App\Http\Controllers\User;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index(){
        $pagename = 'DASHBOARD';
        // Dapatkan Url Terakhir
        $url = request()->segment(count(request()->segments()));
        $jam = Carbon::now()->format('H:i:m');
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


        $datasidang = DB::table('perkara_jadwal_sidang')
        ->latest('tanggal_sidang')
        ->where('perkara_id',$url)
        ->first();
      
            $jadwal_agenda = DB::table('perkara_jadwal_sidang')
            ->select('perkara_id', 'tanggal_sidang as start', 'agenda',DB::raw('CONCAT("Dimulai Pukul ",jam_sidang," WIB", " Sampai Jam ", sampai_jam," WIB "," di Ruangan Sidang ",ruangan) AS description'))
            ->where('perkara_id',$url)
            ->get();


        return view('user.layout.dashboard',compact('data','jam','datasidang','jadwal_agenda'));
    }
    
}
