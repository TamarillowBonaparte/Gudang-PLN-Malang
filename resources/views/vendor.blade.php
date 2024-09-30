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
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">

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
                        <div class="card text-white bg-primary mb-3 h-100 surat">
                            <div
                                class="card-body d-flex flex-column justify-content-center align-items-center text-center">
                                <img src="{{asset ('admin/assets/img/delivered 1.png')}}" alt="Gambar 1"
                                    class="img-fluid mb-3">
                                <h5 class="card-title">DPM/DPB</h5>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-4">
                    <a href="{{ url('k7') }}" class="text-decoration-none">
                        <div class="card text-dark bg-warning mb-3 h-100 surat">
                            <div
                                class="card-body d-flex flex-column justify-content-center align-items-center text-center">
                                <img src="{{asset ('admin/assets/img/tools 2.png')}}" alt="Gambar 2"
                                    class="img-fluid mb-3">
                                <h5 class="card-title">K7</h5>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-4">
                    <div class="card text-white bg-success mb-3 h-100 surat">
                        <div class="card-body d-flex flex-column justify-content-center align-items-center text-center">
                            <img src="{{asset ('admin/assets/img/exchange 1.png')}}" alt="Gambar 3"
                                class="img-fluid mb-3">
                            <h5 class="card-title">K3</h5>
                        </div>
                    </div>
                </div>
            </div>
            </div>
        </section>
        <section class="section mt-5">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">History Terakhir Daftar Permintaan Material (DPM)</h5>
                            <!-- Table with stripped rows -->
                            <table class="table datatable">
                                <thead>
                                    <tr>
                                        <th>Tanggal</th>
                                        <th>Nomor DPB</th>
                                        <th>Jenis Pekerjaan</th>
                                        <th>Nama Pelanggan</th>
                                        <th>Alamat Pelanggan</th>
                                        <th>ULP</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($suratDpm as $surat)
                                    <tr>
                                        <td>{{\Carbon\Carbon::parse($surat->tgl_diminta)->format('d M Y')}}</td>
                                        <td>{{$surat->nomor_dpb}}</td>
                                        <td>{{$surat->jnspkrjaan}}</td>
                                        <td>{{$surat->nama_pelanggan}}</td>
                                        <td>{{$surat->alamat_pelanggan}}</td>
                                        <td>{{$surat->ulpnama}}</td>
                                        <td>
                                            <a href="{{ route('vendor.show', Crypt::encryptString($surat->id_dpb)) }}" class="btn btn-outline-primary mb-1">Detail</a>
                                            <a href="{{ route('print', Crypt::encryptString($surat->id_dpb))}}" class="btn btn-outline-success"><i class="bi bi-download"></i></a>
                                        </td>
                                    </tr>
                                    @empty

                                    @endforelse
                                </tbody>
                            </table>
                            <!-- End Table with stripped rows -->
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main> <!-- End #main -->

    <!-- ======= Footer ======= -->
    @include('footer')
    </footer><!-- End Footer -->

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const cards = document.querySelectorAll('.surat');

            cards.forEach(card => {
                card.addEventListener('mouseenter', function () {
                    this.style.transition = 'transform 0.3s ease-in-out';
                    this.style.transform = 'scale(1.05)';
                });

                card.addEventListener('mouseleave', function () {
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
