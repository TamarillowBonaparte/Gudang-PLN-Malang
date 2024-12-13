<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>PLN ARM MALANG</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="{{ asset('admin/assets/img/logo pln.png') }}" rel="icon">
  <link href="{{ asset('admin/assets/img/apple-touch-icon.png') }}" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{ asset ('admin/assets/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
  <link href="{{ asset ('admin/assets/vendor/bootstrap-icons/bootstrap-icons.css')}}" rel="stylesheet">
  <link href="{{ asset ('admin/assets/vendor/boxicons/css/boxicons.min.css')}}" rel="stylesheet">
  <link href="{{ asset ('admin/assets/vendor/quill/quill.snow.css')}}" rel="stylesheet">
  <link href="{{ asset ('admin/assets/vendor/quill/quill.bubble.css')}}" rel="stylesheet">
  <link href="{{ asset ('admin/assets/vendor/remixicon/remixicon.css')}}" rel="stylesheet">
  <link href="{{ asset ('admin/assets/vendor/simple-datatables/style.css')}}" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="{{ asset ('admin/assets/css/style.css')}}" rel="stylesheet">

    <style>
        .tblefrmt {
            font-size: 14px;
        }
    </style>
</head>

<body>

  <!--Header-->
  @include('header')
  <!--End Header-->

<!-- ======= Sidebar ======= -->
  @include('sidebar')
<!-- ======= End Sidebar ======= -->

  <main id="main" class="main">
    <div class="pagetitle">
      <h1>Daftar Pengembalian Material (K3)</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{ url('home') }}">Dashboard</a></li>
          <li class="breadcrumb-item active">Bon Pengembalian Material</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
        <div class="col-lg-12">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Tabel Riwayat Pengembalian Bon Pengembalian Material (K3)</h5>

              <!-- Table with stripped rows -->
              <table class="table datatable">
                <thead>
                    <tr>
                        <th>Tanggal Diminta</th>
                        <th>Nomor Bon</th>
                        <th>Nama Pelanggan</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($suratk3 as $item)
                        <tr>
                            <td>{{ \Carbon\Carbon::parse($item->tgl_diminta)->format('d M Y') }}</td>
                            <td>{{ $item->nmr_k3 }}</td>
                            <td>{{ $item->nm_pelanggan }}</td>
                            <td>
                                <a href="{{ route('showk3', ['id' => Crypt::encryptString($item->idk3)]) }}" class="btn btn-outline-primary mb-1">Detail</a>
                            </td>
                        </tr>
                    @empty
                    <tr>
                        <td>Kosong</td>
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
  </main>  <!-- End #main -->

  <!-- ======= Footer ======= -->
 @include('footer')

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="{{ asset ('admin/assets/vendor/apexcharts/apexcharts.min.js')}}"></script>
  <script src="{{ asset ('admin/assets/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
  <script src="{{ asset ('admin/assets/vendor/chart.js/chart.umd.js')}}"></script>
  <script src="{{ asset ('admin/assets/vendor/echarts/echarts.min.js')}}"></script>
  <script src="{{ asset ('admin/assets/vendor/quill/quill.js')}}"></script>
  <script src="{{ asset ('admin/assets/vendor/simple-datatables/simple-datatables.js')}}"></script>
  <script src="{{ asset ('admin/assets/vendor/tinymce/tinymce.min.js')}}"></script>
  <script src="{{ asset ('admin/assets/vendor/php-email-form/validate.js')}}"></script>
  <!-- Template Main JS File -->
  <script src="{{ asset ('admin/assets/js/main.js')}}"></script>
</body>
</html>
