
@extends('admin.layout.master')
@section('content')
       <div class="app-content content">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper">
            <div class="content-header row">
            </div>
            <div class="content-body">
                <section class="row flexbox-container">
                    <div class="col-xl-12 col-12 d-flex">
                        <div class="card bg-authentication rounded-0 mb-0">
                            <div class="row m-0">
                                <div class="col-lg-6 d-lg-block d-none text-center align-self-center">
                                    <img src="{{asset('public/app-assets/images/pages/register.jpg')}}" alt="branding logo">
                                </div>
                                <div class="col-lg-6 col-12 p-0">
                                    <div class="card rounded-0 mb-0 p-2">
                                        <div class="card-header pt-50 pb-1">
                                            <div class="card-title">
                                                <h4 class="mb-0">Edit Account</h4>
                                            </div>
                                        </div>
                                        <p class="px-2">Fill the below form to edit a new account.</p>
                                        <div class="card-content">
                                            <div class="card-body pt-0">
                                                <form action="{{url('manajemen-user',$user->id)}}" method="POST" enctype="multipart/form-data">
                                                    @csrf
                                                    <div class="form-label-group">
                                                        <input type="text" id="inputName" name="username" class="form-control" placeholder="Name" value="{{$user->username}}" required>
                                                        <label for="inputName">Name</label>
                                                    </div>
                                                    <div class="form-label-group">
                                                        <input type="email" id="inputEmail" name="email" class="form-control" placeholder="Email" value="{{$user->email}}" required>
                                                        <label for="inputEmail">Email</label>
                                                    </div>
                                                    <div class="form-label-group">
                                                        <input type="password" id="inputPassword" name="password" class="form-control" placeholder="Password" autocomplete="new-password" required>
                                                        <label for="inputPassword">Password</label>
                                                    </div>
                                                    <div class="form-label-group">
                                                        <input type="password" id="inputConfPassword" name="password_confirmation" class="form-control" autocomplete="new-password" placeholder="Confirm Password" required>
                                                        <label for="inputConfPassword">Confirm Password</label>
                                                    </div>
                                                    {{-- <div class="form-group row">
                                                        <div class="col-12">
                                                            <fieldset class="checkbox">
                                                                <div class="vs-checkbox-con vs-checkbox-primary">
                                                                    <input type="checkbox" checked>
                                                                    <span class="vs-checkbox">
                                                                        <span class="vs-checkbox--check">
                                                                            <i class="vs-icon feather icon-check"></i>
                                                                        </span>
                                                                    </span>
                                                                    <span class=""> I accept the terms & conditions.</span>
                                                                </div>
                                                            </fieldset>
                                                        </div>
                                                    </div> --}}
                                                    <a href="auth-login.html" class="btn btn-outline-primary float-left btn-inline mb-50">Login</a>
                                                    <button type="submit" class="btn btn-primary float-right btn-inline mb-50">Register</a>
                                                </form>
                                            </div>
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
