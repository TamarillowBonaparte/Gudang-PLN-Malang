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
  <link href="{{asset ('admin/assets/img/apple-touch-icon.png')}}" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{asset ('admin/assets/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
  <link href="{{asset ('admin/assets/vendor/bootstrap-icons/bootstrap-icons.css')}}" rel="stylesheet">
  <link href="{{asset ('admin/assets/vendor/boxicons/css/boxicons.min.css')}}" rel="stylesheet">
  <link href="{{asset ('admin/assets/vendor/quill/quill.snow.css')}}" rel="stylesheet">
  <link href="{{asset ('admin/assets/vendor/quill/quill.bubble.css')}}" rel="stylesheet">
  <link href="{{asset ('admin/assets/vendor/remixicon/remixicon.css')}}" rel="stylesheet">
  <link href="{{asset ('admin/assets/vendor/simple-datatables/style.css')}}" rel="stylesheet">

 <!--Punyak e hover card listener-->
<style>
    .card {
      transition: background-color 0.3s ease-in-out, color 0.3s ease-in-out; /* Animasi perubahan warna */
    }

    /* Hover effect khusus untuk setiap card */
    .card.hover-effect-dpm:hover {
      background-color: #d9ead3; /* Warna hijau muda saat hover */
      color: #000; /* Warna teks saat hover */
    }

    .card.hover-effect-k7:hover {
      background-color: #f2dbdb; /* Warna merah muda saat hover */
      color: #000; /* Warna teks saat hover */
    }

    .card.hover-effect-k3:hover {
      background-color: #ffc000; /* Warna kuning saat hover */
      color: #000; /* Warna teks saat hover */
    }

    /* Sembunyikan dropdown untuk opsi jumlah item */
.dataTable-dropdown {
    display: none !important;
}

  </style>



  <!-- Template Main CSS File -->
  <link href="{{asset ('admin/assets/css/style.css')}}" rel="stylesheet">
</head>

<body>
<!-- ======= Header =======-->
    @include('header')

<!-- ======= Sidebar ======= -->
    @include('sidebarvendor')

<main id="main" class="main">
    <div class="pagetitle">
      <h1>Dashboard</h1>
    </div>
    <!-- End Page Title -->

    <section class="section mt-5">
        <div class="row">
          <!-- Kolom untuk tabel pertama -->
          <div class="card">
            <div class="card-body">
                <h5 class="card-title">Riwayat Surat DPM/DPB</h5>
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
                        @forelse ($suratDpm as $item)
                            <tr>
                                <td>{{ \Carbon\Carbon::parse($item->tgl_diminta)->format('d M Y') }}</td>
                                <td>{{ $item->nomor_dpb }}</td>
                                <td>{{ $item->nama_pelanggan }}</td>
                                <td>
                                    <a href="{{ route('show', ['id' => Crypt::encryptString($item->id_dpb_suratjalan), 'srtJlnId' => Crypt::encryptString($item->idsrtjln)]) }}" class="btn btn-outline-primary mb-1">Detail</a>
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

  <!--Hover Listernernya-->
  <script>
   document.addEventListener('DOMContentLoaded', function() {
    const cards = document.querySelectorAll('.hover-effect');

      cards.forEach(card => {
        card.addEventListener('mouseenter', function() {
        });

        card.addEventListener('mouseleave', function() {
        });
      });
    });
  </script>

  <!-- ======= Footer ======= -->
 @include('footer')
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <script>
    document.addEventListener('DOMContentLoaded', function() {
      const cards = document.querySelectorAll('.surat');

      cards.forEach(card => {
        card.addEventListener('mouseenter', function() {
          this.style.transition = 'transform 0.3s ease-in-out';
          this.style.transform = 'scale(1.05)';
        });

        card.addEventListener('mouseleave', function() {
          this.style.transition = 'transform 0.3s ease-in-out';
          this.style.transform = 'scale(1)';
        });
      });
    });
  </script>

  <!-- Vendor JS Files -->
  <script src="{{asset ('admin/assets/vendor/apexcharts/apexcharts.min.js')}}"></script>
  <script src="{{asset ('admin/assets/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
  <script src="{{asset ('admin/assets/vendor/chart.js/chart.umd.js')}}"></script>
  <script src="{{asset ('admin/assets/vendor/echarts/echarts.min.js')}}"></script>
  <script src="{{asset ('admin/assets/vendor/quill/quill.js')}}"></script>
  <script src="{{asset ('admin/assets/vendor/simple-datatables/simple-datatables.js')}}"></script>
  <script src="{{asset ('admin/assets/vendor/tinymce/tinymce.min.js')}}"></script>
  <script src="{{asset ('admin/assets/vendor/php-email-form/validate.js')}}"></script>
  <!-- Template Main JS File -->
  <script src="{{asset ('admin/assets/js/main.js')}}"></script>btn btn-outline-success
</body>
</html>
