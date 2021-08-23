<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class PutusanController extends Controller
{
    public function index(){
        
        $url = request()->segment(2);
        $data = DB::connection('mysql3')->table('perkara')
        ->where('perkara_id',$url)->first();

        $putusan = DB::connection('mysql3')->table('perkara_putusan')
        ->where('perkara_id',$url)->first();
        
        $datasidang = DB::connection('mysql3')->table('perkara_jadwal_sidang')
        ->latest('tanggal_sidang')
        ->where('perkara_id',$url)
        ->first();

        $jadwal_agenda = DB::connection('mysql3')->table('perkara_jadwal_sidang')
        ->select('perkara_id', 'tanggal_sidang as start', 'agenda',DB::raw('CONCAT("Dimulai Pukul ",jam_sidang," WIB", " Sampai Jam ", sampai_jam," WIB "," di Ruangan Sidang ",ruangan) AS description'), DB::raw('CONCAT("sidang") AS title'))
        ->where('perkara_id',$url)
        ->get();

        $tahap =  DB::connection('mysql3')->table('perkara_proses')
        ->select('*')
        ->where('perkara_id',$url)
        ->get();

        $data_berkas = DB::table('sipp.perkara_putusan as md1')
        ->join('sipp.perkara as md2','md1.perkara_id','=','md2.perkara_id')
        ->leftJoin('dokumen_sipp.berkas as md3', 'md1.perkara_id', '=', 'md3.perkara_id')
        ->select(
            'md1.*',
            'md1.perkara_id as per_id',
            'md2.nomor_perkara as noper',
            'md2.*',
            'md3.*',
           )
           ->where('md1.perkara_id',$url)
        ->first();
        
        return view('user.putusan.index',compact('data','url','putusan','datasidang','jadwal_agenda','tahap','data_berkas'));
    }
    public function downloadFile(){

        $url = request()->segment(2);
        $myFile = $url . '.pdf';
        return response()->download(storage_path("app/public/{$myFile}"));
    }
  
   
}
