@extends('user.layout.master') @section('content')


<div class="app-content content">
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper">
        <div class="content-header row">
            <div class="content-header-left col-md-9 col-12 mb-2">
                <div class="row breadcrumbs-top">
                    <div class="col-12">
                        <h2 class="content-header-title float-left mb-0">Biaya</h2>
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="<?=url("admin/{$data->perkara_id}")?>">Home</a></li>
                                <li class="breadcrumb-item active">Biaya</li>
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
        </div>


        <div class="content-body">

            <!-- Table Hover Animation start 1 -->
            <div class="row" id="table-hover-animation">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title"><b>Biaya</b></h4>
                        </div>
                        <div class="card-content">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table border="2" class="table table-striped table-bordered complex-headers">
                                        <thead class="thead-dark text-center">
                                            <tr>
                                                <th class="align-middle" rowspan="2" scope="col">No</th>
                                                <th class="align-middle" rowspan="2" scope="col">Tanggal Transaksi</th>
                                                <th class="align-middle" rowspan="2" scope="col">Uraian</th>
                                                <th class="align-middle" colspan="3" scope="col">Jumlah</th>
                                                <th class="align-middle" rowspan="2" scope="col">Keterangan</th>
                                            </tr>
                                            <tr>
                                                <th width='15%' scope="col">Pemasukan</th>
                                                <th width='15%' scope="col">Pengeluaran</th>
                                                <th width='15%' scope="col">Sisa</th>
                                            </tr>
                                        </thead>
                                        <tbody class="text-center">
                                         
                                            @php
                                            $sisa = 0;
                                            @endphp
                                            
                                            @foreach ($biaya as $i => $biaya_p)
                                            @php
                                                $pemasukan = 0;
                                                $pengeluaran = 0;
                                            @endphp
                                            <tr>
                                               
                                                <td>{{++$i}}</td>
                                                <td>{{Carbon\Carbon::parse($biaya_p->tanggal_transaksi)->isoFormat('dddd, D MMMM Y')}}</td>
                                                <td>{{$biaya_p->uraian}}</td>
                                                @if ($biaya_p->jenis_transaksi === -1)
                                                <td></td>
                                                <td>
                                                @php
                                                    $pengeluaran = $biaya_p->jumlah; 
                                                @endphp
                                                    Rp.{{number_format($pengeluaran,0,',','.')}}</td>  
                                                    
                                                @else
                                                    <td>
                                                        @php
                                                            $pemasukan = $biaya_p->jumlah;
                                                        @endphp
                                                        Rp.{{number_format($pemasukan,0,',','.')}}</td> 
                                                    <td></td>
                                                @endif
                                                <td>
                                                    @php
                                                        $sisa = ($sisa + $pemasukan) - $pengeluaran;
                                                    @endphp
                                                    
                                                    Rp.{{number_format($sisa,0,',','.')}}</td>
                                                <td></td>
                                            </tr>
                                                
                                            @endforeach
                                            <thead class="thead-dark text-center">
                                                <tr>
                                                    <th class="align-middle" colspan="3" scope="col">Total</th>
                                                    <th class="align-middle">Rp.{{number_format($t_pemasukan,0,',','.')}}</th>
                                                    <th class="align-middle">Rp.{{number_format($t_pengeluaran,0,',','.')}}</th>
                                                    <th class="align-middle">Rp.{{number_format($t_pemasukan - $t_pengeluaran,0,',','.')}}</th>
                                                    <th class="align-middle"></th>
                                                </tr>
                                            </thead>
                                            
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Table head options end 1-->

      

        </div>



    </div>
</div>


@endsection('content')
