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
  <h1>Data Hewan Masuk</h1>
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="{(route('home') }">Home</a></li>
      <li class="breadcrumb-item">Tables</li>
      <li class="breadcrumb-item active">Data</li>
    </ol>
  </nav>
</div><!-- End Page Title -->

<section class="section">
  <div class="row">
    <div class="col-lg-12">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title">Datatables</h5>
          <div class="col-md-6">
    <a href="{{ route('hewan_masuk.create') }}">
        <button class="btn btn-primary ">Tambah</button>
    </a>
    <a href="{{ route('hewan_masuk.export') }}" class="btn btn-success">Ekspor ke Excel</a>
</div>
        <!-- Table with stripped rows -->
          <table class="table datatable">
            <thead>
              <tr>
                <th>No</th>
                <th>
                  <b>J</b>enis Hewan
                </th>
                <th>Asal Hewan</th>
                <th>Kondisi Kesehatan</th>
                <th data-type="date" data-format="DD/MM/YYYY">Tanggal Masuk</th>
                <th>Pemilik Hewan</th>
                <th>Keterangan</th>
                <th>Dokumen</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody>
            @forelse($hewan_masuk as $hewan)
              <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $hewan->jenis_hewan }}</td>
                <td>{{ $hewan->asal_hewan }}</td>
                <td>{{ $hewan->kondisi_kesehatan }}</td>
                <td>{{ $hewan->tanggal_masuk->format('d/m/Y') }}</td>
                <td>{{ $hewan->pemilik_pengantar }}</td>
                <td>{{ $hewan->keterangan }}</td>
                <td><a href="{{ asset('storage/' . $hewan->dokumen) }}" target="_blank">Lihat</a>
                <td><a href="{{ route('hewan_masuk.edit', $hewan->id) }}" class="btn btn-warning btn-sm">Edit</a>
                
                      <form action="{{ route('hewan_masuk.destroy', $hewan->id) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus data ini?')">Hapus</button>
                      </form>    
                </td>
              </tr>
              @empty
              <tr>
                    <td colspan="9" class="text-center">Data tidak tersedia</td>
                  </tr>
              @endforelse
            </tbody>
          </table>
          <!-- End Table with stripped rows -->

        </div>
      </div>

    </div>
  </div>
</section>

</main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer" class="footer">
    <div class="copyright">
      &copy; Copyright <strong><span>by:Irwanti</span></strong>. All Rights Reserved
    </div>
    
  </footer><!-- End Footer -->

  

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