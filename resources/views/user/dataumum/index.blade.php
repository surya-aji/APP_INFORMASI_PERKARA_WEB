@extends('user.layout.master') @section('content')

<div class="app-content content">
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper">


        <div class="content-body">
       
            <!-- Table Hover Animation start 3 -->
            <div class="row" id="table-hover-animation">
                <div class="col-12">
                    <div class="card bg-primary">
                        <div class="card-content">
                            <div class="card-body">
                                <div class="table-responsive bg-primary">
                                    <table class="table bg-primary table-hover-animation mb-0">
                                            <tr class="bg-primary text-white"> 
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
                </div>
                <div class="col-6">
                    <div class="card">
                        <div class="card-content">
                            <div class="card-body">
                                <div class="table-responsive ">
                                    <table class="table bg-primary table-hover-animation mb-0">
                                            <thead>
                                                <th>KUASA HUKUM PEMOHON</th>
                                            </thead>
                                            @foreach ($kuasa as $i => $kuasaPemohon)
                                            <tr> 
                                                <td class="text-center" style="width: 35%">{{++$i}} . &nbsp{{$kuasaPemohon->kuasa_pemohon}}</td>
                                            </tr>
                                            @endforeach
                                           
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-6">
                    <div class="card">
                        <div class="card-content">
                            <div class="card-body">
                                <div class="table-responsive ">
                                    <table class="table bg-primary table-hover-animation mb-0">
                                        <thead>
                                            <th>KUASA HUKUM TERMOHON</th>
                                        </thead>
                                        @foreach ($kuasa2 as $i => $kuasaTermohon)
                                        <tr> 
                                            <td class="text-center" style="width: 35%">{{++$i}} . &nbsp{{$kuasaTermohon->kuasa_termohon}}</td>
                                        </tr>
                                        @endforeach
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                
                <div class="col-12">
                    <div class="card">
                        <div class="card-content">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-hover-animation mb-0">
                                        <tbody>
                                            <tr>
                                                <td class="text-center bg-danger colors-container rounded text-white width-50 height-50 d-flex align-items-center justify-content-center mr-1 ml-50 my-1 shadow">
                                                <td class="text-center" style="width: 20%">TERMOHON</td>
                                                <td class="text-center" style="width: 35%">{{$data->nama_termohon}}</td>
                                                <td>{{$data->alamat_termohon}}</td>
                                            </tr>
                                            
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Table head options end 3-->
            

            




                 <!-- Table Hover Animation start 1 -->
                 <div class="row" id="table-hover-animation">
                    <div class="col-6">
                        <div class="card">
                            <div class="card-content">
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-hover-animation mb-0">
                                            <tbody>
                                                <tr>
                                                    <td class="text-center bg-danger colors-container rounded text-white width-50 height-50 d-flex align-items-center justify-content-center mr-1 ml-50 my-1 shadow">
                                                    <td>KLASIFIKASI PERKARA</td>
                                                    <td>?</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-6">
                        <div class="card">
                            <div class="card-content">
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-hover-animation mb-0">
                                            <tbody>
                                                <tr>
                                                    <td class="text-center bg-danger colors-container rounded text-white width-50 height-50 d-flex align-items-center justify-content-center mr-1 ml-50 my-1 shadow">
                                                    <td class="text-center">{{$data->nomor_perkara}}</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Table head options end 1-->
    
                <!-- Table Hover Animation start 2 -->
                <div class="row" id="table-hover-animation">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-content">
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-hover-animation mb-0">
                                            <thead class="text-center">
                                                <tr>
                                                    <th scope="col">Tanggal Menikah</th>
                                                    <th scope="col">Tanggal Kutipan Akta Nikah</th>
                                                    <th scope="col">Nomor Kutipan Akta Nikah</th>
                                                    <th scope="col">KUA Tempat Nikah</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td class="text-center" style="width: 25%">{{Carbon\Carbon::parse($data->tgl_nikah)->isoFormat('dddd, D MMMM Y')}}</td>
                                                    <td class="text-center" style="width: 25%">{{Carbon\Carbon::parse($data->tgl_kutipan_akta_nikah)->isoFormat('dddd, D MMMM Y')}}</td>
                                                    <td class="text-center" style="width: 25%">{{$data->no_kutipan_akta_nikah}}</td>
                                                    <td>{{$data->kua_tempat_nikah}}</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Table head options end 2-->

              <!-- Table Hover Animation start 4 -->
              <div class="row" id="table-hover-animation">
                <div class="col-6">
                    <div class="card" style="height: 92%">
                        <div class="card-header">
                            <h4 class="card-title"><b>Posita</b></h4>
                        </div>
                        <div class="card-content">
                            <div>
                                <div>
                                    <div class="card-content">
                                        <div class="card-body text-justify">
                                            <!-- Button trigger modal -->
                                            {{Str::limit(strip_tags($data->posita), 200, '...')}} <br>
                                            <button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#posita">
                                                Selengkapnya
                                            </button>
    
                                            <!-- Modal -->
                                            <div class="modal fade" id="posita" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-scrollable" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalScrollableTitle">POSITA</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body text-justify">
                                                          {{print_r($data->posita)}}
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-primary" data-dismiss="modal">Accept</button>
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
                
                <div class="col-6">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title"><b>Petitum</b></h4>
                        </div>
                        <div class="card-content">
                            <div>
                                <div class="card">
                                    <div class="card-content">
                                        <div class="card-body">
                                            {{Str::limit(strip_tags($data->petitum), 50, '...')}} <br>
                                            <!-- Button trigger modal -->
                                            <button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#exampleModalScrollable">
                                                Selengkapnya
                                            </button>
    
                                            <!-- Modal -->
                                            <div class="modal fade" id="exampleModalScrollable" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-scrollable" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalScrollableTitle">PETITUM</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body text-justify">
                                                          {{print_r($data->petitum)}}
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-primary" data-dismiss="modal">Accept</button>
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
                

                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title"><b>Prodeo</b></h4>
                        </div>
                        <div class="card-content">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-hover-animation mb-0">
                                        <thead>
                                            <tr>
                                                {{--
                                                <th scope="col">No</th>
                                                --}}
                                                <th scope="col">Keterangan</th>
                                            </tr>
                                        </thead>
                                        <tbody class="text-justify">
                                            {{-- @foreach($data as $i=>$datas) --}}
                                            <tr>
                                                {{--
                                                <td scope="row">{{++$i}}</td>
                                                --}}
                                                <td>{{$data->prodeo}}</td>
                                            </tr>
                                            {{-- @endforeach --}}
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <!-- Table head options end 4-->
        </div>



    </div>
</div>

@endsection('content')
