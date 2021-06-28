<?php

namespace App\Http\Controllers\Authentication;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    // protected function guard() 
    // {
    //    return Auth::guard('user');
    // }

    // public function __construct()
    // {
    //     $this->middleware('cekLogged');
    // }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('auth.login');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        // if(Auth::attempt(['nomor_indentitas'=>$request['nik'], 
        // 'telepon'=>$request['nomor_telepon']]))
        //     {
        //         return redirect("/user/{$data->id}");
        //     }
    
        //     return redirect()->back();


        $data = DB::table('pihak') 
        ->where('nomor_indentitas', $request->nik)
        ->where('telepon',$request->nomor_telepon)
        ->first();
        
 
        if($data){
            return redirect("/user/{$data->id}");
        }else{
            return redirect('/')->with('gagal','Anda Belum Terdaftar di Sistem Kami');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    public function showFormLogin(){
       
    }
    public function login(Request $request){
        
        
    }

    public function getDataUser(Request $request){
        $nohp = $request->perkara_id;
        $nik = $request->nomor_perkara;

        $user = DB::table('perkara')
        ->select('perkara.*')
        ->where('perkara_id',$username)
        ->where('nomor_perkara',$id)
        ->get();
        return view()->compact($user);  
        
    }
}
