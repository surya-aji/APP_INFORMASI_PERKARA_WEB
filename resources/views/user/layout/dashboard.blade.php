
@extends('user.layout.master')
@section('content')
        <div class="app-content content">
            <div class="content-overlay"></div>
            <div class="header-navbar-shadow"></div>
            <div class="content-wrapper pr-0">
                <div class="content-header row">
                </div>
                <div class="content-body">
                    <!-- Dashboard Analytics Start -->
                    <section id="dashboard-analytics">
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12">
                                <h4 class="card-title">
                                    Dashboard 
                                </h4>
                                <div class="card text-black" style="background-color:#EAF0FF;">
                                    <div class="card-content">
                                        <div class="card-body">
                                            {{-- <img src="{{asset('public/app-assets/images/elements/decore-left.png')}}" class="img-left" alt="card-img-left"> --}}
                                            <img src="{{asset('public/app-assets/images/elements/bg.png')}}" class="img-right" style="width:38%; z-index:1;" alt="card-img-right">
                                            <div class="avatar avatar-xl bg-primary shadow mt-0">
                                                {{-- <div class="avatar-content">
                                                    <i class="feather icon-award white font-large-1"></i>
                                                </div> --}}
                                            </div>
                                            <div class="">
                                                <h1 class="mb-2 card-title"> Selamat Datang di Halaman Utama</h1>
                                            <p class=" text-justify w-50"> Selamat Datang di Halaman Utama Aplikasi Informasi Perkara dan Antrian Sidang,
                                                Anda Login Sebagai <strong> {{$data->nomor_perkara}} </strong>  
                                                NIK dan Nomor Handphone anda Teregistrasi dengan Nomor Perkara
                                                Gunakan Hak Akses Anda dengan bijak</p><br>
                                            </div>
                                            <a href="<?=url("user/{$data->perkara_id}/dataumum")?>" class="btn btn-primary float-left" >Cek Data Anda</a><br>
                                        </div><br>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <h4 class="card-title">
                            Perkara Pihak
                        </h4>
                        <div class="card" style="background: #6672FB">
                            <div class="card-content">
                                <div class="card-body">
                                    <div class="table-responsive" style="background: #6672FB">
                                        <table class="table table-hover-animation mb-0" style="background: #6672FB">
                                                <tr class="text-white" style="background: #6672FB"> 
                                                    <td class="text-center bg-warning colors-container rounded text-white width-50 height-50 d-flex align-items-center justify-content-center mr-1 ml-50 my-1 shadow">
                                                    <td class="text-center" style="width: 20%">PEMOHON</td>
                                                    <td class="text-center" style="width: 35%">{{$data->nama_pemohon}}</td>
                                                    <td>{{$data->alamat_pemohon}}</td>
                                                    {{-- <td>?</td> --}}
                                                </tr>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-content">
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-hover-animation mb-0">
                                                <tr class="text-dark"> 
                                                    <td class="text-center bg-warning colors-container rounded text-dark width-50 height-50 d-flex align-items-center justify-content-center mr-1 ml-50 my-1 shadow">
                                                    <td class="text-center" style="width: 20%">TERMOHON</td>
                                                    <td class="text-center" style="width: 35%">{{$data->nama_termohon}}</td>
                                                    <td>{{$data->alamat_termohon}}</td>
                                                    {{-- <td>?</td> --}}
                                                </tr>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-content">
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-hover-animation mb-0">
                                                <tr class="text-dark"> 
                                                    <td class="text-center colors-container rounded text-dark width-50 height-50 d-flex align-items-center justify-content-center mr-1 ml-50 my-1 shadow" style="background: #1F998E">
                                                    <td class="text-center" style="width: 80%">STATUS PERKARA</td>
                                                    <td class="text-center">{{$data->proses_terakhir_text}}</td>
                                                    {{-- <td>?</td> --}}
                                                </tr>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            </div>
                    </section>
                    <!-- Dashboard Analytics end -->
        
                </div>
            </div>
        </div>


@endsection('content')
