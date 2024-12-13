<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Surat Jalan</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Mono&display=swap" rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

    <style>
        @page {
            size: A4;
        }

        /* Style content with shaded background */
        .content {
            width: 100%;
            /* Adjust the width as needed */
            height: 100%;
            /* Adjust the height as needed*/
            padding: 0px;
            box-sizing: border-box;
            font-family: Arial, sans-serif;
            background-color: #ffffff;
            /* Light gray shade */
        }

        html, body {
            height: 297mm;
            width: 210mm;
        }

        html {
            display: table;
            margin: auto;
        }

        body {
            display: table-cell;
            vertical-align: middle;
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
            border-top-style: dotted;
            border-bottom-style: dotted;
        }

        .fnt {
            font-family: 'Roboto Mono', monospace;
        }

        .fntb {
            font-family: 'Roboto Mono', monospace;
            font-weight: bold
        }
        .fntarial {
            font-family: Arial, sans-serif;
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

        .fontbott {
            vertical-align: bottom
        }
        .fnt12 {
            font-size: 12px
        }
        .fonttop {
            vertical-align: top
        }
        .txtalgl {
            text-align: left;
        }

        .altbntu {
            border-style: none;
            padding-top: 0px;
            padding-bottom: 0px;
        }
        .itmth {
            height: 25px;
        }
        .dpm {
            background-color: #d9ead3
        }
        #floater {
            position: fixed;
            top: 50%;
            left: 0.5%;
            transform: translateY(-50%);
            width: 23%
        }
    </style>
</head>
<body>
    <div class="fnt">
        <table>
            {{-- row 0, 15 column --}}
            <tr>
                <td class="altbntu" style="height: 10px; width: 70px"></td>
                <td class="altbntu" style="width: 70px"></td>
                <td class="altbntu" style="width: 40px"></td>
                <td class="altbntu" style="width: 40px"></td>
                <td class="altbntu" style="width: 40px"></td>
                <td class="altbntu" style="width: 100px"></td>
                <td class="altbntu" style="width: 45px"></td>
                <td class="altbntu" style="width: 90px"></td>
                <td class="altbntu" style="width: 70px"></td>
                <td class="altbntu" style="width: 30px"></td>
                <td class="altbntu" style="width: 30px"></td>
                <td class="altbntu" style="width: 30px"></td>
                <td class="altbntu" style="width: 50px"></td>
                <td class="altbntu" style="width: 50px"></td>
                <td class="altbntu" style="width: 50px"></td>
            </tr>
            {{-- row 2 --}}
            <tr>
                <td class="hide" style="height: 40px;" rowspan="3"><img src="{{ asset('images/LogoPLN.png') }}" alt="logo pln" style="width: 45px; margin-block-end: 10px"/></td>

                <td class="fntarial pdtb fontl hide" colspan="8" style="font-size: 10px;">PT PLN (PERSERO)</td>
                <td class="fntarial pdtb hide" colspan="5">1. Pengantar 2. Security 3. Pengambil material</td>
            </tr>
            {{-- row 3 --}}

            <tr>
                <td class="fntarial pdtb fontl hide" colspan="8">UNIT INDUK DISTRIBUSI (UID) JAWA TIMUR</td>
                <td class="fntarial pdtb" colspan="5">PERHATIAN :</td>
            </tr>
            {{-- row 4 --}}
            <tr>
                <td class="fntarial pdtb fontl hide" colspan="8">UNIT PELAKSANA PELAYANAN PELANGGAN (UP3) MALANG</td>
                <td class="fntarial pdtb" colspan="5" rowspan="2">SEMUA RESIKO SETELAH MATERIAL KELUAR DARI LOGISTIK, MENJADI TANGGUNG JAWAB PENGAMBIL MATERIAL</td>
            </tr>
            {{-- row 5 --}}
            <tr>
                <td class="hide" colspan="9" style="height: 14px"></td>
            </tr>
            {{-- row 6 --}}
            <tr>
                <td class="hide" colspan="15" style="height: 14px"></td>
            </tr>
            {{-- row 7 --}}
            <tr>
                <td class="fntarial pdtb hide" colspan="15" style="font-size: 18px;"><u>SURAT ANGKUTAN</u></td>
            </tr>
            {{-- row 8 --}}
            @forelse ($suratjln as $sj)
            <tr>
                <td class="fntb pdtb hide" colspan="15">{{ $sj->nosj }}</td>
            </tr>
            {{-- row 9 --}}
            <tr>
                <td class="hide" colspan="15" style="height: 14px"></td>
            </tr>
            {{-- row 10 --}}
            <tr>
                <td class="fntb pdtb fontl hide" colspan="2">Kendaraan No.</td>
                <td class="fntb pdtb hide">:</td>
                <td class="fntb pdtb fontl hide" colspan="5">{{ $sj->nomor_polisi }}</td>
                <td class="fntb pdtb fontl hide" colspan="5">{{ $sj->vendor }}</td>
            </tr>
            {{-- row 11 --}}
            <tr>
                <td class="fntb pdtb fontl hide" colspan="2">Nama Pengemudi</td>
                <td class="fntb pdtb hide">:</td>
                <td class="fntb pdtb fontl hide" colspan="11">{{ $sj->pengemudi }}</td>
            </tr>
            {{-- row 12 --}}
            <tr>
                <td class="fntb pdtb fontl hide" colspan="2">Dari Logistik</td>
                <td class="fntb pdtb hide">:</td>
                <td class="fntb pdtb fontl hide" colspan="3">UP3 MALANG</td>
                <td class="fntb pdtb fontl hide" colspan="2">SPK NO. :</td>
                <td class="fntb pdtb fontl hide" colspan="3">{{ $sj->ulp }}</td>
            </tr>
            {{-- row 13 --}}
            <tr>
                <td class="hide" colspan="8"></td>
                <td class="fntb pdtb fontl hide" colspan="6">{{ $sj->nospk }}</td>
            </tr>
            {{-- row 14 --}}
            <tr>
                <td class="hide" colspan="8"></td>
                <td class="fntb pdtb fontl hide" colspan="6">{{ $sj->nampel}}</td>
            </tr>
            {{-- row 15 --}}
            <tr>
                <td class="hide" colspan="15" style="height: 14px"></td>
            </tr>
            {{-- row 16 --}}
            <tr>
                <td class="fntb pdtb hideb fontbott" style="height: 25px">No.</td>
                <td class="fntb pdtb hideb fontbott" colspan="5">Nama Barang</td>
                <td class="fntb pdtb hideb fontbott" colspan="2">No.</td>
                <td class="fntb pdtb hideb fontbott">Sa-</td>
                <td class="fntb pdtb" colspan="3">Banyak yang diminta</td>
                <td class="fntb pdtb" colspan="2">Banyak yang diberikan</td>
            </tr>
            {{-- row 17 --}}
            <tr>
                <td class="fntb pdtb hidet fonttop" style="height: 25px">Urut</td>
                <td class="fntb pdtb hidet fonttop" colspan="5">(ditulis selengkap - lengkapnya)</td>
                <td class="fntb pdtb hidet fonttop" colspan="2">Normalisasi</td>
                <td class="fntb pdtb hidet fonttop">tuan</td>
                <td class="fntb pdtb hidet" colspan="3">dengan angka</td>
                <td class="fntb pdtb hidet" colspan="2">dengan angka</td>
            </tr>
            @empty
            @endforelse
            {{-- row 18 --}}
            <tr>
                <td class="bdottb" colspan="" style="height: 10px"></td>
                <td class="bdottb" colspan="5" style="height: 10px"></td>
                <td class="bdottb" colspan="2" style="height: 10px"></td>
                <td class="bdottb" colspan="" style="height: 10px"></td>
                <td class="bdottb" colspan="3" style="height: 10px"></td>
                <td class="bdottb" colspan="2" style="height: 10px"></td>
            </tr>
            {{-- row 19 --}}
            @forelse ($material as $mat)
            <tr>
                <td class="fntb bdottb pdtb fnt12 itmth">{{ $loop->iteration }}</td>
                <td class="fntb bdottb pdtb fnt12 itmth" colspan="5">{{ $mat->nammat }}</td>
                <td class="fntb bdottb pdtb fnt12 itmth" colspan="2">{{ $mat->normalisasi }}</td>
                <td class="fntb bdottb pdtb fnt12 itmth" colspan="1">{{ $mat->satuan }}</td>
                <td class="fntb bdottb pdtb fnt12 itmth" colspan="3">{{ $mat->jumlah_diminta }}</td>
                <td class="fntb bdottb pdtb fnt12 itmth" colspan="2">{{ ($mat->jumlah_diberi == null) ? "TA" : $mat->jumlah_diberi }}</td>
            </tr>
            @empty
            @endforelse
            {{-- row 20 --}}
            @for ($i = $list; $i <= 10; $i++)
            <tr>
                <td class="fntb bdottb pdtb fnt12 itmth">{{$i}}</td>
                <td class="fntb bdottb pdtb fnt12 itmth" colspan="5"></td>
                <td class="fntb bdottb pdtb fnt12 itmth" colspan="2"></td>
                <td class="fntb bdottb pdtb fnt12 itmth" colspan="1"></td>
                <td class="fntb bdottb pdtb fnt12 itmth" colspan="3"></td>
                <td class="fntb bdottb pdtb fnt12 itmth" colspan="2"></td>
            </tr>
            @endfor
            {{-- row 29 --}}
            <tr>
                <td class="bdottb" colspan="" style="height: 10px"></td>
                <td class="bdottb" colspan="5" style="height: 10px"></td>
                <td class="bdottb" colspan="2" style="height: 10px"></td>
                <td class="bdottb" colspan="" style="height: 10px"></td>
                <td class="bdottb" colspan="3" style="height: 10px"></td>
                <td class="bdottb" colspan="2" style="height: 10px"></td>
            </tr>
            {{-- row 30 --}}
            @forelse ($suratjln as $sj)
            <tr>
                <td class="hidetb"></td>
                <td class="fntb hide fontl" colspan="3">VENDOR</td>
                <td class="fntb hide">:</td>
                <td class="fntb hide fontl" colspan="7">{{ $sj->vendor }}</td>
                <td class="bdottb fntb" colspan="2">DPB NO.</td>
            </tr>
            {{-- row 31 --}}
            <tr>
                <td class="hidetb"></td>
                <td class="fntb hide fontl" colspan="3">NO. SPK</td>
                <td class="fntb hide">:</td>
                <td class="fntb hide fontl" colspan="7">{{ $sj->nospk }}</td>
                <td class="hidetb" colspan="2"></td>
            </tr>
            {{-- row 32 --}}
            <tr>
                <td class="hidetb"></td>
                <td class="fntb hide fontl fontbott" colspan="3" style="height: 90px;">JENIS PEKERJAAN</td>
                <td class="fntb hide fontbott">:</td>
                <td class="fntb hide fontl fontbott" colspan="7">{{ $sj->nmpkrjn }}</td>
                <td class="fntb dpm" colspan="2" style="font-size: 24px; color: #ff0000">{{ $sj->nodpb }}</td>
            </tr>
            {{-- row 33 --}}
            <tr>
                <td class="hidetb"></td>
                <td class="fntb hide fontl" colspan="3">IDPEL</td>
                <td class="fntb hide">:</td>
                <td class="fntb hide fontl" colspan="7">{{ $sj->idpel }}</td>
                <td class="hidetb" colspan="2"></td>
            </tr>
            {{-- row 34 --}}
            <tr>
                <td class="hidetb"></td>
                <td class="fntb hide fontl" colspan="3">NAMA PELANGGAN</td>
                <td class="fntb hide">:</td>
                <td class="fntb hide fontl" colspan="7">{{ $sj->nampel }}</td>
                <td class="hidetb" colspan="2"></td>
            </tr>
            {{-- row 35 --}}
            <tr>
                <td class="hidetb"></td>
                <td class="fntb hide fontl" colspan="3">ALAMAT PELANGGAN</td>
                <td class="fntb hide">:</td>
                <td class="fntb hide fontl" colspan="7">{{ $sj->almtpel }}</td>
                <td class="hidetb" colspan="2"></td>
            </tr>
            {{-- row 36 --}}
            <tr>
                <td class="hidetb"></td>
                <td class="fntb hide fontl" colspan="3">DAYA</td>
                <td class="fntb hide">:</td>
                <td class="fntb hide fontl" colspan="1">PB</td>
                <td class="fntb hide" colspan="2">{{ $sj->daylam }}</td>
                <td class="fntb hide" colspan="1">ke</td>
                <td class="fntb hide" colspan="3">{{ $sj->daybar }}</td>
                <td class="hidetb" colspan="2"></td>
            </tr>
            {{-- row 37 --}}
            <tr>
                <td class="hidet"></td>
                <td class="fntb hidet hiderl fontl" colspan="3">ULP</td>
                <td class="fntb hidet hiderl">:</td>
                <td class="fntb hidet hiderl fontl" colspan="7">ULP KEPANJEN</td>
                <td class="hidet" colspan="2"></td>
            </tr>
            {{-- row 38 --}}
            <tr>
                <td class="hide" colspan="15" style="height: 14px"></td>
            </tr>
            {{-- row 39 --}}
            <tr>
                <td class="fntb hide fontl" colspan="2">Diterima tgl</td>
                <td class="fntb hide fontl" colspan="4">{{ \Carbon\Carbon::parse($sj->tgldicetak)->format('d M Y') }}</td>
                <td class="hide" colspan="2"></td>
                <td class="fntb hide" colspan="1">Malang,</td>
                <td class="fntb hide fontl" colspan="5">.......................</td>
            </tr>

            {{-- row 40 --}}
            <tr>
                <td class="hide" colspan="5"></td>
                <td class="fntb hide" colspan="3">Mengetahui,</td>
                <td class="hide" colspan="6"></td>
            </tr>
            {{-- row 41 --}}
            <tr>
                <td class="fntb hide" colspan="3">Penerima,</td>
                <td class="hide" colspan="2"></td>
                <td class="fntb hide" colspan="3">Security,</td>
                <td class="hide"></td>
                <td class="fntb hide" colspan="5">Yang menyerahkan,</td>
            </tr>
            {{-- row 42 --}}
            <tr>
                <td class="hide" colspan="15" style="height: 14px"></td>
            </tr>
            {{-- row 43 --}}
            <tr>
                <td class="hide" colspan="15" style="height: 14px"></td>
            </tr>
            {{-- row 44 --}}
            <tr>
                <td class="hide" colspan="15" style="height: 14px"></td>
            </tr>
            {{-- row 45 --}}
            <tr>
                <td class="hide" colspan="15" style="height: 14px"></td>
            </tr>
            {{-- row 46 --}}
            <tr>
                <td class="hide" colspan="15" style="height: 14px"></td>
            </tr>
            {{-- row 47 --}}
            <tr>
                <td class="hide" colspan="15" style="height: 14px"></td>
            </tr>
            {{-- row 48 --}}
            <tr>
                <td class="fntb hide" colspan="3">{{ $sj->penerima }}</td>
                <td class="hide" colspan="2"></td>
                <td class="fntb hide" colspan="3">.................</td>
                <td class="hide"></td>
                <td class="fntb hide" colspan="5">{{ $sj->kepala_gudang }}</td>
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