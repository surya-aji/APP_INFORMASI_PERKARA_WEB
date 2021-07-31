
@extends('admin.layout.master')
@section('content')
        <div class="app-content content">
            <div class="content-overlay"></div>
            <div class="header-navbar-shadow"></div>
            <div class="content-wrapper pr-0">
                <div class="content-header row">
                </div>
                <div class="content-body">
                    <!-- Dashboard Analytics Start -->
                    <section id="dashboard-analytics">
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12">
                                <h4 class="card-title">
                                    Dashboard 
                                </h4>
                                <div class="card text-black" style="background-color:#EAF0FF;">
                                    <div class="card-content">
                                        <div class="card-body">
                                            {{-- <img src="{{asset('public/app-assets/images/elements/decore-left.png')}}" class="img-left" alt="card-img-left"> --}}
                                            <img src="{{asset('public/app-assets/images/elements/bg.png')}}" class="img-right" style="width:38%; z-index:1;" alt="card-img-right">
                                            <div class="avatar avatar-xl bg-primary shadow mt-0">
                                                {{-- <div class="avatar-content">
                                                    <i class="feather icon-award white font-large-1"></i>
                                                </div> --}}
                                            </div>
                                            <div class="">
                                                <h1 class="mb-2 card-title"> Selamat Datang di Halaman Utama</h1>
                                            <p class=" text-justify w-50"> Selamat Datang di Halaman Utama Aplikasi Informasi Perkara dan Antrian Sidang,
                                                Anda Login Sebagai <strong>{{Auth::user()->username}}</strong>  
                                                Username dan Password telah terdaftar di Sistem,
                                                Gunakan Hak Akses Anda dengan bijak</p><br>
                                            </div>
                                            {{-- <a href="<?=url("user/{$data->perkara_id}/dataumum")?>" class="btn btn-primary float-left" >Cek Data Anda</a><br> --}}
                                        </div><br>
                                    </div>
                                </div>
                            </div>
{{-- {{$event}} --}}

                            <div class="col-lg-12 col-md-12 col-12">
                                <div class="card">
                                    <div class="card-header d-flex justify-content-between">
                                        <h4 class="card-title">Statistik Tahunan Perkara</h4>
                                    </div>
                                    
                                    <div class="card-content">
                                        <div class="card-body pb-0">
                                            <div id="sales-line-chart"></div>
                                        </div>
                                    </div>
                                </div>
                            </div> -

                        </div>
                  
                        

                    </section>
                    <!-- Dashboard Analytics end -->
        
                </div>
            </div>
        </div>

        <script type="text/javascript"> 
        /*=========================================================================================
    File Name: card-statistics.js
    Description: Card-statistics page content with Apexchart Examples
    ----------------------------------------------------------------------------------------
    Item Name: Vuexy  - Vuejs, HTML & Laravel Admin Dashboard Template
    Author: PIXINVENT
    Author URL: http://www.themeforest.net/user/pixinvent
==========================================================================================*/

$(window).on("load", function(){
   
var tahunan = <?php echo $data_tahun?>;
var th = <?php echo $date?>;

var $primary = '#7367F0';
var $danger = '#EA5455';
var $warning = '#FF9F43';
var $info = '#00cfe8';
var $success = '#00db89';
var $primary_light = '#9c8cfc';
var $warning_light = '#FFC085';
var $danger_light = '#f29292';
var $info_light = '#1edec5';
var $strok_color = '#b9c3cd';
var $label_color = '#e7eef7';
var $purple = '#df87f2';
var $white = '#fff';



  // Sales  Chart
  // -----------------------------

 var salesavgChartoptions = {
    chart: {
      height: 270,
      toolbar: { show: true },
      type: 'line',
      dropShadow: {
          enabled: true,
          top: 20,
          left: 2,
          blur: 6,
          opacity: 0.20
      },
    },
    stroke: {
        curve: 'smooth',
        width: 4,
    },
    grid: {
        borderColor: $label_color,
    },
    legend: {
        show: false,
    }, 
      title: {
        display: true,
        text: 'Tahun'+ " " +th,
      },
 
   colors: [$purple],
    fill: {
        type: 'gradient',
        gradient: {
            shade: 'dark',
            inverseColors: false,
            gradientToColors: [$primary],
            shadeIntensity: 1,
            type: 'horizontal',
            opacityFrom: 1,
            opacityTo: 1,
            stops: [0, 100, 100, 100]
        },
    },
    markers: {
        size: 0,
        hover: {
            size: 5
        },
    },
    xaxis: {
        labels: {
            style: {
                colors: $strok_color,
            }
        },
        axisTicks: {
            show: false,
        },
        // categories: ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Juli', 'Agu', 'Sep', 'Okt', 'Nov', 'Des'],
        axisBorder: {
            show: false,
        },
        tickPlacement: 'on'
    },
    yaxis: {
        tickAmount: 5,
        labels: {
            style: {
                color: $strok_color,
            },
            formatter: function(val) {
                return val > 999 ? (val / 1000).toFixed(1) + 'k' : val;
            }
        }
    },
    tooltip: {
        x: { show: false }
    },
    series: [{
          name: "Total Perkara",
          data: tahunan,
      }],

  }

 var salesavgChart = new ApexCharts(
      document.querySelector("#sales-line-chart"),
      salesavgChartoptions
  );

  salesavgChart.render();


});

        
        </script>



@endsection('content')
