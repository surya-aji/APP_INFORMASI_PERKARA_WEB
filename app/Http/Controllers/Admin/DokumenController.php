<?php

namespace App\Http\Controllers\Admin;

use App\Berkas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class DokumenController extends Controller
{
    public function index(){
        $total_perkara = DB::connection('mysql3')->table('perkara')->count();
        

        $data = DB::table('sipp311.perkara_putusan as md1')
        ->join('sipp311.perkara as md2','md1.perkara_id','=','md2.perkara_id')
        ->leftJoin('dokumen_sipp.berkas as md3', 'md1.perkara_id', '=', 'md3.perkara_id')
        ->select(
            'md1.*',
            'md1.perkara_id as per_id',
            'md2.nomor_perkara as noper',
            'md2.*',
            'md3.*',
           )
        ->orderBy('md1.tanggal_putusan', 'desc')
        ->limit(8000)
        ->get();

        $event =  DB::connection('mysql')->table('berkas')
        ->select(
            DB::raw("(COUNT(*)) as title"),
            DB::raw("(DATE_FORMAT(created_at, '%Y-%m-%d')) as start")
            ) 
            ->where('petugas',Auth::user()->username)
            ->orderBy('created_at')
            ->groupBy(DB::raw("(DATE_FORMAT(created_at, '%Y-%m-%d'))"))
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

        
        $belum_terupload = DB::table('sipp311.perkara_putusan as md1')
        ->select('md1.perkara_id')
        ->whereNotExists(function($query){
            $query->select(DB::raw(1))
            ->from('dokumen_sipp.berkas as md2')
            ->whereRaw('md1.perkara_id = md2.perkara_id');
        })->count();
        // dd($data);
        return view('admin.kelola-berkas.index',compact('data','total_perkara','masih_proses','belum_terupload','terupload','event'));
    }
    public function create(){
        $id =  $url = request()->segment(count(request()->segments(2)));
        $total_perkara = DB::connection('mysql3')->table('perkara')->count();
        $masih_proses = DB::connection('mysql3')->table('perkara')
        ->select('perkara_id')
        ->whereNotExists(function($query){
            $query->select(DB::raw(1))
            ->from('perkara_putusan')
            ->whereRaw('perkara_putusan.perkara_id = perkara.perkara_id');
        })->count();
        $total_perkara = DB::connection('mysql3')->table('perkara')->count();

        $terupload = DB::connection('mysql')->table('berkas')
        ->where('status',1)
        ->count();

        
        $belum_terupload = DB::table('sipp311.perkara_putusan as md1')
        ->select('md1.perkara_id')
        ->whereNotExists(function($query){
            $query->select(DB::raw(1))
            ->from('dokumen_sipp.berkas as md2')
            ->whereRaw('md1.perkara_id = md2.perkara_id');
        })->count();

        $nom = DB::table('sipp311.perkara_putusan as md1')
        ->join('sipp311.perkara as md2','md1.perkara_id','=','md2.perkara_id')
        ->leftJoin('dokumen_sipp.berkas as md3', 'md1.perkara_id', '=', 'md3.perkara_id')
        ->select(
            'md1.*',
            'md1.perkara_id as per_id',
            'md2.nomor_perkara as noper',
            'md2.*',
            'md3.*',
           )
           ->where('md1.perkara_id',$id)
        ->first();

        $event =  DB::connection('mysql')->table('berkas')
        ->select(
            DB::raw("(COUNT(*)) as title"),
            DB::raw("(DATE_FORMAT(created_at, '%Y-%m-%d')) as start")
            ) 
            ->where('petugas',Auth::user()->username)
            ->orderBy('created_at')
            ->groupBy(DB::raw("(DATE_FORMAT(created_at, '%Y-%m-%d'))"))
            ->get();


        return view('admin.kelola-berkas.upload',compact('total_perkara','masih_proses','id','belum_terupload','terupload','nom','event'));
    }

    public function unggah(Request $request){
        $id = request()->segment(2);
        
        $data = DB::connection('mysql3')->table('perkara_putusan')
        ->join('perkara','perkara_putusan.perkara_id','=','perkara.perkara_id')
        ->select(
            'perkara_putusan.*',
            'perkara.*',
           )
        ->where('perkara_putusan.perkara_id',$id)
        ->first();

       
        $berkas = new Berkas;
        $berkas->perkara_id = request()->segment(2);
        $berkas->nomor_perkara = $data->nomor_perkara;
        $berkas->petugas = Auth::user()->username;
        $berkas->status = 1;
        if ($request->hasFile('file')) {
            $nm = $request->file;
            $namaFile = $id . "." . $nm->getClientOriginalExtension();
            $berkas->dok = $namaFile;
            $nm->move(public_path() . '/storage', $namaFile);
        }else{
            $berkas->dok = 'null';
        }

        $berkas->save();
        return redirect('kelola-berkas');

       


    }

    public function destroy($id){
       
        $item = Berkas::firstWhere('perkara_id',$id);
        // dd($item);

        $file = public_path('/storage/').$item->dok;
        //cek jika ada file
        if (file_exists($file)){
            //maka delete file diforder public/storage
            @unlink($file);
        }
        //delete data didatabase
        $item->delete();
        return back();
    }
}
