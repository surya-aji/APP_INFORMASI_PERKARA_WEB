<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class DokumenController extends Controller
{
    public function index(){
        $data = DB::connection('mysql3')->table('perkara_putusan')
        ->join('perkara','perkara_putusan.perkara_id','=','perkara.perkara_id')
        ->select(
            'perkara_putusan.*',
            'perkara.*',
           )
        ->get();
        return view('admin.kelola-berkas.index',compact('data'));
    }
    public function create(){
        return view('admin.kelola-berkas.upload');
    }
}
