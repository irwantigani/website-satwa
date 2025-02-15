<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Satwa</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="{{asset('assets/img/favicon.png ')}}" rel="icon">
  <link href="{{asset('assets/img/apple-touch-icon.png') }}" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{asset('assets/vendor/bootstrap/css/bootstrap.min.css' ) }}" rel="stylesheet">
  <link href="{{asset('assets/vendor/bootstrap-icons/bootstrap-icons.css' ) }}" rel="stylesheet">
  <link href="{{asset('assets/vendor/boxicons/css/boxicons.min.css' ) }}" rel="stylesheet">
  <link href="{{asset('assets/vendor/quill/quill.snow.css' ) }}" rel="stylesheet">
  <link href="{{asset('assets/vendor/quill/quill.bubble.css' ) }}" rel="stylesheet">
  <link href="{{asset('assets/vendor/remixicon/remixicon.css' ) }}" rel="stylesheet">
  <link href="{{asset('assets/vendor/simple-datatables/style.css' ) }}" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="{{asset('assets/css/style.css' )}}" rel="stylesheet">

  <!-- Tambahkan SweetAlert2 CDN di dalam <head> -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

  <!-- =======================================================
  * Template Name: NiceAdmin
  * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
  * Updated: Apr 20 2024 with Bootstrap v5.3.3
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>
@include('includes.topbar')

  @include('includes.sidebar')
  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Dashboard</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{route('home') }}">Home</a></li>
          <li class="breadcrumb-item active">Dashboard</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
      <div class="row">
  <!-- Sales Card -->
  <div class="col-md-4">
    <div class="card info-card sales-card">
        <div class="card-body">
            <h5 class="card-title">Masuk Hewan <span>| Hari Ini</span></h5>

            <div class="d-flex align-items-center">
                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                    <i class="bi bi-envelope-open"></i> <!-- Ikon Diganti ke Surat Masuk -->
                </div>
                <div class="ps-3">
                    <h6>{{ $totalHewanMasuk}}</h6> <!-- Pastikan variabel digunakan dengan aman -->
                </div>
            </div>
        </div>
    </div>
</div>
 <!-- Revenue Card -->
 <div class="col-md-4">
    <div class="card info-card sales-card">
        <div class="card-body">
            <h5 class="card-title">Keluar Hewan <span>| Hari Ini</span></h5>

            <div class="d-flex align-items-center">
                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                <i class="bi bi-arrow-left-circle"></i><!-- Ikon Diganti ke Surat Keluar -->
                </div>
                <div class="ps-3">
                    <h6>{{ $totalHewanKeluar }}</h6> <!-- Pastikan variabel digunakan dengan aman -->
                </div>
            </div>
        </div>
    </div>
</div>

  <!-- Customers Card -->
  <div class="col-md-4">
    <div class="card info-card customers-card">
        <div class="card-body">
            <h5 class="card-title">User <span>| This Year</span></h5>

            <div class="d-flex align-items-center">
                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                    <i class="bi bi-people"></i>
                </div>
                <div class="ps-3">
                    <h6>{{ $totalUsers }}</h6> 
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<!-- Reports -->
<!-- Reports Section -->
<div class="col-12">
  <div class="row">
    <!-- Card for Hewan Masuk Report (Left) -->
    <div class="col-md-6 mb-4">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title">Reports <span>/ Hewan Masuk</span></h5>
          <div id="hewanMasukChart"></div>
        </div>
      </div>
    </div>

    <!-- Card for Hewan Keluar Report (Right) -->
    <div class="col-md-6 mb-4">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title">Reports <span>/ Hewan Keluar</span></h5>
          <div id="hewanKeluarChart"></div>
        </div>
      </div>
    </div>
  </div>
</div>


@if(isset($hewanMasukData) && isset($hewanKeluarData))
<script>
    document.addEventListener("DOMContentLoaded", function () {
        const hewanMasukData = @json($hewanMasukData);
        const hewanKeluarData = @json($hewanKeluarData);

        // Pastikan data tersedia sebelum menampilkan chart
        if (hewanMasukData.counts.length > 0) {
            var optionsMasuk = {
                chart: {
                    type: 'line',
                    height: 300,
                    toolbar: { show: false }
                },
                colors: ['#28a745'], // Warna hijau
                series: [{
                    name: 'Hewan Masuk',
                    data: hewanMasukData.counts
                }],
                xaxis: {
                    categories: hewanMasukData.dates,
                    title: { text: 'Tanggal' }
                },
                yaxis: {
                    title: { text: 'Jumlah' }
                },
                stroke: {
                    curve: 'smooth'
                }
            };
            new ApexCharts(document.querySelector("#hewanMasukChart"), optionsMasuk).render();
        } else {
            document.querySelector("#hewanMasukChart").innerHTML = "<p class='text-muted'>Tidak ada data</p>";
        }

        if (hewanKeluarData.counts.length > 0) {
            var optionsKeluar = {
                chart: {
                    type: 'line',
                    height: 300,
                    toolbar: { show: false }
                },
                colors: ['#dc3545'], // Warna merah
                series: [{
                    name: 'Hewan Keluar',
                    data: hewanKeluarData.counts
                }],
                xaxis: {
                    categories: hewanKeluarData.dates,
                    title: { text: 'Tanggal' }
                },
                yaxis: {
                    title: { text: 'Jumlah' }
                },
                stroke: {
                    curve: 'smooth'
                }
            };
            new ApexCharts(document.querySelector("#hewanKeluarChart"), optionsKeluar).render();
        } else {
            document.querySelector("#hewanKeluarChart").innerHTML = "<p class='text-muted'>Tidak ada data</p>";
        }
    });
</script>
@endif


        </div><!-- End Left side columns -->
      </div>
    </section>

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer" class="footer">
    <div class="copyright">
      &copy; Copyright <strong><span>by:Irwanti</span></strong>. All Rights Reserved
    </div>
    <div class="credits">
      <!-- All the links in the footer should remain intact. -->
      <!-- You can delete the links only if you purchased the pro version. -->
      <!-- Licensing information: https://bootstrapmade.com/license/ -->
      <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/ -->
    
    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="{{asset('assets/vendor/apexcharts/apexcharts.min.js')}}"></script>
  <script src="{{asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
  <script src="{{asset('assets/vendor/chart.js/chart.umd.js')}}"></script>
  <script src="{{asset('assets/vendor/echarts/echarts.min.js')}}"></script>
  <script src="{{asset('assets/vendor/quill/quill.js')}}"></script>
  <script src="{{asset('assets/vendor/simple-datatables/simple-datatables.js')}}"></script>
  <script src="{{asset('assets/vendor/tinymce/tinymce.min.js')}}"></script>
  <script src="{{asset('assets/vendor/php-email-form/validate.js')}}"></script>

  <!-- Template Main JS File -->
  <script src="{{asset('assets/js/main.js')}}"></script>

</body>

</html>