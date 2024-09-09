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
    <link href="{{asset ('admin/assets/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset ('admin/assets/vendor/bootstrap-icons/bootstrap-icons.css')}}" rel="stylesheet">
    <link href="{{asset ('admin/assets/vendor/boxicons/css/boxicons.min.css')}}" rel="stylesheet">
    <link href="{{asset ('admin/assets/vendor/quill/quill.snow.css')}}" rel="stylesheet">
    <link href="{{asset ('admin/assets/vendor/quill/quill.bubble.css')}}" rel="stylesheet">
    <link href="{{asset ('admin/assets/vendor/remixicon/remixicon.css')}}" rel="stylesheet">
    <link href="{{asset ('admin/assets/vendor/simple-datatables/style.css')}}" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="{{asset ('admin/assets/css/style.css')}}" rel="stylesheet">

    <style>
        .container {
            position: relative;
            top: 20%;
            margin: auto;
            padding-bottom: 1%;
            border-radius: 0.35em;
            text-align: center;
        }

        #perinput {
            padding: 1%;
        }
    </style>

</head>


<body>

    <!-- ======= Header =======--->
    @include('header')

    <!-- ======= Siderbar =======--->
    @include('sidebar')

    <main id="main" class="main">
        <div class="pagetitle">
            <h1>Setting</h1>
        </div><!-- End Page Title -->

        <nav class="navbar">
            <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('home') }}">Dashboard</a></li>
                <li class="breadcrumb-item active">Setting</li>
            </ul>
        </nav>

        <!-- Recent Sales -->
        <div class="card">
            <div class="card-body">
                <form action="">
                    <div class="row mt-3">
                        <div class="col-5">
                            <label for="kepalaGudang" class="form-label">Kepala Gudang :</label>
                            <!-- Tampilkan nama secara langsung -->
                            <div class="d-flex">
                                <input type="text" id="kepalaGudang" class="form-control mb-2" value="Lia Kurniawati" disabled>
                                <button type="button" class="btn btn-primary ms-2" data-bs-toggle="modal" data-bs-target="#ubahNamaModal">Ubah</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <!-- Modal Pop-up untuk Ubah Nama -->
        <div class="modal fade" id="ubahNamaModal" tabindex="-1" aria-labelledby="ubahNamaModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="ubahNamaModalLabel">Ubah Nama Kepala Gudang</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form>
                            <div class="mb-3">
                                <label for="ubahNama" class="form-label">Nama Kepala Gudang</label>
                                <input type="text" class="form-control" id="ubahNama" value="Lia Kurniawati">
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="button" class="btn btn-primary" id="simpanNama">Simpan</button>
                    </div>
                </div>
            </div>
        </div>
      </main>

        <!-- Include Bootstrap JS and Popper.js -->
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
      <!-- Script JavaScript untuk mengubah nama -->
<script>
    document.getElementById('simpanNama').addEventListener('click', function() {
        // Ambil nilai dari input di dalam modal
        var namaBaru = document.getElementById('ubahNama').value;
        // Ubah nilai di input yang di-disable di form utama
        document.getElementById('kepalaGudang').value = namaBaru;
        // Tutup modal setelah menyimpan
        var modalElement = document.getElementById('ubahNamaModal');
        var modal = bootstrap.Modal.getInstance(modalElement);
        modal.hide();
    });
</script>




    <!-- Include Bootstrap JS and Popper.js -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
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
