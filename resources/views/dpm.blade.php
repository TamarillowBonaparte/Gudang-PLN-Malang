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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">


    <!-- Template Main CSS File -->
    <link href="{{asset ('admin/assets/css/style.css')}}" rel="stylesheet">
</head>
<body>

    <!-- ======= Header ======= -->
    @include('header')
    <!-- End Header -->

    <!-- ======= Vendor Sidebar ======= -->
    @include('sidebarvendor')

    <main id="main" class="main">
        <div class="pagetitle">
            <h1>Daftar Permintaan Material</h1>
        </div><!-- End Page Title -->


        <div class="card">
            <div class="card-body">
                <form action="">
                    <div class="row mt-3">
                        <div class="col-5">
                            <label for="nospk" class="form-label">No. SPK</label>
                            <input
                            type="text"
                            name="nospk"
                            id="nospk"
                            class="form-control input-focus mb-2">

                            <label for="jenispkrjn" class="form-label">Jenis Pekerjaan</label>
                            <select class="form-select mb-2 nospk" aria-label="Default select example">
                                <option selected>Pilih</option>
                                <option value="1">SUTR</option>
                                <option value="2">GKS</option>
                                <option value="3">GKU</option>
                                <option value="4">Dll...</option>
                            </select>

                            <label for="idpel" class="form-label">IDPEL</label>
                            <input type="text" name="idpel" id="idpel" class="form-control input-focus mb-2">

                            <label for="nama_pel" class="form-label">Nama Pelanggan</label>
                            <input type="text" name="nama_pel" id="nama_pel" class="form-control input-focus mb-2">

                            <label for="alamat_pel" class="form-label">Alamat Pelanggan</label>
                            <input type="text" name="alamat_pel" id="alamat_pel" class="form-control input-focus mb-2">

                            <div class="row">
                                <div class="col-3">
                                    <label for="pbpd" class="form-label">PB/PD</label>
                                    <select class="form-select mb-2 nospk" aria-label="Default select example">
                                        <<option selected>Pilih</option>
                                        <option value="1">PB</option>
                                        <option value="2">PD</option>
                                    </select>
                                </div>
                                <div class="col">
                                    <label for="dayalama" class="form-label">Tarif/Daya Lama</label>
                                    <input type="text" name="dayalama" id="dayalama" class="form-control input-focus mb-2">
                                </div>
                                <div class="col">
                                    <label for="dayabaru" class="form-label">Tarif/Daya Baru</label>
                                    <input type="text" name="dayabaru" id="dayabaru" class="form-control input-focus mb-2">
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <label for="nospk" class="form-label">Nama Material</label>
                            <input type="text" class="form-control input-focus mb-2" id="search-barang" placeholder="Cari..." autocomplete="off">

                            <div class="row">
                                <div class="col">
                                    <label for="normalisasi" class="form-label">Normalisasi</label>
                                    <input type="text" class="form-control input-focus mb-2" aria-label="Disabled input example" disabled readonly>
                                </div>
                                <div class="col-2">
                                    <label for="satuan" class="form-label">Satuan</label>
                                    <input type="text" class="form-control input-focus mb-2" aria-label="Disabled input example" disabled readonly>
                                </div>
                                <div class="col">
                                    <label for="item" class="form-label">Banyak Diminta</label>
                                    <input type="number" class="form-control input-focus mb-2">
                                </div>
                            </div>
                            <div class="col text-end">
                                <button type="button" class="btn btn-primary">Tambah</button>
                            </div>

          <!-- Tabel Bootstrap di bawah form alamat -->
            <div class="table-responsive mt-3">
            <table class="table table-sm table-bordered">
            <thead>
            <tr>
                <th scope="col">no</th>
                <th scope="col">Nama Material</th>
                <th scope="col">Satuan</th>
                <th scope="col">Banyak Diminta</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td>1</td>
                <td>Material 1</td>
                <td>Pcs</td>
                <td>10</td>
            </tr>
            <tr>
                <td>2</td>
                <td>Material 2</td>
                <td>Kg</td>
                <td>5</td>
            </tr>
            <!-- Tambahkan baris sesuai kebutuhan -->
        </tbody>
    </table>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </main>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.2/dist/sweetalert2.all.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
