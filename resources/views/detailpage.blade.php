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
      transition: background-color 0.3s ease-in-out, color 0.3s ease-in-out;
      /* Animasi perubahan warna */
    }

    .card.hover-effect:hover {
      background-color: #007bff;
      /* Warna biru saat hover */
      color: #fff;
      /* Warna teks saat hover (putih) */
    }

    .left-side {
      background-size: cover;
      background-position: center;
      height: 100vh;
    }

    .right-side {
      display: flex;
      align-items: center;
      justify-content: center;
      padding: 30px;
    }

    .description {
      max-width: 500px;
      text-align: justify;
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

    <div class="row vh-100">
      <!-- Sisi Kiri: Gambar -->
      <div class="col-md-6 left-side">
        @forelse ($suratDPM as $surat)
        <img src="{{ route('surat.image', ['id' => $surat->id]) }}" alt="Gambar Kerangka Surat" />
        @empty

        @endforelse
      </div>

      <!-- Sisi Kanan: Penjelasan -->
      <div class="col-md-6 right-side bg-light">
        <div class="description">
          <h2>Judul Penjelasan</h2>
          <p>
            Ini adalah penjelasan dari gambar yang ada di sisi kiri. Anda bisa menjelaskan detail tentang gambar tersebut di sini, misalnya latar belakang, fungsinya, atau alasan kenapa gambar itu penting. Bagian ini dapat diisi dengan teks yang panjang atau pendek sesuai kebutuhan.
          </p>
          <p>
            Desain ini responsif dan akan menyesuaikan dengan berbagai ukuran layar. Pada layar yang lebih kecil, gambar dan penjelasan mungkin akan ditampilkan dalam susunan vertikal (gambar di atas, penjelasan di bawah).
          </p>
        </div>
      </div>
    </div>

  </main> <!-- End #main -->

  <!--Hover Listernernya-->
  <script>
    document.addEventListener('DOMContentLoaded', function() {
      const cards = document.querySelectorAll('.hover-effect');

      cards.forEach(card => {
        card.addEventListener('mouseenter', function() {
          this.style.backgroundColor = '#007bff'; // Ubah ke biru saat hover
          this.style.color = '#fff'; // Ubah teks menjadi putih
        });

        card.addEventListener('mouseleave', function() {
          this.style.backgroundColor = ''; // Kembali ke warna default
          this.style.color = ''; // Kembali ke warna teks default
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