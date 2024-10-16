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
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">


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
        body {
            font-family: 'Roboto', sans-serif;
        margin: 0;
        padding: 0;
    }

        .a4 {
            width: 297mm;
            height: 210mm;
            margin: auto;
            padding: 10mm;
            box-sizing: border-box;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            font-size: 10px;
        }

        th, td {
            font-size: 10px;
            border: 1px solid black;
            padding: 5px;
            text-align: center;
        }


    </style>
    </head>
<body>

   <!-- ======= Header ======= -->
    @include('header')
    <!-- End Header -->

    <!-- ======= Vendor Sidebar ======= -->
    @include('sidebarvendor')

    <div class="a4">
        <table class="nourut-table">
            <thead>
                <tr>
                    <th style="vertical-align: bottom; padding: 0; line-height: 2; border-bottom: none;">No.</th>
                    <th style="vertical-align: bottom; padding: 0; line-height: 1; border-bottom: none;" colspan="5">Nama Barang</th>
                    <th style="vertical-align: bottom; padding: 0; line-height: 1; border-bottom: none;" colspan="2">No.</th>
                    <th style="vertical-align: bottom; padding: 0; line-height: 1; border-bottom: none;">Sa-</th>
                    <th style="padding: 0; line-height: 2;" colspan="6">Banyaknya yang diminta</th>
                    <th style="padding: 0; line-height: 2;" colspan="6">Banyaknya yang diterima</th>
                    <th style="vertical-align: bottom; padding: 0; line-height: 1; border-bottom: none;" colspan="3">Jumlah Uang</th>
                </tr>
                <tr>
                    <th style="vertical-align: top; padding: 0; line-height: 1; border-top: none; border-bottom: none;">Urut</th>
                    <th style="vertical-align: top; padding: 0; line-height: 1; border-top: none; border-bottom: none;" colspan="5">(ditulis selengkap - lengkapnya)</th>
                    <th style="vertical-align: top; padding: 0; line-height: 1; border-top: none; border-bottom: none;" colspan="2">Normalisasi</th>
                    <th style="vertical-align: top; padding: 0; line-height: 1; border-top: none; border-bottom: none;">tuan</th>
                    <th style="padding: 0; line-height: 2;" colspan="3">dengan angka</th>
                    <th style="padding: 0; line-height: 2;" colspan="3">dengan tulisan</th>
                    <th style="padding: 0; line-height: 2;" colspan="3">dengan angka</th>
                    <th style="padding: 0; line-height: 2;" colspan="3">dengan tulisan</th>
                    <th style="vertical-align: top; padding: 0; line-height: 1; border-top: none; border-bottom: none;" colspan="3">Rp.</th>
                </tr>
            </thead>


            <!--isian-->
        <tbody>
            <tr>
                <td></td>
                <td colspan="5"></td>
                <td colspan="2"></td>
                <td></td>
                <td colspan="3"></td>
                <td colspan="3"></td>
                <td colspan="3"></td>
                <td colspan="3"></td>
                <td colspan="3"></td>
            </tr>
            <tr>
                <td>1</td>
                <td colspan="5">BDC 3X70+1X70</td>
                <td colspan="2">3070151</td>
                <td>M</td>
                <td colspan="3">7</td>
                <td colspan="3">Tujuh Koma Nul</td>
                <td colspan="3"></td>
                <td colspan="3"></td>
                <td colspan="3"></td>
            </tr>
            <tr>
                <td style="border-top: none; border-bottom: none;"></td>
                <td colspan="3" style="border: none;">Vendor</td>
                <td style="border: none;">:</td>
                <td colspan="7" style="border: none;">PT. Budiono Siregar</td>
                <td colspan="3" style="border-top: none; border-bottom: none;">MERK MATERIAL :</td>
                <td colspan="2" style="border-top: none; border-bottom: none;"></td>
                <td colspan="2" style="border-top: none; border-bottom: none;"></td>
                <td colspan="3" style="border-top: none; border-bottom: none;"style="border: none;"></td>
            </tr>
            <tr>
                <td style="border-top: none; border-bottom: none;"></td>
                <td colspan="3" style="border: none;">No. SPK</td>
                <td style="border: none;">:</td>
                <td colspan="7" style="border: none;">0839.KR/DAH.01.03/F04070000/2022 035/PK/REN.UP3-MLG/2023</td>
                <td colspan="3" style="border-top: none; border-bottom: none;">NOMER RESERVASI :</td>
                <td colspan="2" style="border-top: none; border-bottom: none;"></td>
                <td colspan="2" style="border-top: none; border-bottom: none;"></td>
                <td colspan="3" style="border-top: none; border-bottom: none;"style="border: none;"></td>
            </tr>
            <tr>
                <td style="border-top: none; border-bottom: none;"></td>
                <td colspan="3" style="border: none;">JENIS PEKERJAAN</td>
                <td style="border: none;">:</td>
                <td colspan="7" style="border: none;">SUTR</td>
                <td colspan="3" style="border-top: none; border-bottom: none;">KERTERANGAN :</td>
                <td colspan="2" style="border-top: none; border-bottom: none;"></td>
                <td colspan="2" style="border-top: none; border-bottom: none;"></td>
                <td colspan="3" style="border-top: none; border-bottom: none;"style="border: none;"></td>
            </tr>
            <tr>
                <td style="border-top: none; border-bottom: none;"></td>
                <td colspan="3" style="border: none;">ID PEL</td>
                <td style="border: none;">:</td>
                <td colspan="7" style="border: none;">KOL/51312/202221231/04440</td>
                <td colspan="3" style="border-top: none; border-bottom: none;"></td>
                <td colspan="2" style="border-top: none; border-bottom: none;"></td>
                <td colspan="2" style="border-top: none; border-bottom: none;"></td>
                <td colspan="3" style="border-top: none; border-bottom: none;"style="border: none;"></td>
            </tr>
            <tr>
                <td style="border-top: none; border-bottom: none;"></td>
                <td colspan="3" style="border: none;">NAMA PELANGGAN</td>
                <td style="border: none;">:</td>
                <td colspan="7" style="border: none;">WISNU HADI MAHENDRA</td>
                <td colspan="3" style="border-top: none; border-bottom: none;"></td>
                <td colspan="2" style="border-top: none; border-bottom: none;"></td>
                <td colspan="2" style="border-top: none; border-bottom: none;"></td>
                <td colspan="3" style="border-top: none; border-bottom: none;"style="border: none;"></td>
            </tr>
            <tr>
                <td style="border-top: none; border-bottom: none;"></td>
                <td colspan="3" style="border: none;">ALAMAT PELANGGAN</td>
                <td style="border: none;">:</td>
                <td colspan="7" style="border: none;">Jl. Satu-satu</td>
                <td colspan="3" style="border-top: none; border-bottom: none;"></td>
                <td colspan="2" style="border-top: none; border-bottom: none;"></td>
                <td colspan="2" style="border-top: none; border-bottom: none;"></td>
                <td colspan="3" style="border-top: none; border-bottom: none;"style="border: none;"></td>
            </tr>
            <tr>
                <td style="border-top: none; border-bottom: none;"></td>
                <td colspan="3" style="border: none;">DAYA</td>
                <td style="border: none;">:</td>
                <td  style="border: none;">PB</td>
                <td colspan="2" style="border: none;"></td>
                <td  style="border: none;">ke</td>
                <td style="border: none;"></td>
                <td style="border: none;"></td>
                <td  style="border: none;">10 x RIT /1300 VA</td>
                <td colspan="3" style="border-top: none; border-bottom: none;"style="border: none;"></td>
                <td colspan="2" style="border-top: none; border-bottom: none;"></td>
                <td colspan="2" style="border-top: none; border-bottom: none;"></td>
                <td colspan="3" style="border-top: none; border-bottom: none;"style="border: none;"></td>
            </tr>
            <tr>
                <td style="border-top: none; border-bottom: none;"></td>
                <td colspan="3" style="border: none;">ULP</td>
                <td style="border: none;">:</td>
                <td  style="border: none;">ULP BELIMBING</td>
                <td colspan="2" style="border: none;"></td>
                <td  style="border: none;">14055</td>
                <td style="border: none;"></td>
                <td style="border: none;"></td>
                <td  style="border: none;"></td>
                <td colspan="3" style="border-top: none; border-bottom: none;"style="border: none;"></td>
                <td colspan="2" style="border-top: none; border-bottom: none;"></td>
                <td colspan="2" style="border-top: none; border-bottom: none;"></td>
                <td colspan="3" style="border-top: none; border-bottom: none;"style="border: none;"></td>
            </tr>
            <!---Anjay-->
            <tr>
                <td colspan="3" style="border-bottom: none;">Banyak Jenis</td>
                <td colspan="4" style="border-bottom: none;">Sifat Pekerjaan</td>
                <td style="border-bottom: none;">No. PK :</td>
                <td  style="border-bottom: none;">Nomer e wlwlwlwlwlwl</td>
                <td colspan="2"></td>
                <td ></td>
                <td colspan="3">No.git  Urut</td>
                <td colspan="4"></td>
                <td colspan="3" >KODE PERKIRAAN</td>
            </tr>
            <tr>
                <td colspan="3" style="border-bottom: none;">Barang :</td>
                <td colspan="4" style="border-bottom: none;">Pas.Baru/Perluasan/Perbaikan/Pamel/JBST Pembongkaran.</td>
                <td style="border-bottom: none;"></td>
                <td  style="border-bottom: none;">Nomer e wlwlwlwlwlwl</td>
                <td colspan="2"></td>
                <td ></td>
                <td colspan="3">SKI/SKP/PKP/PFK</td>
                <td></td>
                <td colspan="3">No. P. K</td>
                <td colspan="3" >KODE PERKIRAAN</td>
            </tr>
            <tr>
                <td colspan="3" style="border-bottom: none;"></td>
                <td colspan="4" style="border-bottom: none;"></td>
                <td colspan="7">No. PDL.</td>
                <td colspan="3"></td>
                <td></td>
                <td colspan="3">No. P. K</td>
                <td colspan="3" >KODE PERKIRAAN</td>
            </tr>
            <tr>
                <td>Setuju</td>
                <td>:</td>
                <td>Asman Kontruksi</td>
                <td></td>
                <td>Kepala Gudang :</td>
                <td></td>
                <td></td>
                <td></td>
                <td>Pemerihaan :</td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
        </tbody>
    </div>
</body>
</html>
