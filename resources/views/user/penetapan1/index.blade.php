@extends('admin.layout.master') @section('content')
<!-- BEGIN: Vendor CSS-->
<link rel="stylesheet" type="text/css" href="{{asset('public/app-assets/vendors/css/vendors.min.css')}}" />
<link rel="stylesheet" type="text/css" href="{{asset('public/app-assets/vendors/css/charts/apexcharts.css')}}" />
<link rel="stylesheet" type="text/css" href="{{asset('public/app-assets/vendors/css/extensions/tether-theme-arrows.css')}}" />
<link rel="stylesheet" type="text/css" href="{{asset('public/app-assets/vendors/css/extensions/tether.min.css')}}" />
<link rel="stylesheet" type="text/css" href="{{asset('public/app-assets/vendors/css/extensions/shepherd-theme-default.css')}}" />
<!-- END: Vendor CSS-->

<!-- BEGIN: Theme CSS-->
<link rel="stylesheet" type="text/css" href="{{asset('public/app-assets/css/bootstrap.css')}}" />
<link rel="stylesheet" type="text/css" href="{{asset('public/app-assets/css/bootstrap-extended.css')}}" />
<link rel="stylesheet" type="text/css" href="{{asset('public/app-assets/css/colors.css')}}" />
<link rel="stylesheet" type="text/css" href="{{asset('public/app-assets/css/components.css')}}" />
<link rel="stylesheet" type="text/css" href="{{asset('public/app-assets/css/themes/dark-layout.css')}}" />
<link rel="stylesheet" type="text/css" href="{{asset('public/app-assets/css/themes/semi-dark-layout.css')}}" />

<!-- BEGIN: Page CSS-->
<link rel="stylesheet" type="text/css" href="{{asset('public/app-assets/css/core/menu/menu-types/vertical-menu.css')}}" />
<link rel="stylesheet" type="text/css" href="{{asset('public/app-assets/css/core/colors/palette-gradient.css')}}" />
<link rel="stylesheet" type="text/css" href="{{asset('public/app-assets/css/pages/dashboard-analytics.css')}}" />
<link rel="stylesheet" type="text/css" href="{{asset('public/app-assets/css/pages/card-analytics.css')}}" />
<link rel="stylesheet" type="text/css" href="{{asset('public/app-assets/css/plugins/tour/tour.css')}}" />
<!-- END: Page CSS-->

<!-- BEGIN: Custom CSS-->
<link rel="stylesheet" type="text/css" href="{{asset('public/assets/css/style.css')}}" />
<!-- END: Custom CSS-->

<div class="app-content content">
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper">
        <div class="content-header row">
            <div class="content-header-left col-md-9 col-12 mb-2">
                <div class="row breadcrumbs-top">
                    <div class="col-12">
                        <h2 class="content-header-title float-left mb-0">Penetapan</h2>
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="<?=url("admin/{$data->perkara_id}")?>">Home</a></li>
                                <li class="breadcrumb-item active">Penetapan</li>
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
    </div>
</div>

<!-- BEGIN: Vendor JS-->
<script src="{{asset('public/app-assets/vendors/js/vendors.min.js')}}"></script>
<!-- BEGIN Vendor JS-->

<!-- BEGIN: Page Vendor JS-->
<script src="{{asset('public/app-assets/vendors/js/charts/apexcharts.min.js')}}"></script>
<script src="{{asset('public/app-assets/vendors/js/extensions/tether.min.js')}}"></script>
<script src="{{asset('public/app-assets/vendors/js/extensions/shepherd.min.js')}}"></script>
<!-- END: Page Vendor JS-->

<!-- BEGIN: Theme JS-->
<script src="{{asset('public/app-assets/js/core/app-menu.js')}}"></script>
<script src="{{asset('public/app-assets/js/core/app.js')}}"></script>
<script src="{{asset('public/app-assets/js/scripts/components.js')}}"></script>
<!-- END: Theme JS-->

<!-- BEGIN: Page JS-->
<script src="{{asset('public/app-assets/js/scripts/pages/dashboard-analytics.js')}}"></script>
<!-- END: Page JS-->
@endsection('content')
