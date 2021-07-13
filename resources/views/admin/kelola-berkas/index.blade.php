
@extends('admin.layout.master')
@section('content')
        <div class="app-content content">
            <div class="content-overlay"></div>
            <div class="header-navbar-shadow"></div>
            <div class="content-wrapper pr-0">
                <div class="content-header row">
                </div>
                <div class="content-body">
                    <section id="column-selectors">
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h4 class="card-title">Kelola Dokumen Akhir</h4>
                                    </div>
                                    <div class="card-content">
                                        <div class="card-body card-dashboard">
                                            <div class="table-responsive">
                                                <table class="table table-striped dataex-html5-selectors">
                                                    <thead>
                                                        <tr>
                                                            <th>No</th>
                                                            <th>Nomor Perkara</th>
                                                            <th>Klasifikasi Perkara</th>
                                                            <th>Tanggal Putus</th>
                                                            <th>Aksi</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach ($data as $i=>$item)
                                                        <tr>
                                                            <td>{{++$i}}</td>
                                                            @if ($item->status == 1)
                                                            <td>
                                                                <div class="alert alert-success" role="alert">
                                                                    <h4 class="alert-heading text-center">selesai</h4>
                                                                    <p class="mb-0 text-center">
                                                                        {{$item->noper}}
                                                                    </p>
                                                                </div>
                                                            </td>
                                                            @else
                                                                <td> {{$item->noper}}</td>
                                                            @endif
                                                            <td>{{$item->jenis_perkara_text}}</td>
                                                            <td>{{Carbon\Carbon::parse($item->tanggal_putusan)->isoFormat('dddd, D MMMM Y')}}</td>
                                                            @if ($item->status == 1)
                                                            <td>
                                                                <form style="display: inline;" action="{{route('hapus',$item->per_id)}}" method="post" onsubmit="return confirm('Yakin hapus data ?')" >
                                                                    @csrf
                                                                    <button type="submit" class="btn btn-danger btn-icon">
                                                                      <i class="feather icon-trash"> Hapus File</i>
                                                                    </button>
                                                                  </form>
                                                            </td>    
                                                            @else
                                                            <td>
                                                                <a href="{{url('kelola-berkas',$item->per_id)}}" type="button" class="btn btn-primary mr-1 mb-1"><i class="feather icon-upload"> Unggah  </i></a>
                                                            </td>    
                                                            @endif
                                                        @endforeach
                                                        </tr>
                                                    </tbody>
                                                    <tfoot>
                                                        <tr>
                                                            <th>No</th>
                                                            <th>Nomor Perkara</th>
                                                            <th>Klasifikasi Perkara</th>
                                                            <th>Tanggal Putus</th>
                                                            <th>Aksi</th>
                                                        </tr>
                                                    </tfoot>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </div>


@endsection('content')
