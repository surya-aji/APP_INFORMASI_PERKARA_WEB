<?php

namespace App\Http\Controllers\Admin;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class ManajemenUserController extends Controller
{
    public function index(){
        $user = User::all();
        $total_perkara = DB::connection('mysql3')->table('perkara')->count();
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

        return view('admin.manajemen-user.index',compact('user','masih_proses','total_perkara','belum_terupload','terupload'));
    }
    public function showRegister(){
        $total_perkara = DB::connection('mysql3')->table('perkara')->count();
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
        return view('admin.manajemen-user.register',compact('masih_proses','total_perkara','belum_terupload','terupload'));
    }
    public function create(Request $request){

        $user = new User;
        $user->username = $request->username;
        $user->email = $request->email;
        $user->password = Hash::make($request->get('password'));
        $user->role = 'petugas';
        $user->save();
        return redirect('/manajemen-user');
    }

    public function edit($id){
        $total_perkara = DB::connection('mysql3')->table('perkara')->count();
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
        $user = User::findorfail($id);
        return view('admin.manajemen-user.edit',compact('user','total_perkara','masih_proses','belum_terupload','terupload'));
    }
    public function update(Request $request, $id){
        $update = User::findorfail($id);

        $update->username = $request->username;
        $update->email = $request->email;
        $update->role  = 'petugas';
        $update->password = Hash::make($request->get('password'));

        $update->update();
        return redirect('/manajemen-user');
    }

    public function destroy($id){
        $delete = User::findOrFail($id);
        $delete->delete();
        return back();
    }
}
