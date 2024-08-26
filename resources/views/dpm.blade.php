<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>PLN ARM MALANG</title>
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
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </main>
    
</body>
</html>