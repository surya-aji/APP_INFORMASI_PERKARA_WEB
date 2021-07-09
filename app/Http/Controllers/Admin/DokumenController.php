<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class DokumenController extends Controller
{
    public function index(){
        $total_perkara = DB::connection('mysql3')->table('perkara')->count();
        

        $data = DB::connection('mysql3')->table('perkara_putusan')
        ->join('perkara','perkara_putusan.perkara_id','=','perkara.perkara_id')
        ->select(
            'perkara_putusan.*',
            'perkara.*',
           )
        ->get();

        $masih_proses = DB::connection('mysql3')->table('perkara')
        ->select('perkara_id')
        ->whereNotExists(function($query){
            $query->select(DB::raw(1))
            ->from('perkara_putusan')
            ->whereRaw('perkara_putusan.perkara_id = perkara.perkara_id');
        })->count();
        return view('admin.kelola-berkas.index',compact('data','total_perkara','masih_proses'));
    }
    public function create(){
        $total_perkara = DB::connection('mysql3')->table('perkara')->count();
        $masih_proses = DB::connection('mysql3')->table('perkara')
        ->select('perkara_id')
        ->whereNotExists(function($query){
            $query->select(DB::raw(1))
            ->from('perkara_putusan')
            ->whereRaw('perkara_putusan.perkara_id = perkara.perkara_id');
        })->count();
        $total_perkara = DB::connection('mysql3')->table('perkara')->count();
        return view('admin.kelola-berkas.upload',compact('total_perkara','masih_proses'));
    }
}
