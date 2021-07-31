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
                        <h2 class="content-header-title float-left mb-0">Putusan</h2>
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="<?=url("admin/{$data->perkara_id}")?>">Home</a>
                                </li>
                                <li class="breadcrumb-item active">Putusan Akhir
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
                                                <th class="w-50" scope="col">Tanggal Putusan</th>
                                                <th scope="col">{{Carbon\Carbon::parse($putusan->tanggal_putusan)->isoFormat('dddd, D MMMM Y')}}</th>
                                            </tr>
                                        </thead>

                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Table head options end 1 -->
            
              <!-- Table Hover Animation start 2 -->
              <div class="row" id="table-hover-animation">
                <div class="col-12">
                    <div class="card">
                        <div class="card-content">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-hover-animation mb-0">
                                        <thead>
                                            <tr>
                                                <th class="w-50" scope="col">Putusan Verztek</th>
                                                <th scope="col">
                                                    @if ($putusan->putusan_verstek == 'Y')
                                                        Ya
                                                    @else
                                                        Tidak
                                                    @endif 
                                                </th>
                                            </tr>
                                        </thead>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Table head options end 2 -->

              <!-- Table Hover Animation start 3 -->
            <div class="row" id="table-hover-animation">
                <div class="col-12">
                    <div class="card">
                        <div class="card-content">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-hover-animation mb-0">
                                        <thead>
                                            <tr>
                                                <th class="w-50" scope="col">Status Putusan</th>
                                                <th scope="col">
                                                    @if ($putusan->status_putusan_id == 62)
                                                        Dikabulkan
                                                    @elseif($putusan->status_putusan_id == 63)
                                                        Ditolak
                                                    @elseif($putusan->status_putusan_id == 64)
                                                        Tidak Dapat Diterima
                                                    @elseif($putusan->status_putusan_id == 65)
                                                        Digugurkan
                                                    @elseif($putusan->status_putusan_id == 66)
                                                        Dicoret dari Register
                                                    @elseif($putusan->status_putusan_id == 67)
                                                        Dicabut
                                                    @endif
                                                </th>
                                            </tr>
                                        </thead>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Table head options end 3 -->

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
                                                <th class="w-50" scope="col">Tanggal Minutasi</th>
                                                <th scope="col">{{Carbon\Carbon::parse($putusan->tanggal_minutasi)->isoFormat('dddd, D MMMM Y')}}</th>
                                            </tr>
                                        </thead>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Table head options end 1 -->
<div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">
                            Amar Putusan
                        </h4>
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            <p>
                                {{Str::limit(strip_tags($putusan->amar_putusan), 50, '...')}} &nbsp 
                            @if ($data_berkas->dok == null)
                            <div class="alert alert-danger mt-1 alert-validation-msg" role="alert">
                                <i class="feather icon-info mr-1 align-middle"></i>
                                <span>Belum ada berkas</span><br>
                            </div>
                            @else
                            <a href="{{route('download-file',$data->perkara_id)}}" class="btn btn-primary">Download Berkas Akhir</a> <br>

                            @endif
                            </p>
                            <button type="button" class="btn btn-outline-primary btn-lg block" data-toggle="modal" data-target="#exampleModalCenter">
                                Selengkapnya
                            </button>
                            <!-- Modal -->
                            <div class="modal fade " id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered modal-dialog-centered modal-dialog-scrollable modal-xl" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalCenterTitle">Amar Putusan</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <p>{{print_r($putusan->amar_putusan)}}
                                            </p>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-primary" data-dismiss="modal">Kembali</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
        
    </div>
</div>


@endsection('content')