<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Components / Accordion - NiceAdmin Bootstrap Template</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="{{asset ('admin/assets/img/favicon.png')}}" rel="icon">
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

  <!-- Template Main CSS File -->
  <link href="{{asset ('admin/assets/css/style.css')}}" rel="stylesheet">
</head>

<body>

  <!-- ======= Header ======= -->
  @include('header')
  <!-- End Header -->

  <!-- ======= Sidebar ======= -->


  <main id="main" class="main">
    <div class="pagetitle">
      <h1>Vendor</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item active">Vendor</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <!--Card Atas Untuk Vendro-->
    <section class="section">
      <div class="row">
        <div class="col-lg-4">
          <a href="https://example.com/link1" target="_blank" class="text-decoration-none">
            <div class="card text-white bg-primary mb-3 h-100">
              <div class="card-body d-flex flex-column justify-content-center align-items-center text-center">
                <img src="{{asset ('admin/assets/img/delivered 1.png')}}" alt="Gambar 1" class="img-fluid mb-3">
                <h5 class="card-title">DPM/DPB</h5>
              </div>
            </div>
          </a>
        </div>
        <div class="col-lg-4">
          <a href="https://example.com/link2" target="_blank" class="text-decoration-none">
            <div class="card text-dark bg-warning mb-3 h-100">
              <div class="card-body d-flex flex-column justify-content-center align-items-center text-center">
                <img src="{{asset ('admin/assets/img/tools 2.png')}}" alt="Gambar 2" class="img-fluid mb-3">
                <h5 class="card-title">K7</h5>
              </div>
            </div>
          </a>
        </div>
        <div class="col-lg-4">
          <a href="https://example.com/link3" target="_blank" class="text-decoration-none">
            <div class="card text-white bg-success mb-3 h-100">
              <div class="card-body d-flex flex-column justify-content-center align-items-center text-center">
                <img src="{{asset ('admin/assets/img/exchange 1.png')}}" alt="Gambar 3" class="img-fluid mb-3">
                <h5 class="card-title">K3</h5>
              </div>
            </div>
          </a>
        </div>
      </div>
    </section>
    <section class="section mt-5">
      <div class="row">
        <div class="col-lg-12">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">History Terakhir</h5>
              <!-- Table with stripped rows -->
              <table class="table datatable">
                <thead>
                  <tr>
                    <th><b>Tanggal</b></th>
                    <th><b>Jenis Surat</b></th>
                    <th>Nomer</th>
                    <th>Nama Pelanggan</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>12 Agustus 2024</td>
                    <td>DPM</td>
                    <td>3008</td>
                    <td>Slamet Dunia</td>
                  </tr>
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
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <script>
    document.addEventListener('DOMContentLoaded', function() {
  const cards = document.querySelectorAll('.card');

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
  <script src="{{asset ('admin/assets/js/main.js')}}"></script>
</body>
</html>
