@extends('user.layout.master') @section('content')


<div class="app-content content">
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper">
        {{-- <div class="content-header row">
            <div class="content-header-left col-md-9 col-12 mb-2">
                <div class="row breadcrumbs-top">
                    <div class="col-12">
                        <h2 class="content-header-title float-left mb-0">Jadwal Sidang</h2>
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="<?=url("admin/{$data->perkara_id}")?>">Home</a></li>
                                <li class="breadcrumb-item active">Jadwal Sidang</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <div class="content-header-right text-md-right col-md-3 col-12 d-md-block d-none">
                <div class="form-group breadcrum-right">
                    <div class="dropdown">
                        <button class="btn-icon btn btn-primary btn-round btn-sm dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="feather icon-settings"></i></button>
                        <div class="dropdown-menu dropdown-menu-right"><a class="dropdown-item" href="#">Chat</a><a class="dropdown-item" href="#">Email</a><a class="dropdown-item" href="#">Calendar</a></div>
                    </div>
                </div>
            </div>
        </div> --}}


        <div class="content-body">

               <!-- Table Hover Animation start -->
               <div class="row" id="table-hover-animation">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                        <h4 class="card-title">Jadwal Sidang</h4>
                        </div>
                        <div class="card-content">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-hover-animation mb-0">
                                        <thead class="text-center">
                                            <tr>
                                                <th scope="col">No</th>
                                                <th scope="col">Tanggal Sidang</th>
                                                <th scope="col">Agenda Sidang</th>
                                                <th scope="col">Sidang Keliling</th>
                                                <th scope="col">Ruang Sidang</th>
                                                <th scope="col">Alasan Ditunda</th>
                                            </tr>
                                        </thead>
                                        <tbody class="text-center">
                                            @foreach ($jadwal as $i => $jd)
                                            <tr>
                                                <td>{{++$i}}</td>
                                                <td>{{Carbon\Carbon::parse($jd->tanggal_sidang)->isoFormat('dddd, D MMMM Y')}}</td>
                                                <td>{{$jd->agenda}}</td>
                                                <td>
                                                    @if ($jd->sidang_keliling == 'Y')
                                                        Ya
                                                        
                                                    @else
                                                        Tidak
                                                    @endif 
                                                </td>
                                                <td>{{$jd->ruangan}}</td>
                                                <td>{{$jd->alasan_ditunda ? $jd->alasan_ditunda:"-" }}</td>
                                            </tr>
                                            @endforeach
                                          
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
               </div>
            
            <!-- Table head options end -->

        </div>
        <div class="row">
            <section id="dashboard-analytics">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="card bg-analytics text-white">
                    <div class="card-content">
                        <div class="card-body text-center">
                            <img src="{{asset('public/app-assets/images/elements/decore-left.png')}}" class="img-left" alt="card-img-left">
                            <img src="{{asset('public/app-assets/images/elements/decore-right.png')}}" class="img-right" alt="card-img-right">
                            <div class="avatar avatar-xl bg-primary shadow mt-0">
                                <div class="avatar-content">
                                    <i class="feather icon-award white font-large-1"></i>
                                </div>
                            </div>
                            <div class="text-center">
                                <h1 class="mb-2 text-white"></h1>
                                <p class="m-auto "> &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp  &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp  Ambil Antrian Sidang Untuk Hari Ini 
                                    Sebagai &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp <br> <strong> {{$data->nomor_perkara}} </strong>  
                                </p>
                                <br>
                                @if (date('YYYY-MM-DD') == date('YYYY-MM-DD',strtotime($datasidang->tanggal_sidang)) && date('H') < '24' && count($checking) < 1)
                                <form class="form form-horizontal" action="<?=url("user/{$data->perkara_id}/jadwal/ambil_antrian")?>" method="POST" >
                                    @csrf
                                    <button  type="submit" class="btn btn-primary center">Ambil Antrian</button><br>
                                </form>
                                @elseif(Session::has('message'))
                                <p class="m-auto "> &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp  &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp  &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp  Berhasil Mengambil Antrian
                                    &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp<br>  
                                </p>
                                @elseif(count($checking) > 0)
                                <div class="alert alert-success mt-1 alert-validation-msg" role="alert">
                                    <i class="feather icon-info mr-1 align-middle"></i>
                                    <span>Telah Berhasil Mengambil <strong> Antrian Sidang</strong></span>
                                </div>
                                @else
                                <div class="alert alert-danger mt-1 alert-validation-msg" role="alert">
                                    <i class="feather icon-info mr-1 align-middle"></i>
                                    <span>Maaf, Tidak ada <strong> Antrian Sidang</strong> Untuk Hari ini</span>
                                </div>
                                @endif
                                <br>
                            </div>
                        </div><br>
                    </div>
                </div>
            </div>
        </section>
        </div>
        



    </div>
</div>
@endsection('content')
