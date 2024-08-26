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
    <style>
        .table th, .table td {
            border: 1px solid black;
            padding: 5px;
            vertical-align: middle;
        }
        .table {
            margin: auto;
            width: 95%;
            border-collapse: collapse;
        }
        .title {
            text-align: center;
            font-weight: bold;
        }
        .no-border {
            border: none !important;
        }
    </style>
</head>
<body>

    <!-- ======= Header ======= -->
    @include('header')
    <!-- End Header -->

    <!-- ======= Vendor Sidebar ======= -->
    @include('sidebarvendor')

    <div class="container mt-4">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th colspan="8" class="text-left">
                        TUG 5
                    </th>
                    <th colspan="5" class="text-right">
                        TUG 5. MLG23-0046
                    </th>
                </tr>
                <tr>
                    <th colspan="2">Tanggal diminta</th>
                    <th colspan="3"></th>
                    <th colspan="2">Tanggal diberikan</th>
                    <th colspan="3"></th>
                </tr>
                <tr>
                    <th colspan="3">Kepada :</th>
                    <th colspan="6">Harap dikirim ke :</th>
                    <th>Kode Jurnal</th>
                </tr>
                <tr>
                    <th colspan="3">PT. PLN (Persero) UP3 Malang</th>
                    <th colspan="6">PT. ANINDO BERTAHANUTS PERKASA</th>
                    <th></th>
                </tr>
                <tr>
                    <th colspan="3">Gudang PLN Aries Munandar</th>
                    <th colspan="6">Jl. Dansu Toba 8-19 Malang</th>
                    <th></th>
                </tr>
                <tr>
                    <th colspan="3">Alamat :</th>
                    <th colspan="6">Alamat :</th>
                    <th></th>
                </tr>
                <tr>
                    <th>No. Urut</th>
                    <th colspan="3">Nama Barang<br><small>(ditulis selengkap-lengkapnya)</small></th>
                    <th>Normalisasi</th>
                    <th colspan="2">Banyaknya yang diminta</th>
                    <th colspan="2">Banyaknya yang diterima</th>
                    <th colspan="2">Jumlah Uang</th>
                </tr>
                <tr>
                    <th></th>
                    <th></th>
                    <th>Satuan</th>
                    <th>Dengan Angka</th>
                    <th>Dengan Huruf</th>
                    <th>Dengan Angka</th>
                    <th>Dengan Huruf</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1</td>
                    <td colspan="3">PIN PORC</td>
                    <td>BH</td>
                    <td>6</td>
                    <td>Tujuh</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td>2</td>
                    <td colspan="3">HANG ISOLATOR</td>
                    <td>BH</td>
                    <td>7</td>
                    <td>Dua Empat</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td>3</td>
                    <td colspan="3">AAACS 150</td>
                    <td>M</td>
                    <td>24</td>
                    <td>Nol</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="11" class="no-border"></td>
                </tr>
                <tr>
                    <td colspan="4">VENDOR</td>
                    <td colspan="4">No. SPK</td>
                    <td colspan="3">WPK MATERIAL:</td>
                </tr>
                <tr>
                    <td colspan="4">PT. ANINDO BERTAHANUTS PERKASA</td>
                    <td colspan="4">637/KR/DAN.01.03.00/2022 - 018/PK/REN.UP3-MLG/2023</td>
                    <td colspan="3"></td>
                </tr>
                <tr>
                    <td colspan="4">JENIS PEKERJAAN</td>
                    <td colspan="4">NO. SPJ</td>
                    <td colspan="3"></td>
                </tr>
                <tr>
                    <td colspan="4">IDPEL</td>
                    <td colspan="4">133980021378</td>
                    <td colspan="3"></td>
                </tr>
                <tr>
                    <td colspan="4">NAMA PELANGGAN</td>
                    <td colspan="4">IR SANDOJO SUSANTO (STARBUCKS)</td>
                    <td colspan="3"></td>
                </tr>
                <tr>
                    <td colspan="4">ALAMAT PELANGGAN</td>
                    <td colspan="4">JL. DIPONEGORO NO.173, SISIR, BATU</td>
                    <td colspan="3"></td>
                </tr>
                <tr>
                    <td colspan="4">ULP</td>
                    <td colspan="4">ULP BATU</td>
                    <td colspan="3"></td>
                </tr>
                <tr>
                    <td colspan="4">Banyak jenis barang:</td>
                    <td colspan="4">3</td>
                    <td colspan="3"></td>
                </tr>
                <tr>
                    <td colspan="4">Setuju :</td>
                    <td colspan="4"></td>
                    <td colspan="3">No. P. K</td>
                </tr>
                <tr>
                    <td colspan="4">Asman Konstruksi</td>
                    <td colspan="4">Kepala Gudang</td>
                    <td colspan="3"></td>
                </tr>
                <tr>
                    <td colspan="4">GATOT HARYANTO</td>
                    <td colspan="4">MONIKA ROHATIUS</td>
                    <td colspan="3"></td>
                </tr>
            </tfoot>
        </table>
    </div>



</body>
</html>
