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
    <div class="fnt mt-3 md-3">
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
                <td class="altbntu" style="width: 40px"></td>
                <td class="altbntu" style="width: 20px"></td>
                <td class="altbntu" style="width: 20px"></td>
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
            @forelse ($sja as $item)
            <tr>
                <td class="fntb pdtb hide" colspan="15">{{ $item->nsj }}</td>
            </tr>
            {{-- row 9 --}}
            <tr>
                <td class="hide" colspan="15" style="height: 14px"></td>
            </tr>
            {{-- row 10 --}}                
            <td style="display: none;"><input type="text" name="idsj" value="{{ $item->idsj }}"></td>
            <td style="display: none;"><input type="text" name="idsja" value="{{ $item->id }}"></td>
            <tr>
                <td class="fntb pdtb fontl hide chnpp" colspan="2">Kendaraan No.</td>
                <td class="fntb pdtb hide">:</td>
                <td class="{{ $item->nopol === null ? 'fntb pdtb fontl hide fontbott' : 'fntb pdtb fontl hide' }}" colspan="4">
                    @if($item->nopol === null)
                        ..............
                    @else
                        {{ $item->nopol }}
                    @endif
                </td>
                <td class="fntb pdtb fontl hide" colspan="6">{{ ($item->kepada == null ) ? 'KEPADA : ' : "KEPADA : ".$item->kepada }}</td>                
            </tr>
            {{-- row 11 --}}
            <tr>
                <td class="fntb pdtb fontl hide chnpp" colspan="2">Nama Pengemudi</td>
                <td class="fntb pdtb hide">:</td>
                <td class="{{($item->pengemudi == null ) ? "fntb pdtb fontl hide fontbott" : "fntb pdtb fontl hide" }}" colspan="11">
                    @if($item->pengemudi === null)
                    ..............
                    @else
                        {{ $item->pengemudi }}
                    @endif
                </td>
            </tr>
            {{-- row 12 --}}
            <tr>
                <td class="fntb pdtb fontl hide chnpp" colspan="2">Dari Logistik</td>
                <td class="fntb pdtb hide">:</td>
                <td class="fntb pdtb fontl hide" colspan="4">UP3 MALANG</td>
                <td class="fntb pdtb fontl hide" colspan="6">{{ ($item->alamat == null ) ? 'ALAMAT : ' : "ALAMAT : ".$item->alamat }}</td>
            </tr>
            @empty
                
            @endforelse
            {{-- row 13 --}}
            <tr>
                <td class="hide" colspan="8"></td>
                <td class="fntb pdtb fontl hide" colspan="6"></td>
            </tr>
            {{-- row 14 --}}
            <tr>
                <td class="hide" colspan="8"></td>
                <td class="fntb pdtb fontl hide" colspan="6"></td>
            </tr>
            {{-- row 15 --}}
            <tr>
                <td class="hide" colspan="15" style="height: 14px"></td>
            </tr>
            {{-- row 16 --}}
            <tr>
                <td class="fntb pdtb hideb fontbott" style="height: 25px">No.</td>
                <td class="fntb pdtb hideb fontbott" colspan="4">Nama Barang</td>
                <td class="fntb pdtb hideb fontbott" colspan="1">No.</td>
                <td class="fntb pdtb hideb fontbott">Sa-</td>
                <td class="fntb pdtb" colspan="1">Banyak yang diminta</td>
                <td class="fntb pdtb" colspan="2">Banyak yang diberikan</td>
                <td class="fntb pdtb"colspan="4" rowspan="2">Keterangan</td>
            </tr>
            {{-- row 17 --}}
            <tr>
                <td class="fntb pdtb hidet fonttop" style="height: 25px">Urut</td>
                <td class="fntb pdtb hidet fonttop" colspan="4">(ditulis selengkap - lengkapnya)</td>
                <td class="fntb pdtb hidet fonttop" colspan="1">Normalisasi</td>
                <td class="fntb pdtb hidet fonttop">tuan</td>
                <td class="fntb pdtb hidet" colspan="1">dengan angka</td>
                <td class="fntb pdtb hidet" colspan="2">dengan angka</td>
            </tr>
            {{-- row 18 --}}
            <tr>
                <td class="bdottb" colspan="" style="height: 10px"></td>
                <td class="bdottb" colspan="4" style="height: 10px"></td>
                <td class="bdottb" colspan="1" style="height: 10px"></td>
                <td class="bdottb" colspan="" style="height: 10px"></td>
                <td class="bdottb" colspan="1" style="height: 10px"></td>
                <td class="bdottb" colspan="2" style="height: 10px"></td>
                <td class="bdottb" colspan="4"></td>
            </tr>
            {{-- row 19 --}}
            @forelse ($dmsja as $item)
            <tr>
                <td class="fntb bdottb pdtb fnt12 itmth">{{ $loop->iteration }}</td>
                <td style="display: none"><input type="text" name="idmat[]" id="" value="{{ $item->id_material }}"></td>
                <td class="fntb bdottb pdtb fnt12 itmth" colspan="4" style="padding-left: 5px; padding-right: 5px">{{ $item->nama }}</td>
                <td class="fntb bdottb pdtb fnt12 itmth" colspan="1">{{ $item->normalisasi }}</td>
                <td class="fntb bdottb pdtb fnt12 itmth" colspan="1">{{ $item->satuan }}</td>
                <td class="fntb bdottb pdtb fnt12 itmth" colspan="1">{{ $item->jumlah_diminta }}</td>
                <td class="fntb bdottb pdtb fnt12 itmth" colspan="2">
                    @if ($item->jumlah_diberi == null)
                    TA
                    @else
                    {{ $item->jumlah_diberi }}
                    @endif                        
                </td>
                <td class="fntb bdottb pdtb fnt12 itmth" colspan="4"></td>
            </tr>
            @empty
                
            @endforelse
            
            @for ($i = $list; $i <= 22; $i++)
            <tr>
                <td class="fntb bdottb pdtb fnt12 itmth"></td>
                <td class="fntb bdottb pdtb fnt12 itmth" colspan="4"></td>
                <td class="fntb bdottb pdtb fnt12 itmth" colspan="1"></td>
                <td class="fntb bdottb pdtb fnt12 itmth" colspan="1"></td>
                <td class="fntb bdottb pdtb fnt12 itmth" colspan="1"></td>
                <td class="fntb bdottb pdtb fnt12 itmth" colspan="2"></td>
                <td class="fntb bdottb pdtb fnt12 itmth" colspan="4"></td>
            </tr>
            @endfor
            {{-- row 29 --}}
            <tr>
                <td class="bdottb" colspan="" style="height: 10px"></td>
                <td class="bdottb" colspan="4" style="height: 10px"></td>
                <td class="bdottb" colspan="1" style="height: 10px"></td>
                <td class="bdottb" colspan="1" style="height: 10px"></td>
                <td class="bdottb" colspan="1" style="height: 10px"></td>
                <td class="bdottb" colspan="2" style="height: 10px"></td>
                <td class="bdottb" colspan="4"></td>
            </tr>
            @forelse ($sja as $item)                            
            <tr>
                <td colspan="10"></td>
                <td class=" fntb" colspan="4" style="font-size: 24px; height: 50px; background-color: rgb(211, 211, 211)">{{ $item->noperm }}</td>
            </tr>
            {{-- row 38 --}}
            <tr>
                <td class="hide" colspan="15" style="height: 14px"></td>
            </tr>
            {{-- row 39 --}}
            <tr>
                <td class="fntb hide fontl" colspan="3">Diterima di: Malang</td>
                <td class="fntb hide fontl" colspan="3"></td>
                <td class="hide" colspan="3"></td>
                <td class="fntb hide" colspan="1">Malang,</td>
                <td class="fntb hide fontl" colspan="5">{{ \Carbon\Carbon::parse($item->tgl_diterima)->translatedFormat('d F Y') }}</td>
            </tr>

            {{-- row 40 --}}
            <tr>
                <td class="hide" colspan="4"></td>
                <td class="fntb hide" colspan="3">Mengetahui,</td>
                <td class="hide" colspan="6"></td>
            </tr>
            {{-- row 41 --}}
            <tr>
                <td class="fntb hide" colspan="3">Penerima,</td>
                <td class="hide" colspan="1"></td>
                <td class="fntb hide" colspan="3">Security,</td>
                <td class="hide"></td>
                <td class="fntb hide" colspan="6">Yang menyerahkan,</td>
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
                <td class="fntb hide" colspan="3">
                    @if ($item->penerima == null)
                    .................
                    @else
                    {{ $item->penerima }}
                    @endif                        
                </td>
                <td class="hide" colspan="1"></td>
                <td class="fntb hide" colspan="3">.................</td>
                <td class="hide"></td>
                <td class="fntb hide" colspan="6">{{ ($item->ygMenyerhkn == null) ? "................." : $item->ygMenyerhkn }}</td>
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