<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index(){
        $total_perkara = DB::connection('mysql3')->table('perkara')->count();
        return view('admin.layout.dashboard',compact('total_perkara'));

    }
}
