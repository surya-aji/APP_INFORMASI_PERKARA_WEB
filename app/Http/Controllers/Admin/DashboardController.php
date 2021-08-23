<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index(){
        $date = DATE('Y');
        $total_perkara = DB::connection('mysql3')->table('perkara')->count();
        $data_tahun = DB::connection('mysql3')->table('perkara')
        ->select(
            DB::raw("(COUNT(*)) as y"),
            DB::raw("(DATE_FORMAT(tanggal_pendaftaran, '%m')) as x")
            )
            ->whereYear('tanggal_pendaftaran',$date)   
            ->orderBy('tanggal_pendaftaran')
            ->groupBy(DB::raw("DATE_FORMAT(tanggal_pendaftaran, '%m')"))
            ->get();

        $masih_proses = DB::connection('mysql3')->table('perkara')
        ->select('perkara_id')
        ->whereNotExists(function($query){
            $query->select(DB::raw(1))
            ->from('perkara_putusan')
            ->whereRaw('perkara_putusan.perkara_id = perkara.perkara_id');
        })->count();

        $terupload = DB::connection('mysql')->table('berkas')
        ->where('status',1)
        ->count();

        $belum_terupload = DB::table('sipp.perkara_putusan as md1')
        ->select('md1.perkara_id')
        ->whereNotExists(function($query){
            $query->select(DB::raw(1))
            ->from('dokumen_sipp.berkas as md2')
            ->whereRaw('md1.perkara_id = md2.perkara_id');
        })->count();

        $event =  DB::connection('mysql')->table('berkas')
        ->select(
            DB::raw("(COUNT(*)) as title"),
            DB::raw("(DATE_FORMAT(created_at, '%Y-%m-%d')) as start")
            ) 
            ->where('petugas',Auth::user()->username)
            ->orderBy('created_at')
            ->groupBy(DB::raw("(DATE_FORMAT(created_at, '%Y-%m-%d'))"))
            ->get();

        return view('admin.layout.dashboard',compact('total_perkara','masih_proses','data_tahun','date','terupload','belum_terupload','event'));

    }
}
