<?php

namespace App\Http\Controllers\Admin;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class ManajemenUserController extends Controller
{
    public function index(){
        $user = User::all();
        return view('admin.manajemen-user.index',compact('user'));
    }
    public function showRegister(){
        return view('admin.manajemen-user.register');
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
        $user = User::findorfail($id);
        return view('admin.manajemen-user.edit',compact('user'));
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
