@extends('layouts.app')

@section('content')
{{-- <!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
<!-- BEGIN: Head--> --}}

{{-- <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="description" content="Vuexy admin is super flexible, powerful, clean &amp; modern responsive bootstrap 4 admin template with unlimited possibilities.">
    <meta name="keywords" content="admin template, Vuexy admin template, dashboard template, flat admin template, responsive admin template, web app">
    <meta name="author" content="PIXINVENT"> --}}
    <title>LOGIN</title>
    <link rel="apple-touch-icon" href="{{asset('public/auth/app-assets/images/ico/apple-icon-120.png')}}">
    <link rel="shortcut icon" type="image/x-icon" href=" {{asset('public/auth/app-assets/images/ico/favicon.ico')}}">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,500,600" rel="stylesheet">
       
    <!-- BEGIN: Vendor CSS-->
    <link rel="stylesheet" type="text/css" href="{{asset('public/auth/app-assets/vendors/css/vendors.min.css')}}">
    <!-- END: Vendor CSS-->

    <!-- BEGIN: Theme CSS-->
    <link rel="stylesheet" type="text/css" href="{{asset('public/auth/app-assets/css/bootstrap.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('public/auth/app-assets/css/bootstrap-extended.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('public/auth/app-assets/css/colors.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('public/auth/app-assets/css/components.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('public/auth/app-assets/css/themes/dark-layout.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('public/auth/app-assets/css/themes/semi-dark-layout.css')}}">

    <!-- BEGIN: Page CSS-->
    <link rel="stylesheet" type="text/css" href="{{asset('public/auth/app-assets/css/core/menu/menu-types/vertical-menu.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('public/auth/app-assets/css/core/colors/palette-gradient.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('public/auth/app-assets/css/pages/authentication.css')}}">
    <!-- END: Page CSS-->

    <!-- BEGIN: Custom CSS-->
    <link rel="stylesheet" type="text/css" href="{{asset('public/auth/assets/css/style.css')}}">
    <!-- END: Custom CSS-->


<!-- END: Head-->

<!-- BEGIN: Body-->

<body class="vertical-layout vertical-menu-modern dark-layout 1-column  navbar-floating footer-static bg-full-screen-image  blank-page blank-page" data-open="click" data-menu="vertical-menu-modern" data-col="1-column" data-layout="dark-layout">
    <!-- BEGIN: Content-->
    <div class="app-content content">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper">
            <div class="content-header row">
            </div>
            <div class="content-body">
                <section class="row flexbox-container">
                    <div class="col-xl-8 col-11 d-flex justify-content-center">
                        <div class="card bg-authentication rounded mb-0">
                            <div class="row m-0">
                                <div class="col-lg-6 d-lg-block d-none text-center align-self-center px-1 py-0">
                                    <img class ='img-fluid pb-3' style="width:120px;height:150px vertical-align:top" src="{{asset('public/app-assets/images/logo/logo1.png')}}" alt="branding logo">
                                    <h3 class="text-secondary text-bold-400"> <strong> Sistem Informasi Perkara <br> Dan Antrian Sidang </strong></h3>
                                </div>
                                <div class="col-lg-6 col-12 p-0">
                                    <div class="card rounded mb-0 px-2">
                                        <div class="card-header pb-3">
                                            <div class="text-center">
                                                <h3 class="mb-0 ">Login</h3>
                                            </div>
                                        </div>
                                        <p class="">Silahkan Login Menggunakan Nomor Induk Kependudukan beserta Nomor Telepon yang sudah terdaftar :</p>
                                        
                                    @if (session('gagal'))
                                        <div class="alert alert-danger">
                                            {{ session('gagal') }}
                                        </div>
                                    @endif
                                       
                                        <div class="card-content">
                                            <div class="card-body pt-1">
                                                <form  method ="POST" action ="{{route('logged.store')}}">
                                                    @csrf
                                                    <fieldset class="form-label-group form-group position-relative has-icon-left">
                                                        <input type="text" class="form-control" id="nik" name="email" placeholder="Masukan Email" required>
                                                        <div class="form-control-position">
                                                            <i class="feather icon-user"></i>
                                                        </div>
                                                        <label for="nomor_perkara">Email</label>
                                                    </fieldset>

                                                    <fieldset class="form-label-group position-relative has-icon-left">
                                                        <input type="password" class="form-control" id="nik" name="nomor_telepon" placeholder="Masukan password" required>
                                                        <div class="form-control-position">
                                                            <i class="feather icon-lock"></i>
                                                        </div>
                                                        <label for="perkara_id">Password</label>
                                                    </fieldset>
                                                    <div class="d-flex justify-content-center">
                                                        <button type="submit" class="btn btn-outline-warning"> &nbsp &nbsp Login &nbsp &nbsp</button>
                                                    </div>
                                                    
                                                </form>
                                            </div>
                                        </div>
                                        <div class="login-footer">
                                            <div class="divider">
                                                <div class="divider-text"></div>
                                            </div>
                                            <div class="footer-btn d-inline text-right">
                                                <div class="center"><a href="<?=url('/login')?>" class="card-link text-warning">Login Sebagai Pihak?</a></div>
                                            </div><br>
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
    <!-- END: Content-->


    <!-- BEGIN: Vendor JS-->
    <script src="{{asset('public/auth/app-assets/vendors/js/vendors.min.js')}}"></script>
    <!-- BEGIN Vendor JS-->

    <!-- BEGIN: Page Vendor JS-->
    <!-- END: Page Vendor JS-->

    <!-- BEGIN: Theme JS-->
    <script src="{{asset('public/auth/app-assets/js/core/app-menu.js')}}"></script>
    <script src="{{asset('public/auth/app-assets/js/core/app.js')}}"></script>
    <script src="{{asset('public/auth/app-assets/js/scripts/components.js')}}"></script>
    <!-- END: Theme JS-->

    <!-- BEGIN: Page JS-->
    <!-- END: Page JS-->

</body>
<!-- END: Body-->

@endsection
