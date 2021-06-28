<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
<!-- BEGIN: Head-->

<head>
<style>
    body{
        max-width: 100%;
        overflow-x: hidden;
    }
</style>
</head>
<!-- END: Head-->
    @include('user.layout.top')
<!-- BEGIN: Body-->

<body class="vertical-layout vertical-menu-modern semi-dark-layout 2-columns navbar-floating footer-static menu-collapsed " data-open="click" data-menu="vertical-menu-modern" data-col="2-columns">

    <!-- BEGIN: Header-->
    @include('user.layout.header')
    <!-- END: Header-->


    <!-- BEGIN: Main Menu-->
    @include('user.layout.navigation')
    <!-- END: Main Menu-->
    

    <!-- BEGIN: Content-->
    <div class="row p-0">
        <div class="col-sm-8">
            @yield('content')
        </div>
        <div class="col-sm-4">
            @include('user.layout.rightbar')
        </div>
    </div>
    
    
    <!-- END: Content-->

    <div class="sidenav-overlay"></div>
    <div class="drag-target"></div>

    <!-- BEGIN: Footer-->
    @include('user.layout.footer')
    <!-- END: Footer-->

    {{-- BOTTOM --}}
    @include('user.layout.bottom')
    {{-- END BOTTOM --}}
</body>
<!-- END: Body-->

</html>