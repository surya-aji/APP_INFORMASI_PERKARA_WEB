<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

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
        return view('admin.layout.dashboard',compact('total_perkara','masih_proses','data_tahun','date'));

    }
}
