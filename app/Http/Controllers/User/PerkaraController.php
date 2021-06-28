<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class PerkaraController extends Controller
{
    public function index(){
        $url = request()->segment(2);
        $data = DB::table('perkara')
        ->where('perkara_id',$url)->first();
        return view('admin.perkara.index',compact('data','url'));
    }
}
