<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class BiayaCOntroller extends Controller
{
    public function index(){
        $url = request()->segment(2);
        $data = DB::connection('mysql3')->table('perkara')
        ->where('perkara_id',$url)->first();

        $biaya = DB::connection('mysql3')->table('perkara_biaya')
        ->where('perkara_id',$url)->get();

        $t_pemasukan = DB::connection('mysql3')->table('perkara_biaya')
        ->where('jenis_transaksi', 1)
        ->where('perkara_id',$url)
        ->sum('perkara_biaya.jumlah');

        $t_pengeluaran = DB::connection('mysql3')->table('perkara_biaya')
        ->where('jenis_transaksi', -1)
        ->where('perkara_id',$url)
        ->sum('perkara_biaya.jumlah');

        
        $datasidang = DB::connection('mysql3')->table('perkara_jadwal_sidang')
        ->latest('tanggal_sidang')
        ->where('perkara_id',$url)
        ->first();

        $jadwal_agenda = DB::connection('mysql3')->table('perkara_jadwal_sidang')
        ->select('perkara_id', 'tanggal_sidang as start', 'agenda',DB::raw('CONCAT("Dimulai Pukul ",jam_sidang," WIB", " Sampai Jam ", sampai_jam," WIB "," di Ruangan Sidang ",ruangan) AS description'))
        ->where('perkara_id',$url)
        ->get();
        
        return view('user.biaya.index',compact('data','url','biaya','t_pemasukan','t_pengeluaran','datasidang','jadwal_agenda'));
    }
}
