<!DOCTYPE html>
<html lang="en">    
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Mono&display=swap" rel="stylesheet">

    <style>
        /* Set A4 size */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        @page {
            size: A4;
            margin: 0;
        }

        @media print {
            .dpm {
                background-color: #3ea534 !important
            }
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
            width: 80%;
            /* Adjust the width as needed */
            height: 80%;
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

        .dpm {
            background-color: #3ea534
        }
    </style>
</head>
<body style="background-color: rgb(139, 139, 139)">
    <div class="content fnt">
        <table>
            {{-- row 0, 15 column --}}
            <tr>
                <td style="height: 10px; width: 80px"></td>
                <td style="width: 70px"></td>
                <td style="width: 40px"></td>
                <td style="width: 40px"></td>
                <td style="width: 40px"></td>
                <td style="width: 100px"></td>
                <td style="width: 45px"></td>
                <td style="width: 90px"></td>
                <td style="width: 70px"></td>
                <td style="width: 30px"></td>
                <td style="width: 30px"></td>
                <td style="width: 30px"></td>
                <td style="width: 50px"></td>
                <td style="width: 50px"></td>
                <td style="width: 50px"></td>
            </tr>
            {{-- row 1 --}}
            <tr>
                <td class="hide" colspan="15" style="height: 14px"></td>
            </tr>
            {{-- row 2 --}}
            <tr>
                <td class="hide" style="height: 40px;"></td>

                <td class="fntarial pdtb fontl hide" colspan="8" style="font-size: 10px;">PT PLN (PERSERO)</td>
                <td class="fntarial pdtb hide" colspan="5">1. Pengantar 2. Security 3. Pengambil material</td>
            </tr>
            {{-- row 3 --}}
            <tr>
                <td class="hide"></td>
                <td class="fntarial pdtb fontl hide" colspan="8">UNIT INDUK DISTRIBUSI (UID) JAWA TIMUR</td>
                <td class="fntarial pdtb" colspan="5">PERHATIAN :</td>
            </tr>
            {{-- row 4 --}}
            <tr>
                <td class="hide" style="height: 40px;"></td>
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
                <td class="fntarial pdtb hide" colspan="15" style="font-size: 18px;">SURAT ANGKUTAN</td>
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
                <td class="fntb bdottb pdtb fnt12">1</td>
                <td class="fntb bdottb pdtb fnt12" colspan="5">UNIV ACC;COVER BUSHING TRAFO</td>
                <td class="fntb bdottb pdtb fnt12" colspan="2">1030074</td>
                <td class="fntb bdottb pdtb fnt12" colspan="">U</td>
                <td class="fntb bdottb pdtb fnt12" colspan="3"></td>
                <td class="fntb bdottb pdtb fnt12" colspan="2">1</td>
            </tr>
            {{-- row 20 --}}
            <tr>

            </tr>
            {{-- row 21 --}}
            <tr>

            </tr>
        </table>
    </div>
</body>
</html>
