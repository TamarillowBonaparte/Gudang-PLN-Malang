<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>TUG (Tata Usaha Gudang ) 5</title>
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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

    <link href="https://fonts.googleapis.com/css2?family=Roboto+Mono&display=swap" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="{{asset ('admin/assets/css/style.css')}}" rel="stylesheet">

    <style>

        @page {
            size: A4 landscape;
            margin: 10mm;
            margin-left: 5mm;
            margin-right: 5mm
        }

        @media print {
            html, body {
                height:100vh;
                margin: 0 !important;
                padding: 0 !important;
                overflow: hidden;
            }
        }
        html, body {
            width: 297mm;
            /* height: 210mm; */
            margin: 0px;
            padding: 0px;
        }
        body {
            font-family: 'Roboto', sans-serif;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            font-size: 10px;
            color: black;
        }

        th, td {
            font-size: 10px;
            border: 1px solid black;
            text-align: center;
        }

        .hide {
            border-style: unset;
        }
        .hider {
            border-right-style: unset;
        }
        .hidel {
            border-left-style: unset;
        }
        .hiderl {
            border-right-style: unset;
            border-left-style: unset;
        }
        .hidet {
            border-top-style: unset;
        }
        .hideb {
            border-bottom-style: unset;
        }
        .hidetb {
            border-top-style: unset;
            border-bottom-style: unset;
        }

        .bdottb {
            border-top-style: dashed;
            border-bottom-style: dashed;
        }

        .fnt {
            font-family: Roboto Mono, monospace;
        }

        .fntb {
            font-family: Roboto Mono, monospace;
            font-weight: bold
        }

        .pdt {
            padding-top: 0px
        }
        .pdb {
            padding-bottom: 0px
        }
        .pdtb {
            padding-top: 0px;
            padding-bottom: 0px
        }

        .fontl {
            text-align: left
        }

        .txtalgl {
            text-align: left;
        }

        .altbntu {
            border-style: none;
            padding-top: 0px;
            padding-bottom: 0px;
        }

        .dpm {
            background-color: #d9ead3
        }
    </style>
</head>
<body>
    <div class="fnt centered-div" style="width: 100%">
        <table id="dpm" class="display">
            {{-- tr 0 --}}
            <tr>
                <td class="altbntu"></td> {{-- 1 --}}
                <td class="altbntu"></td> {{-- 2 --}}
                <td class="altbntu" style="width: 20px"></td> {{-- 3 --}}
                <td class="altbntu" style="width: 20px"></td> {{-- 4 --}}
                <td class="altbntu" style="width: 0px"></td> {{-- 5 --}}
                <td class="altbntu" style="width: 140px"></td> {{-- 6 --}}
                <td class="altbntu" style="width: 50px"></td> {{-- 7 --}}
                <td class="altbntu" style="width: 45px"></td> {{-- 8 --}}
                <td class="altbntu" style="width: 60px"></td> {{-- 9 --}}
                <td class="altbntu"></td> {{-- 10 --}}
                <td class="altbntu" style="width: 20px"></td> {{-- 11 --}}
                <td class="altbntu" style="width: 60px"></td> {{-- 12 --}}
                <td class="altbntu" style="width: 50px"></td> {{-- 13 --}}
                <td class="altbntu" style="width: 55px"></td> {{-- 14 --}}
                <td class="altbntu" style="width: 0px"></td> {{-- 15 --}}
                <td class="altbntu" style="width: 60px"></td> {{-- 16 --}}
                <td class="altbntu" style="width: 60px"></td> {{-- 17 --}}
                <td class="altbntu" style="width: 50px"></td> {{-- 18 --}}
                <td class="altbntu" style="width: 45px"></td> {{-- 19 --}}
                <td class="altbntu" style="width: 35px"></td> {{-- 20 --}}
                <td class="altbntu" style="width: 35px"></td> {{-- 21 --}}
                <td class="altbntu" style="width: 35px"></td> {{-- 22 --}}
            </tr>
            {{-- row 1 --}}
            <tr class="dpm">
                <td class="hideb hider" style="width: 20px"></td>
                <td colspan="4" rowspan="2" class="fntb hidel" style="font-size: 20px; padding: 0px; width: 20%; height: 0%;">TUG 5</td>
                <td colspan="4" class="hider hideb fntb pdtb" style="text-align: left; padding-left: 40px; overflow: visible">PT. PLN (PERSERO) UID JATIM UP3 MALANG</td>

                <td class="hiderl hideb"></td>
                <td class="hiderl hideb"></td>
                <td class="hiderl hideb"></td>
                <td class="hiderl hideb"></td>
                <td class="hiderl hideb"></td>
                <td class="hiderl hideb"></td>
                <td class="hiderl hideb"></td>
                <td class="hiderl hideb"></td>

                <td class="hider hideb"></td>
                <td class="hiderl hideb"></td>
                <td class="hiderl hideb"></td>
                <td class="hiderl hideb"></td>
                <td class="hidel hideb"></td>
            </tr>
            {{-- row 2 --}}
            <tr class="dpm">
                <td class="hidet hider"></td>
                <td rowspan="4" colspan="12" class="fntb hidet pdtb" style="font-size: 24px; width: 600px; height: 0px;">DAFTAR PERMINTAAN MATERIAL</td>
                <td class="hider hidetb"></td>
                <td class="hide"></td>
                <td class="hide"></td>
                <td class="hide"></td>
                <td class="hidel hidetb"></td>
            </tr>
            {{-- row 3 --}}
            @forelse ($dpm as $i)
                <tr class="dpm">
                    <td colspan="2" class="fntb hideb pdtb" style="width: 100px">Taggal</td>
                    <td class="fntb hideb hider pdtb">Tgl.</td>
                    <td class="fntb hideb hiderl pdtb">Bln.</td>
                    <td class="fntb hideb hidel pdtb" style="padding-left: 0px; padding-right: 0px;">Thn.</td>

                    <td rowspan="3" colspan="5" class="fntb hidet" style="padding-left: 0px; padding-right: 0px; padding-bottom: 0px; width: 0%; font-size: 18px; color: #ff0000">{{ $i->nomor_dpb}}</td>
                </tr>
                {{-- row 4 --}}
                <tr class="dpm">
                    <td colspan="2" class="fntb hidetb pdtb" style="height: 5px">diminta</td>
                    <td class="hider hidet"></td>
                    <td class="hiderl hidet"></td>
                    <td class="hidel hidet pdtb"></td>
                </tr>
                {{-- row 5 --}}
                <tr class="dpm">
                    <td colspan="2" class="hidet"></td>

                    <td class="fntb pdtb">{{\Carbon\Carbon::parse($i->tgl_diminta)->format('d')}}</td>
                    <td class="fntb pdtb">{{\Carbon\Carbon::parse($i->tgl_diminta)->format('m')}}</td>
                    <td class="fntb pdtb pdtb" style="padding-left: 0px; padding-right: 0px;">{{\Carbon\Carbon::parse($i->tgl_diminta)->format('Y')}}</td>
                </tr>
                {{-- row 6 --}}
                <tr class="dpm">
                    <td colspan="2" class="fntb hidetb pdtb">Tanggal</td>
                    <td class="fntb hideb hider pdtb">Tgl.</td>
                    <td class="fntb hideb hiderl pdtb">Bln.</td>
                    <td class="fntb hideb hidel pdtb">Thn.</td>

                    <td class="fntb fontl pdtb hider hideb">Kepada:</td>
                    <td class="fntb fontl pdtb hidel hideb" style="width: 0px" colspan="5">PT PLN (Persero) UP3 Malang</td>

                    <td class="fntb fontl pdtb hideb" colspan="6">Harap dikirim ke :</td>

                    <td class="hide fntb fontl pdtb" colspan="3">Kode Jurnal</td>

                    <td class="hiderl hideb"></td>
                    <td class="hidel hideb"></td>
                </tr>
                {{-- row 7 --}}
                <tr class="dpm">
                    <td colspan="2" class="fntb hidetb pdtb">diberikan</td>
                    <td class="hider hidet"></td>
                    <td class="hiderl hidet"></td>
                    <td class="hidel hidetb"></td>

                    <td class="fntb fontl pdtb hider hidetb" style="width: 0px">Gudang:</td>
                    <td class="fntb fontl pdtb hidel hidetb" colspan="5">Gudang PLN Aries Munandar</td>

                    <td class="fntb fontl pdtb hidetb" colspan="6">{{ $i->nmu }}</td>

                    <td class="hider hidetb"></td>
                    <td class="hide"></td>
                    <td class="hide"></td>
                    <td class="hide"></td>
                    <td class="hidel hidetb"></td>
                </tr>
                {{-- row 8 --}}
                <tr class="dpm">
                    <td colspan="2" class="hidet" style=""></td>
                    <td class="fntb pdtb"></td>
                    <td class="fntb pdtb"></td>
                    <td class="fntb pdtb"></td>

                    <td class="fntb fontl pdtb hider hidet">Alamat:</td>
                    <td class="fntb fontl pdtb hidel hidet" colspan="5">Jl. Aries Munandar No. 77A Malang</td>

                    <td class="fntb fontl pdtb hidet" colspan="6">{{ $i->almtu }}</td>

                    <td class="hidet hider"></td>
                    <td class="hidet hiderl"></td>
                    <td class="hidet hiderl"></td>
                    <td class="hidet hiderl"></td>
                    <td class="hidet hidel"></td>
                </tr>
            @empty
            @endforelse
            {{-- row 9 --}}
            <tr>
                <td class="fntb pdtb hideb" style="vertical-align: bottom; height: 25px; width: 0px; padding-left: 2px; padding-right: 2px;">No.</td>

                <td class="fntb pdtb hideb" style="vertical-align: bottom; height: 25px; overflow: visible" colspan="5">Nama Barang</td>

                <td class="fntb pdtb hideb" style="vertical-align: bottom; height: 25px; width: 0px" colspan="2">No.</td>

                <td class="fntb pdtb hideb" style="vertical-align: bottom">Sa-</td>

                <td class="fntb pdtb hideb" colspan="6">Banyaknya yang diminta</td>

                <td class="fntb pdtb hideb" colspan="4">Banyak yang diterima</td>

                <td class="fntb pdtb hideb" style="vertical-align: bottom" colspan="3">Jumlah Uang</td>
            </tr>
            {{-- row 10 --}}
            <tr>
                <td class="fntb pdtb hidet" style="vertical-align: top; height: width: 0px; 25px; padding-left: 2px; padding-right: 2px;">Urut</td>

                <td class="fntb pdtb hidet" style="vertical-align: top; height: 25px" colspan="5">(ditulis selengkap - lengkapnya)</td>

                <td class="fntb pdtb hidet" style="vertical-align: top; height: 25px" colspan="2">Normalisasi</td>

                <td class="fntb pdtb hidet" style="vertical-align: top">tuan</td>

                <td class="fntb pdtb " colspan="3">dengan angka</td>

                <td class="fntb pdtb " colspan="3">dengan huruf</td>

                <td class="fntb pdtb " colspan="2">dengan angka</td>

                <td class="fntb pdtb " colspan="2">dengan huruf</td>

                <td class="fntb pdtb hidet" style="vertical-align: top" colspan="3">Rp.</td>
            </tr>
            {{-- row 11 --}}
            <tr>
                <td class="bdottb" style="height: 15px"></td>
                <td class="bdottb pdtb" colspan="5"></td>
                <td class="bdottb pdtb" colspan="2"></td>
                <td class="bdottb pdtb"></td>
                <td class="bdottb pdtb" colspan="3"></td>
                <td class="bdottb pdtb" colspan="3"></td>
                <td class="bdottb pdtb" colspan="2"></td>
                <td class="bdottb pdtb" colspan="2"></td>
                <td class="bdottb" colspan="3"></td>
            </tr>
            {{-- row 12 --}}
            @forelse ($material as $mat)
                <tr>
                    <td class="bdottb pdtb">{{ $loop->iteration }}</td>
                    <td class="bdottb pdtb" colspan="5">{{ $mat['lMaterial']->nammat }}</td>
                    <td class="bdottb pdtb" colspan="2">{{ $mat['lMaterial']->normalisasi }}</td>
                    <td class="bdottb pdtb">{{ $mat['lMaterial']->satuan }}</td>
                    <td class="bdottb pdtb" colspan="3">{{ $mat['lMaterial']->jumlah_diminta }}</td>
                    <td class="bdottb pdtb" colspan="3">{{ $mat['jumlah'] }}</td>
                    <td class="bdottb pdtb" colspan="2"></td>
                    <td class="bdottb pdtb" colspan="2"></td>
                    <td class="bdottb" colspan="3"></td>
                </tr>
            @empty

            @endforelse
            {{-- row 13 --}}
            @for ($i = $list; $i <= 10; $i++)
                <tr>
                    <td class="bdottb pdtb">{{ $i }}</td>
                    <td class="bdottb pdtb" colspan="5"></td>
                    <td class="bdottb pdtb" colspan="2"></td>
                    <td class="bdottb pdtb"></td>
                    <td class="bdottb pdtb" colspan="3"></td>
                    <td class="bdottb pdtb" colspan="3"></td>
                    <td class="bdottb pdtb" colspan="2"></td>
                    <td class="bdottb pdtb" colspan="2"></td>
                    <td class="bdottb" colspan="3"></td>
                </tr>
            @endfor
            <tr>
                <td class="bdottb pdtb" style="height: 15px"></td>
                <td class="bdottb pdtb" colspan="5"></td>
                <td class="bdottb pdtb" colspan="2"></td>
                <td class="bdottb pdtb"></td>
                <td class="bdottb pdtb" colspan="3"></td>
                <td class="bdottb pdtb" colspan="3"></td>
                <td class="bdottb pdtb" colspan="2"></td>
                <td class="bdottb pdtb" colspan="2"></td>
                <td class="bdottb" colspan="3"></td>
            </tr>
            {{-- row 23 --}}
            @forelse ($dpm as $i)
                <tr>
                    <td class="hidetb pdtb"></td>
                    <td class="fntb hide pdtb txtalgl" colspan="3">VENDOR</td>
                    <td class="fntb hide pdtb">:</td>
                    <td class="fntb hidel hidetb pdtb txtalgl" colspan="7">{{ $i->nmu }}</td>

                    <td class="fntb hidetb pdtb txtalgl" colspan="3">MERK MATERIAL :</td>

                    <td class="fntb hidetb pdtb txtalgl" colspan="4">{{ $i->merk_material }}</td>
                    <td class="fntb hidetb pdtb txtalgl" colspan="3"></td>
                </tr>
                {{-- row 24 --}}
                <tr>
                    <td class="hidetb pdtb"></td>
                    <td class="fntb hide pdtb txtalgl" colspan="3">N0. SPK</td>
                    <td class="fntb hide pdtb">:</td>
                    <td class="fntb hidel hidetb pdtb txtalgl" colspan="7">{{ $i->no_spk }}</td>

                    <td class="fntb hidetb pdtb txtalgl" colspan="3">NOMOR RESERVASI :</td>

                    <td class="fntb hidetb pdtb txtalgl" colspan="4"></td>
                    <td class="fntb hidetb pdtb txtalgl" colspan="3"></td>
                </tr>
                {{-- row 25 --}}
                <tr>
                    <td class="hidetb pdtb"></td>
                    <td class="fntb hide pdtb txtalgl" colspan="3">JENIS PEKERJAAN</td>
                    <td class="fntb hide pdtb">:</td>
                    <td class="fntb hidel hidetb pdtb txtalgl" colspan="7">{{ $i->jpkj }}</td>

                    <td class="fntb hidetb pdtb txtalgl" colspan="3"></td>

                    <td class="fntb hidetb pdtb txtalgl" colspan="4"></td>
                    <td class="fntb hidetb pdtb txtalgl" colspan="3"></td>
                </tr>
                {{-- row 26 --}}
                <tr>
                    <td class="hidetb pdtb"></td>
                    <td class="fntb hide pdtb txtalgl" colspan="3">IDPEL</td>
                    <td class="fntb hide pdtb">:</td>
                    <td class="fntb hidel hidetb pdtb txtalgl" colspan="7">{{ $i->idpel }}</td>

                    <td class="fntb hidetb pdtb txtalgl" colspan="3"></td>

                    <td class="fntb hidetb pdtb txtalgl" colspan="4"></td>
                    <td class="fntb hidetb pdtb txtalgl" colspan="3"></td>
                </tr>
                {{-- row 27 --}}
                <tr>
                    <td class="hidetb pdtb"></td>
                    <td class="fntb hide pdtb txtalgl" colspan="3">NAMA PELANGGAN</td>
                    <td class="fntb hide pdtb">:</td>
                    <td class="fntb hidel hidetb pdtb txtalgl" colspan="7">{{ $i->np }}</td>

                    <td class="fntb hidetb pdtb txtalgl" colspan="3"></td>

                    <td class="fntb hidetb pdtb txtalgl" colspan="4"></td>
                    <td class="fntb hidetb pdtb txtalgl" colspan="3"></td>
                </tr>
                {{-- row 28 --}}
                <tr>
                    <td class="hidetb pdtb"></td>
                    <td class="fntb hide pdtb txtalgl" colspan="3">ALAMAT PELANGGGAN</td>
                    <td class="fntb hide pdtb">:</td>
                    <td class="fntb hidel hidetb pdtb txtalgl" colspan="7">{{ $i->almtp }}</td>

                    <td class="fntb hidetb pdtb txtalgl" colspan="3"></td>

                    <td class="fntb hidetb pdtb txtalgl" colspan="4"></td>
                    <td class="fntb hidetb pdtb txtalgl" colspan="3"></td>
                </tr>
                {{-- row 29 --}}
                <tr>
                    <td class="hidetb pdtb"></td>
                    <td class="fntb hide pdtb txtalgl" colspan="3">DAYA</td>
                    <td class="fntb hide pdtb">:</td>
                    <td class="fntb hide pdtb txtalgl" colspan="1">{{ $i->nmpbd }}</td>
                    <td class="fntb hide pdtb txtalgl" colspan="2">{{ $i->tdlama }}</td>
                    <td class="fntb hide pdtb txtalgl" colspan="1">ke</td>
                    <td class="fntb hidel hidetb pdtb txtalgl" colspan="3">{{ $i->tdbaru }}</td>

                    <td class="fntb hidetb pdtb txtalgl" colspan="3"></td>

                    <td class="fntb hidetb pdtb txtalgl" colspan="4"></td>
                    <td class="fntb hidetb pdtb txtalgl" colspan="3"></td>
                </tr>
                {{-- row 30 --}}
                <tr>
                    <td class="hidet pdtb"></td>
                    <td class="fntb hidet hiderl pdtb txtalgl" colspan="3">ULP</td>
                    <td class="fntb hidet hiderl pdtb">:</td>
                    <td class="fntb hidet hiderl pdtb txtalgl" colspan="1">{{ $i->nmulp }}</td>
                    <td class="fntb hidet hiderl pdtb txtalgl"></td>
                    <td class="fntb hidet hiderl pdtb txtalgl"></td>
                    <td class="fntb hidel hidet pdtb txtalgl" colspan="4">{{ $i->kpos }}</td>

                    <td class="fntb hidet pdtb txtalgl" colspan="3"></td>

                    <td class="fntb hidet pdtb txtalgl" colspan="4"></td>
                    <td class="fntb hidet pdtb txtalgl" colspan="3"></td>
                </tr>
                {{-- row 31 --}}
                <tr>
                    <td class="hideb" colspan="22"></td>
                </tr>
                {{-- row 32 --}}
                <tr>
                    <td class="fntb hidetb pdtb txtalgl" colspan="2" style="vertical-align: bottom; height: 30px">Banyak jenis</td>

                    <td class="fntb hidetb pdtb txtalgl" colspan="4" style="vertical-align: bottom; height: 30px">Sifat pekerjaan</td>

                    <td class="fntb hidetb hiderl pdtb txtalgl" colspan="1" style="vertical-align: bottom; height: 30px">No. PK</td>
                    <td class="fntb hidetb hiderl pdtb txtalgl" colspan="5" style="vertical-align: bottom; height: 30px">:</td>

                    <td class="fntb hidetb hiderl pdtb txtalgl" colspan="3" style="vertical-align: bottom; height: 30px">No. Urut</td>

                    <td class="hide" colspan="4"></td>

                    <td class="fntb hidetb hidel pdtb" colspan="3" style="vertical-align: bottom; height: 30px">Kode Perkiraan</td>
                </tr>
                {{-- row 33 --}}
                <tr>
                    <td class="fntb hidetb pdtb txtalgl" colspan="2">barang :</td>

                    <td class="hidetb pdtb txtalgl" colspan="4">Pas.Baru/<del>Perluasan/<span class="fntb">Perbaikan</span>/<span class="fntb">Pamel</span>/JBST</del></td>

                    <td class="hidetb hiderl pdtb txtalgl" colspan="6"></td>

                    <td class="fntb hidetb hiderl pdtb txtalgl" colspan="3">SKI/SKP/PKP/PFK</td>

                    <td class="fntb hidetb hiderl pdtb txtalgl"></td>

                    <td class="fntb hidetb hiderl pdtb" colspan="3">No. P. K</td>

                    <td class="hidel hidetb" colspan="3"></td>
                </tr>
                {{-- row 34 --}}
                <tr>
                    <td class="fntb hidet pdtb txtalgl" colspan="2"></td>

                    <td class="hidet pdtb txtalgl" colspan="4" style="vertical-align: top; height: 25px"><del>Pembongk.</del></td>

                    <td class="fntb hidet hiderl pdtb txtalgl" colspan="" style="vertical-align: bottom; height: 25px; padding-right: 0px;">No. PDL</td>

                    <td class="hidet hiderl pdtb txtalgl" colspan="7" style="vertical-align: bottom; height: 25px; padding-right: 0px;">.............................................</td>

                    <td class="hidet hidel pdtb" colspan="8" style="vertical-align: bottom; height: 25px"></td>
                </tr>
                {{-- row 35 --}}
                <tr>
                    <td class="fntb hidetb hider pdtb txtalgl" colspan="2">Setuju :</td>
                    <td class="fntb hidetb hidel pdtb txtalgl" colspan="3">Asman Konstruksi</td>

                    <td class="fntb hidetb pdtb txtalgl" colspan="5">Kepala Gudang :</td>

                    <td class="fntb hidetb hider pdtb txtalgl" colspan="3">Pemeriksa :</td>
                    <td class="fntb hidetb hidel pdtb txtalgl" colspan="4">Pengawas</td>

                    <td class="fntb hidetb pdtb txtalgl" colspan="5">Penerima :</td>
                </tr>
                {{-- row 36 --}}
                <tr>
                    <td class="fntb hidetb txtalgl" colspan="5"></td>
                    <td class="fntb hidetb txtalgl" colspan="5"></td>
                    <td class="fntb hidetb txtalgl" colspan="7"></td>

                    <td class="fntb hidetb pdtb txtalgl" colspan="5">{{ $i->nmu }}</td>
                </tr>
                {{-- row 37 --}}
                <tr>
                    <td class="fntb hidetb txtalgl" colspan="5"></td>
                    <td class="fntb hidetb txtalgl" colspan="5"></td>
                    <td class="fntb hidetb txtalgl" colspan="7"></td>
                    <td class="fntb hidetb txtalgl" colspan="5"></td>
                </tr>
                {{-- row 38 --}}
                <tr>
                    <td class="fntb hidetb txtalgl" colspan="5" style="height: 30px"></td>
                    <td class="fntb hidetb txtalgl" colspan="5"></td>
                    <td class="fntb hidetb txtalgl" colspan="7"></td>
                    <td class="fntb hidetb txtalgl" colspan="5"></td>
                </tr>
                {{-- row 39 --}}
                <tr>
                    <td class="fntb hidet pdtb" colspan="5">{{ $i->setuju }}</td>
                    <td class="fntb hidet pdtb" colspan="5">{{ $i->kpgdg }}</td>
                    <td class="fntb hidet pdtb" colspan="7">{{ $i->pemeriksa }}</td>
                    <td class="fntb hidet pdtb" colspan="5">{{ $i->penerima }}</td>
                </tr>
            @empty
            @endforelse
        </table>
    </div>

    <script>
        window.print()
    </script>
</body>
</html>
