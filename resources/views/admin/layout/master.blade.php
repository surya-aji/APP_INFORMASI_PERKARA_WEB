<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
<!-- BEGIN: Head-->

<head>
  
</head>
<!-- END: Head-->
    @include('admin.layout.top')
<!-- BEGIN: Body-->

<body class="vertical-layout vertical-menu-modern 2-columns navbar-floating footer-static menu-collapsed" data-open="click" data-menu="vertical-menu-modern" data-col="2-columns">

    <!-- BEGIN: Header-->
    @include('admin.layout.header')
    <!-- END: Header-->


    <!-- BEGIN: Main Menu-->
    @include('admin.layout.navigation')
    <!-- END: Main Menu-->

    <!-- BEGIN: Content-->
    @yield('content')
    <!-- END: Content-->

    <div class="sidenav-overlay"></div>
    <div class="drag-target"></div>

    <!-- BEGIN: Footer-->
    @include('admin.layout.footer')
    <!-- END: Footer-->

    {{-- BOTTOM --}}
    @include('admin.layout.bottom')
    {{-- END BOTTOM --}}
</body>
<!-- END: Body-->

</html>