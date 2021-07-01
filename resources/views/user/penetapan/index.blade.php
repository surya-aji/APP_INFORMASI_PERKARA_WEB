@extends('user.layout.master')
@section('content')


<div class="app-content content">
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper">
        {{-- <div class="content-header row">
            <div class="content-header-left col-md-9 col-12 mb-2">
                <div class="row breadcrumbs-top">
                    <div class="col-12">
                        <h2 class="content-header-title float-left mb-0">Penetapan</h2>
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="<?=url("admin/{$data->perkara_id}")?>">Home</a>
                                </li>
                                <li class="breadcrumb-item active">Table
                                </li>
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
    <!-- Table Hover Animation start 1 -->
    <div class="row" id="table-hover-animation">
        <div class="col-12">
            <div class="card">
                <div class="card-content">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-hover-animation mb-0">
                                <thead>
                                    <tr>
                                        <th class="w-50" scope="col">Tanggal Penetapan</th>
                                        <th scope="col" class="text-left">Nama Majelis Hakim / Hakim</th>
                                    </tr>
                                </thead>
                                <tbody><hr>
                                    <tr>
                                        <td>{{Carbon\Carbon::parse($penetapan->penetapan_majelis_hakim)->isoFormat('dddd, D MMMM Y')}}</td>
                                        <td class="text-left">{!!$penetapan->majelis_hakim_text!!}</td>
                                        {{-- @foreach ($hakim as $hkm)
                                            <td>{{$hkm->hakim_nama}}</td>
                                        @endforeach --}}
                                      
                                    </tr>
                                   
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Table head options end 1 -->

        <!-- Table Hover Animation start 1 -->
        <div class="row" id="table-hover-animation">
            <div class="col-12">
                <div class="card">
                    <div class="card-content">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-hover-animation mb-0">
                                    <thead>
                                        <tr>
                                            <th class="w-50" scope="col">Tanggal Penunjukan</th>
                                            <th scope="col">Panitera / Panitera Pengganti</th>
                                        </tr>
                                    </thead>
                                    <tbody><hr>
                                        <tr>
                                            <td>{{Carbon\Carbon::parse($penetapan->penetapan_panitera_pengganti)->isoFormat('dddd, D MMMM Y')}}</td>
                                            <td>{{$penetapan->panitera_pengganti_text}}</td>
                                        </tr>
                                       
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Table head options end 1 -->

            <!-- Table Hover Animation start 1 -->
            <div class="row" id="table-hover-animation">
                <div class="col-12">
                    <div class="card">
                        <div class="card-content">
                            <div class="card-body">
                                <div class="table-responsive text-left">
                                    <table class="table table-hover-animation mb-0">
                                        <thead>
                                            <tr>
                                                <th class="w-50" scope="col">Tanggal Penetapan</th>
                                                <th scope="col">Jurusita</th>
                                            </tr>
                                        </thead>
                                        <tbody><hr>
                                            <tr>
                                                <td>{{Carbon\Carbon::parse($penetapan->penetapan_jurusita)->isoFormat('dddd, D MMMM Y')}}</td>
                                                <td>{{$penetapan->jurusita_text}}</td>
                                            </tr>
                                           
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Table head options end 1 -->

                <!-- Table Hover Animation start 1 -->
                <div class="row" id="table-hover-animation">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-content">
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-hover-animation mb-0">
                                            <thead>
                                                <tr>
                                                    <th class="w-50" scope="col">Tanggal Penetapan</th>
                                                    <th scope="col">Tanggal Sidang</th>
                                                </tr>
                                            </thead>
                                            <tbody><hr>
                                                <tr>
                                                    <td>{{Carbon\Carbon::parse($penetapan->penetapan_hari_sidang)->isoFormat('dddd, D MMMM Y')}}</td>
                                                    <td>{{Carbon\Carbon::parse($penetapan->sidang_pertama)->isoFormat('dddd, D MMMM Y')}}</td>
                                                </tr>
                                               
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Table head options end 1 -->

            
     </div>
    </div>
</div>

@endsection('content')