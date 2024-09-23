<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Surat Jalan</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Mono&display=swap" rel="stylesheet">

    <style>


        @page {
            size: A4;
        }

        /* Set content to fill the entire A4 page */
        html, body {
            width: 210mm;
            height: 297mm;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
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
            background-color: #3ea534
        }
    </style>
</head>
<body>
    <div class=" fnt">
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
            <tr>
                <td class="fntb pdtb hide" colspan="15">0000 /LOG.00.02/GD. ARIES/VI/2024</td>
            </tr>
            {{-- row 9 --}}
            <tr>
                <td class="hide" colspan="15" style="height: 14px"></td>
            </tr>
            {{-- row 10 --}}
            <tr>
                <td class="fntb pdtb fontl hide" colspan="2">Kendaraan No.</td>
                <td class="fntb pdtb hide">:</td>
                <td class="fntb pdtb fontl hide" colspan="5"></td>
                <td class="fntb pdtb fontl hide" colspan="5">PT. XXXXXX</td>
            </tr>
            {{-- row 11 --}}
            <tr>
                <td class="fntb pdtb fontl hide" colspan="2">Nama Pengemudi</td>
                <td class="fntb pdtb hide">:</td>
                <td class="fntb pdtb fontl hide" colspan="11"></td>
            </tr>
            {{-- row 12 --}}
            <tr>
                <td class="fntb pdtb fontl hide" colspan="2">Dari Logistik</td>
                <td class="fntb pdtb hide">:</td>
                <td class="fntb pdtb fontl hide" colspan="3">UP3 MALANG</td>
                <td class="fntb pdtb fontl hide" colspan="2">SPK NO. :</td>
                <td class="fntb pdtb fontl hide" colspan="3">ULP KEPANJEN</td>
            </tr>
            {{-- row 13 --}}
            <tr>
                <td class="hide" colspan="8"></td>
                <td class="fntb pdtb fontl hide" colspan="6">0042.KR/DAN.01.03/E04070000/2022 -079/PK/REN.UP3-MLG/2023</td>
            </tr>
            {{-- row 14 --}}
            <tr>
                <td class="hide" colspan="8"></td>
                <td class="fntb pdtb fontl hide" colspan="6">DARMAWAN</td>
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
                <td class="fntb pdtb" colspan="3">Banyak yang diberikan</td>
                <td class="fntb pdtb" colspan="2">Banyak yang diminta</td>
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
            <tr>
                <td class="fntb bdottb pdtb fnt12 itmth">1</td>
                <td class="fntb bdottb pdtb fnt12 itmth" colspan="5">UNIV ACC;COVER BUSHING TRAFO</td>
                <td class="fntb bdottb pdtb fnt12 itmth" colspan="2">1030074</td>
                <td class="fntb bdottb pdtb fnt12 itmth" colspan="1">U</td>
                <td class="fntb bdottb pdtb fnt12 itmth" colspan="3"></td>
                <td class="fntb bdottb pdtb fnt12 itmth" colspan="2">1</td>
            </tr>
            {{-- row 20 --}}
            <tr>
                <td class="fntb bdottb pdtb fnt12 itmth">2</td>
                <td class="fntb bdottb pdtb fnt12 itmth" colspan="5"></td>
                <td class="fntb bdottb pdtb fnt12 itmth" colspan="2"></td>
                <td class="fntb bdottb pdtb fnt12 itmth" colspan="1"></td>
                <td class="fntb bdottb pdtb fnt12 itmth" colspan="3"></td>
                <td class="fntb bdottb pdtb fnt12 itmth" colspan="2"></td>
            </tr>
            {{-- row 21 --}}
            <tr>
                <td class="fntb bdottb pdtb fnt12 itmth">3</td>
                <td class="fntb bdottb pdtb fnt12 itmth" colspan="5"></td>
                <td class="fntb bdottb pdtb fnt12 itmth" colspan="2"></td>
                <td class="fntb bdottb pdtb fnt12 itmth" colspan="1"></td>
                <td class="fntb bdottb pdtb fnt12 itmth" colspan="3"></td>
                <td class="fntb bdottb pdtb fnt12 itmth" colspan="2"></td>
            </tr>
            {{-- row 22 --}}
            <tr>
                <td class="fntb bdottb pdtb fnt12 itmth">4</td>
                <td class="fntb bdottb pdtb fnt12 itmth" colspan="5"></td>
                <td class="fntb bdottb pdtb fnt12 itmth" colspan="2"></td>
                <td class="fntb bdottb pdtb fnt12 itmth" colspan="1"></td>
                <td class="fntb bdottb pdtb fnt12 itmth" colspan="3"></td>
                <td class="fntb bdottb pdtb fnt12 itmth" colspan="2"></td>
            </tr>
            {{-- row 23 --}}
            <tr>
                <td class="fntb bdottb pdtb fnt12 itmth">5</td>
                <td class="fntb bdottb pdtb fnt12 itmth" colspan="5"></td>
                <td class="fntb bdottb pdtb fnt12 itmth" colspan="2"></td>
                <td class="fntb bdottb pdtb fnt12 itmth" colspan="1"></td>
                <td class="fntb bdottb pdtb fnt12 itmth" colspan="3"></td>
                <td class="fntb bdottb pdtb fnt12 itmth" colspan="2"></td>
            </tr>
            {{-- row 24 --}}
            <tr>
                <td class="fntb bdottb pdtb fnt12 itmth">6</td>
                <td class="fntb bdottb pdtb fnt12 itmth" colspan="5"></td>
                <td class="fntb bdottb pdtb fnt12 itmth" colspan="2"></td>
                <td class="fntb bdottb pdtb fnt12 itmth" colspan="1"></td>
                <td class="fntb bdottb pdtb fnt12 itmth" colspan="3"></td>
                <td class="fntb bdottb pdtb fnt12 itmth" colspan="2"></td>
            </tr>
            {{-- row 25 --}}
            <tr>
                <td class="fntb bdottb pdtb fnt12 itmth">7</td>
                <td class="fntb bdottb pdtb fnt12 itmth" colspan="5"></td>
                <td class="fntb bdottb pdtb fnt12 itmth" colspan="2"></td>
                <td class="fntb bdottb pdtb fnt12 itmth" colspan="1"></td>
                <td class="fntb bdottb pdtb fnt12 itmth" colspan="3"></td>
                <td class="fntb bdottb pdtb fnt12 itmth" colspan="2"></td>
            </tr>
            {{-- row 26 --}}
            <tr>
                <td class="fntb bdottb pdtb fnt12 itmth">8</td>
                <td class="fntb bdottb pdtb fnt12 itmth" colspan="5"></td>
                <td class="fntb bdottb pdtb fnt12 itmth" colspan="2"></td>
                <td class="fntb bdottb pdtb fnt12 itmth" colspan="1"></td>
                <td class="fntb bdottb pdtb fnt12 itmth" colspan="3"></td>
                <td class="fntb bdottb pdtb fnt12 itmth" colspan="2"></td>
            </tr>
            {{-- row 27 --}}
            <tr>
                <td class="fntb bdottb pdtb fnt12 itmth">9</td>
                <td class="fntb bdottb pdtb fnt12 itmth" colspan="5"></td>
                <td class="fntb bdottb pdtb fnt12 itmth" colspan="2"></td>
                <td class="fntb bdottb pdtb fnt12 itmth" colspan="1"></td>
                <td class="fntb bdottb pdtb fnt12 itmth" colspan="3"></td>
                <td class="fntb bdottb pdtb fnt12 itmth" colspan="2"></td>
            </tr>
            {{-- row 28 --}}
            <tr>
                <td class="fntb bdottb pdtb fnt12 itmth">10</td>
                <td class="fntb bdottb pdtb fnt12 itmth" colspan="5"></td>
                <td class="fntb bdottb pdtb fnt12 itmth" colspan="2"></td>
                <td class="fntb bdottb pdtb fnt12 itmth" colspan="1"></td>
                <td class="fntb bdottb pdtb fnt12 itmth" colspan="3"></td>
                <td class="fntb bdottb pdtb fnt12 itmth" colspan="2"></td>
            </tr>
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
            <tr>
                <td class="hidetb"></td>
                <td class="fntb hide fontl" colspan="3">VENDOR</td>
                <td class="fntb hide">:</td>
                <td class="fntb hide fontl" colspan="7">PT. XXXXXX</td>
                <td class="hidetb" colspan="2"></td>
            </tr>
            {{-- row 31 --}}
            <tr>
                <td class="hidetb"></td>
                <td class="fntb hide fontl" colspan="3">NO. SPK</td>
                <td class="fntb hide">:</td>
                <td class="fntb hide fontl" colspan="7">0042.KR/DAN.01.03/E04070000/2022 -079/PK/REN.UP3-MLG/2023</td>
                <td class="hidetb" colspan="2"></td>
            </tr>
            {{-- row 32 --}}
            <tr>
                <td class="hidetb"></td>
                <td class="fntb hide fontl fontbott" colspan="3" style="height: 90px;">JENIS PEKERJAAN</td>
                <td class="fntb hide fontbott">:</td>
                <td class="fntb hide fontl fontbott" colspan="7">GKS</td>
                <td class="fntb" colspan="2" style="font-size: 24px; color: #ff0000">TUG 5. MLG23-0086</td>
            </tr>
            {{-- row 33 --}}
            <tr>
                <td class="hidetb"></td>
                <td class="fntb hide fontl" colspan="3">IDPEL</td>
                <td class="fntb hide">:</td>
                <td class="fntb hide fontl" colspan="7">513051752108</td>
                <td class="hidetb" colspan="2"></td>
            </tr>
            {{-- row 34 --}}
            <tr>
                <td class="hidetb"></td>
                <td class="fntb hide fontl" colspan="3">NAMA PELANGGAN</td>
                <td class="fntb hide">:</td>
                <td class="fntb hide fontl" colspan="7">DARMAWAN</td>
                <td class="hidetb" colspan="2"></td>
            </tr>
            {{-- row 35 --}}
            <tr>
                <td class="hidetb"></td>
                <td class="fntb hide fontl" colspan="3">ALAMAT PELANGGAN</td>
                <td class="fntb hide">:</td>
                <td class="fntb hide fontl" colspan="7">JL RAYA PAKISAJI NO 23 RT 1 RW 1 PAKISAJI KEPANJEN</td>
                <td class="hidetb" colspan="2"></td>
            </tr>
            {{-- row 36 --}}
            <tr>
                <td class="hidetb"></td>
                <td class="fntb hide fontl" colspan="3">DAYA</td>
                <td class="fntb hide">:</td>
                <td class="fntb hide fontl" colspan="1">PB</td>
                <td class="fntb hide" colspan="2"></td>
                <td class="fntb hide" colspan="1">ke</td>
                <td class="fntb hide" colspan="3">I2 / 66000 VA</td>
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
                <td class="fntb hide fontl" colspan="4">.......................</td>
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
                <td class="fntb hide" colspan="3">CHUSNUL</td>
                <td class="hide" colspan="2"></td>
                <td class="fntb hide" colspan="3">.................</td>
                <td class="hide"></td>
                <td class="fntb hide" colspan="5">MONIKA ROHMATUS S.</td>
            </tr>
        </table>
    </div>
</body>
</html>