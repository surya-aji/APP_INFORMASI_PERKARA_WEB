<?php

namespace App\Http\Controllers\Api;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class LoginController extends Controller
{
    public function login(Request $request){ // Untuk Login
        $data = DB::connection('mysql3')->table('perkara')
        ->where(DB::raw("BINARY `nomor_perkara`"), $request->nomor_perkara)
        ->get();
     
       if (count($data) > 0) {
        foreach ($data as $logg) {
         $result["success"] = "1";
         $result["message"] = "success";
           $result["perkara_id"] = $logg->perkara_id;
           $result["tanggal_pendaftaran"] = $logg->tanggal_pendaftaran;
           $result["jenis_perkara_nama"] = $logg->jenis_perkara_nama;
           $result["nomor_perkara"] = $logg->nomor_perkara;
           $result["nomor_register"] = $logg->nomor_urut_register;
           $result["pihak_satu"] = $logg->pihak1_text;
           $result["pihak_satu"] = $logg->pihak2_text;
        }
        return response()->json($result);
       } else {
        return response()->json(['error'=>'anda belum terdaftar'],401);
       }
    }
    public function dataUmumGetId($id){ // Get Data Umum
        $data = DB::connection('mysql3')->table('perkara')
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
        ->where('perkara.perkara_id',$id)->first();

        $kuasa = DB::connection('mysql3')->table('perkara_pengacara')
        ->select('perkara_pengacara.nama as kuasa_pemohon')
        ->where('pihak_ke',1)
        ->where('perkara_id',$id)
        ->get();

        $kuasa2 = DB::connection('mysql3')->table('perkara_pengacara')
        ->select('perkara_pengacara.nama as kuasa_termohon')
        ->where('pihak_ke',2)
        ->where('perkara_id',$id)
        ->get();
        
        $perkara = [];

        return response()->json(
            [
                "message" => "Success",
                "data" => $data,
                "kuasa_pemohon" => $kuasa,
                "kuasa_termohon" => $kuasa2,
            ]
            );
    }
    public function penetepanGetId($id){ // Get Data Penetapan
        $data = DB::connection('mysql3')->table('perkara_penetapan')
        ->where('perkara_penetapan.perkara_id',$id)
        ->select("perkara_penetapan.*")
        ->first();
        

        return response()->json(
            [
                "message" => "Success",
                "data" => $data,
            ]
            );
    }

    public function putusanGetId($id){ // Get Data Putusan

        $putusan = DB::connection('mysql3')->table('perkara_putusan')
        ->where('perkara_id',$id)->first();
        
        $datasidang = DB::connection('mysql3')->table('perkara_jadwal_sidang')
        ->latest('tanggal_sidang')
        ->where('perkara_id',$id)
        ->first();
     
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
           ->where('md1.perkara_id',$id)
        ->first();

        return response()->json(
            [
                "message" => "Success",
                "putusan" => $putusan,
                "data_berkas" => $data_berkas

            ]
            );
    }
    public function jadwalGetId($id){ // Get Data Jadwal
        $jadwal = DB::connection('mysql3')->table('perkara_jadwal_sidang')
        ->where('perkara_id',$id)
        ->orderBy('tanggal_sidang','ASC')
        ->get();

        $data = DB::connection('mysql3')->table('perkara')
        ->where('perkara_id',$id)->first();

        $datasidang = DB::connection('mysql3')->table('perkara_jadwal_sidang')
        ->latest('tanggal_sidang')
        ->where('perkara_id',$id)
        ->first();

        $antrian = DB::connection('mysql2')->table('antrian')
        ->select('*')
        ->where('no_perk',$id)
        ->first();

        $checking = DB::connection('mysql2')->table('antrian')
        ->select('*')
        ->where('no_perk',$id)
        ->get();

        if(count($checking)>0){
            $status = true;
        }else{
            $status = false;
        }
        
        $datetime = date("H");

        return response()->json(
            [
                "message" => "Success",
                "data" => $data,
                "jadwal" => $jadwal,
                "data_sidang" => $datasidang,
                "antrian" => $antrian,
                "server" => $datetime,
                "status_antrian" => $status
                // "tahap" => $tahap

            ]
            );
        


    }
    public function biayaGetId($id){ // Get Data Biaya
        $data = DB::connection('mysql3')->table('perkara')
        ->where('perkara_id',$id)->first();

        $biaya = DB::connection('mysql3')->table('perkara_biaya')
        ->where('perkara_id',$id)->get();

        $t_pemasukan = DB::connection('mysql3')->table('perkara_biaya')
        ->where('jenis_transaksi', 1)
        ->where('perkara_id',$id)
        ->sum('perkara_biaya.jumlah');

        $t_pengeluaran = DB::connection('mysql3')->table('perkara_biaya')
        ->where('jenis_transaksi', -1)
        ->where('perkara_id',$id)
        ->sum('perkara_biaya.jumlah');

    
        return response()->json(
            [
                "message" => "Success",
                // "data" => $data,
                "biaya" => $biaya,
                "pemasukan" => $t_pemasukan,
                "pengeluaran" => $t_pengeluaran,
                "sisa" => $t_pemasukan-$t_pengeluaran
                // "tahap" => $tahap

            ]
            );
     
    }

    public function AmbilAntrian(Request $request){ // Ambil Antrian
        // $url = request()->segment(2);
        $data = DB::connection('mysql3')->table('perkara')
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
        ->where('perkara.perkara_id',$request->id)->first();

        $ruang = DB::connection('mysql3')->table('perkara_jadwal_sidang')
        ->where('perkara_id',$request->id)
        ->first();

        $nomor =  DB::connection('mysql2')->table('antrian')
        ->where('ruang','=',$ruang->ruangan)
        ->max('nomor');
            

        $antri = DB::connection('mysql2')->table('antrian')->insert([
            ['nomor' => $nomor+1 , 'no_perk' => $data->perkara_id, 'penggugat' => $data->nama_pemohon, 'alamatP' => $data->alamat_pemohon, 'tergugat' => $data->nama_termohon, 'alamatT' => $data->alamat_termohon, 'ruang' => $ruang->ruangan, 'tim' => 1, 'status' => 0  ],
        ]);

        $data_antri = DB::connection('mysql2')->table('antrian')
        ->where('no_perk',$request->id)
        ->first();

        return response()->json(
            [
                "message" => "Berhasil Ambil Antrian",
                "nomor" => $data_antri->nomor,
                "alamat_pemohon" => $data_antri->alamatP,
                "alamat_termohon" => $data_antri->alamatT,
                "ruang" => $data_antri->ruang

            ]
            );

        
    }

    public function downloadFile(Request $request){ // Download File
       
        $myFile = $request->id . '.pdf';

        $dok = DB::connection('mysql')
        ->table('berkas')
        ->where('perkara_id',$request->id)
        ->first();   
        
        $pdf = public_path('/storage/'. $myFile); //storage_path('app/public/' . $myFile);

          //cek jika ada gambar
          if (file_exists($pdf)){
            //maka delete file diforder public/img
            $pdf_file = file_get_contents($pdf);
            return response()->json(
                [
                    "status" => true,
                    "ID" => $request->id,
                    "PDFEncode" => base64_encode($pdf_file)
                ]
                );
           // return response()->download($pdf);
        }else{
            return response()->json(
                [
                    "status" => false,
                    "message" => "Belum Ada Berkas",
                ]
                );
        }
        
        
     
    }
}
