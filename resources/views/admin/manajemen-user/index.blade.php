
@extends('admin.layout.master')
@section('content')
        <div class="app-content content">
            <div class="content-overlay"></div>
            <div class="header-navbar-shadow"></div>
            <div class="content-wrapper pr-0">
                <div class="content-header row">
                </div>
                <div class="content-body">
                    <section id="basic-datatable">
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h4 class="card-title">Manajemen User</h4>
                                    </div>
                                    <div class="card-content">
                                        <div class="card-body card-dashboard">
                                            <a href="<?=url('register')?>" type="button" class="btn btn-primary mr-1 mb-1"><i class="feather icon-plus"></i> Tambah User</a>
                                            <div class="table-responsive">
                                                <table class="table zero-configuration">
                                                    <thead>
                                                        <tr>
                                                            <th>Username</th>
                                                            <th>Role</th>
                                                            <th>Email</th>
                                                            <th>Aksi</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                    @foreach ($user as $users)
                                                    <tr>
                                                        <td>{{$users->username}}</td>
                                                        <td>{{$users->role}}</td>
                                                        <td>{{$users->email}}</td>
                                                        <th>
                                                            <a href="{{url('/manajemen-user',$users->id)}}" type="button" class="btn btn-success mr-1 mb-1"><i class="feather icon-edit-1">Edit</i></a>
                                                            <form style="display: inline;" action="{{ url('manajemen-user/destroy', $users->id) }}" method="post" onsubmit="return confirm('Yakin hapus data ?')" >
                                                                @csrf
                                                                <button type="submit" class="btn btn-danger btn-icon">
                                                                  <i class="feather icon-trash">Hapus</i>
                                                                </button>
                                                              </form>
                                                        </th>
                                                    </tr>
                                                    @endforeach
                                                        
                                                    </tbody>
                                                    <tfoot>
                                                        <tr>
                                                            <th>Username</th>
                                                            <th>Role</th>
                                                            <th>Email</th>
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
