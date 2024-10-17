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

  <!--Punyak e hover card listener--->
  <style>
    .card {
      transition: background-color 0.3s ease-in-out, color 0.3s ease-in-out; /* Animasi perubahan warna */
    }

    .card.hover-effect:hover {
        background-color: #007bff; /* Warna biru saat hover */
        color: #fff; /* Warna teks saat hover (putih) */
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

    <!--Card Atas Untuk Vendro-->
    <section class="section">
        <div class="row">
          <div class="col-lg-4">
            <a href="{{ url('dpm') }}" class="text-decoration-none">
              <div class="card mb-3 shadow-sm rounded-3 h-100 surat hover-effect">
                <div class="card-body d-flex justify-content-between align-items-center">
                  <!-- Ikon di kiri -->
                  <div class="icon">
                    <img src="{{asset ('admin/assets/img/delivered 1.png')}}" alt="Gambar 1" class="img-fluid" style="width: 40px;">
                  </div>
                  <!-- Teks di kanan -->
                  <div class="text-end">
                    <h5 class="card-title mb-1">7</h5>
                    <p class="card-text">Total DPM</p>
                  </div>
                </div>
              </div>
            </a>
          </div>

          <div class="col-lg-4">
            <a href="{{ url('k7') }}" class="text-decoration-none">
              <div class="card mb-3 shadow-sm rounded-3 h-100 surat hover-effect">
                <div class="card-body d-flex justify-content-between align-items-center">
                  <!-- Ikon di kiri -->
                  <div class="icon">
                    <img src="{{asset ('admin/assets/img/bekas.png')}}" alt="Gambar 2" class="img-fluid" style="width: 40px;">
                  </div>
                  <!-- Teks di kanan -->
                  <div class="text-end">
                    <h5 class="card-title mb-1">$3,287.49</h5>
                    <p class="card-text">Total K7</p>
                  </div>
                </div>
              </div>
            </a>
          </div>

          <div class="col-lg-4">
            <a href="{{ url('k3') }}" class="text-decoration-none">
              <div class="card mb-3 shadow-sm rounded-3 h-100 surat hover-effect">
                <div class="card-body d-flex justify-content-between align-items-center">
                  <!-- Ikon di kiri -->
                  <div class="icon">
                    <img src="{{asset ('admin/assets/img/exchange 1.png')}}" alt="Gambar 3" class="img-fluid" style="width: 40px;">
                  </div>
                  <!-- Teks di kanan -->
                  <div class="text-end">
                    <h5 class="card-title mb-1">15</h5>
                    <p class="card-text">Total K3</p>
                  </div>
                </div>
              </div>
            </a>
          </div>
        </div>
      </section>



    <section class="section mt-5">
        <div class="row">
          <!-- Kolom untuk tabel pertama -->
          <div class="col-lg-6">
            <div class="card">
              <div class="card-body">
                <h5 class="card-title">Riwayat Terakhir Daftar Permintaan Material (DPM)</h5>
                <!-- Tabel pertama -->
                <table class="table datatable">
                  <thead>
                    <tr>
                      <th>Tanggal</th>
                      <th>Nomor DPB</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                    @forelse ($suratDpm as $surat)
                    <tr>
                      <td>{{$surat->tgl_diminta}}</td>
                      <td>{{$surat->nomor_dpb}}</td>
                      <td>
                        <a href="{{ route('vendor.show', Crypt::encryptString($surat->id_dpb)) }}" class="btn btn-outline-primary mb-1">Detail</a>
                        <a href="{{ route('print', Crypt::encryptString($surat->id_dpb)) }}" class="btn btn-outline-success"><i class="bi bi-download"></i></a>

                      </td>
                    </tr>
                    @empty
                    <tr>
                      <td colspan="3">Data tidak ditemukan</td>
                    </tr>
                    @endforelse
                  </tbody>
                </table>
                <!-- End Tabel pertama -->
              </div>
            </div>
          </div>

          <!-- Kolom untuk tabel kedua -->
          <div class="col-lg-6">
            <div class="card">
              <div class="card-body">
                <h5 class="card-title">Riwayat Terakhir Daftar Pemakaian Material (K7) </h5>
                <!-- Tabel kedua -->
                <table class="table datatable">
                  <thead>
                    <tr>
                      <th>Tanggal</th>
                      <th>Nomor DPB</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                    @forelse ($suratDpm as $surat)
                    <tr>
                      <td>{{$surat->tgl_diminta}}</td>
                      <td>{{$surat->nomor_dpb}}</td>
                      <td>
                        <a href="{{ route('vendor.show', Crypt::encryptString($surat->id_dpb)) }}" class="btn btn-outline-primary mb-1">Detail</a>
                        <a href="{{ route('print', Crypt::encryptString($surat->id_dpb)) }}" class="btn btn-outline-success"><i class="bi bi-download"></i></a>
                      </td>
                    </tr>
                    @empty
                    <tr>
                      <td colspan="3">Data tidak ditemukan</td>
                    </tr>
                    @endforelse
                  </tbody>
                </table>
                <!-- End Tabel kedua -->
              </div>
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
          this.style.backgroundColor = '#007bff';  // Ubah ke biru saat hover
          this.style.color = '#fff';               // Ubah teks menjadi putih
        });

        card.addEventListener('mouseleave', function() {
          this.style.backgroundColor = '';         // Kembali ke warna default
          this.style.color = '';                   // Kembali ke warna teks default
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
