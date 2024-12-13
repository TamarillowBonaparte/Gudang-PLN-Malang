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
      <h1>Daftar Pemakaian Material (K7)</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{ url('home') }}">Dashboard</a></li>
          <li class="breadcrumb-item active">Bon Pemakaian Material (K7)</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section mt-5">
        <div class="row">
          <!-- Kolom untuk tabel pertama -->
          <div class="card">
            <div class="card-body">
                <h5 class="card-title">Riwayat Surat K7</h5>
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
                        @forelse ($suratk7 as $item)
                            <tr>
                                <td>{{ \Carbon\Carbon::parse($item->tgl_diminta)->format('d M Y') }}</td>
                                <td>{{ $item->nmr_k7 }}</td>
                                <td>{{ $item->nm_pelanggan }}</td>
                                <td style="text-align: center">
                                    <a href="{{ route('showK7', ['id' => Crypt::encryptString($item->idk7), 'srtJlnId' => Crypt::encryptString($item->id_surat_jalan)]) }}" target="_blank" class="btn btn-sm btn-outline-primary mb-1">Detail</a>
                                    <a href="{{ route('printk7', ['id' => Crypt::encryptString($item->idk7), 'srtJlnId' => Crypt::encryptString($item->id_surat_jalan)]) }}" class="btn btn-sm btn-outline-secondary">
                                      <i class="bi bi-printer"></i> Print
                                    </a>
                                </td>
                            </tr>
                        @empty
                        <tr>
                            <td>Kosong</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
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
