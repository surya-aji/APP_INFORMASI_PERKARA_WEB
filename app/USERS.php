<?php

namespace App;


use Illuminate\Database\Eloquent\Model;

// use Illuminate\Foundation\Auth\User as Authenticatable;
// use Illuminate\Notifications\Notifiable;

class USERS extends Model 
{
    // use Notifiable;

    
    protected $table = 'pihak';
    
    protected $fillable = [
        'id', 'jenis_pihak_id', 'jenis_identitas','nomor_indentitas','nama','tempat_lahir','tanggal_lahir','jenis_kelamin','golongan_darah','alamat','rtrw','kelurahan','kecamatan','kabupaten_id','kabupaten','propinsi_id','propinsi','telepon','fax','email','agama_id','agama_nama','status_kawin','pekerjaan','pendidikan_id','pendidikan','warga_negara_id','warga_negara','nama_ayah','nama_ibu','keterangan','foto','difabel','diedit_oleh','diedit_tanggal','diinput_oleh','diinput_tanggal','diperbaharui_oleh','diperbaharui_tanggal',
    ];
}
