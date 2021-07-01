<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Symfony\Component\HttpFoundation\Session\Session;

class SidangController extends Controller
{
    public function index(){
        $url = request()->segment(2);
        $jadwal = DB::table('perkara_jadwal_sidang')
        ->where('perkara_id',$url)
        ->orderBy('tanggal_sidang','ASC')
        ->get();

        $data = DB::table('perkara')
        ->where('perkara_id',$url)->first();

        
        $datasidang = DB::table('perkara_jadwal_sidang')
        ->latest('tanggal_sidang')
        ->where('perkara_id',$url)
        ->first();

        $jadwal_agenda = DB::table('perkara_jadwal_sidang')
        ->select('perkara_id', 'tanggal_sidang as start', 'agenda',DB::raw('CONCAT("Sidang dimulai pukul ",jam_sidang," WIB", " Sampai Jam ", sampai_jam," WIB "," di Ruangan Sidang ",ruangan) AS description'))
        ->where('perkara_id',$url)
        ->get();

        // $checking = SELECT * FROM "absen_harian" WHERE username = $username AND DATE_FORMAT(tanggal, '%Y-%m-%d') = CURDATE()
        $checking = DB::connection('mysql2')->table('antrian')
        ->select('*')
        ->where('no_perk',$url)
        ->get();


        return view('user.jadwalsidang.index',compact('data','jadwal','url','datasidang','jadwal_agenda','checking'));
    }

    public function store(Request $request){
        $url = request()->segment(2);
        $data = DB::connection('mysql')->table('perkara')
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

        $ruang = DB::table('perkara_jadwal_sidang')
        ->where('perkara_id',$url)
        ->first();

        $nomor =  DB::connection('mysql2')->table('antrian')
        ->where('ruang','=',$ruang->ruangan)
        ->max('nomor');


        DB::connection('mysql2')->table('antrian')->insert([
            ['nomor' => $nomor+1 , 'no_perk' => $url, 'penggugat' => $data->nama_pemohon, 'alamatP' => $data->alamat_pemohon, 'tergugat' => $data->nama_termohon, 'alamatT' => $data->alamat_termohon, 'ruang' => $ruang->ruangan, 'tim' => 1, 'status' => 0  ],
        ]);
        return redirect()->back()->with('message','Berhasil Ambil Antrian');
    }
}
