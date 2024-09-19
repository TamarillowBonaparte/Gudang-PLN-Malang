<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

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

                <td class="fntb pdtb fontl hide" colspan="8">PT PLN (PERSERO)</td>
                <td class="fntb pdtb hide" colspan="5">1. Pengantar 2. Security 3. Pengambil material</td>
            </tr>
            {{-- row 3 --}}
            <tr>
                <td class="hide"></td>
                <td class="fntb pdtb fontl hide" colspan="8">UNIT INDUK DISTRIBUSI (UID) JAWA TIMUR</td>
                <td class="fntb pdtb" colspan="5">PERHATIAN :</td>
            </tr>
            {{-- row 4 --}}
            <tr>
                <td class="hide" style="height: 40px;"></td>
                <td class="fntb pdtb fontl hide" colspan="8">UNIT PELAKSANA PELAYANAN PELANGGAN (UP3) MALANG</td>
                <td class="fntb pdtb" colspan="5" rowspan="2">SEMUA RESIKO SETELAH MATERIAL KELUAR DARI LOGISTIK, MENJADI TANGGUNG JAWAB PENGAMBIL MATERIAL</td>
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
                <td class="fntb pdtb hide" colspan="15" style="font-size: 18px">SURAT ANGKUTAN</td>
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
                <td>SPK NO.</td>
            </tr>
            {{-- row 13 --}}
            <tr>
                <td>ULP KEPANJEN</td>
            </tr>
            {{-- row 14 --}}
            <tr>
                
            </tr>
            {{-- row 15 --}}
            <tr>
                
            </tr>
            {{-- row 16 --}}
            <tr>
                
            </tr>
        </table>
    </div>
</body>
</html>