<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Surat Angkutan</title>
    <link rel="stylesheet" href="jalanDPM.css" />

    <style>
        body {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            height:  297mm;
            width: 210mm;
        }


        .kop-surat {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 10px;
        }

        .logo-container {
            padding-left: 2%;
            padding-right: 1%;
        }

        img{
            width: 45px;
        }

        .info-container {
            font-family: Arial;
            flex: auto;
            text-align: left;
        }

        .info-container p {
            margin: 2px 0;
            font-size: 10pt;
            padding: 3px;
        }

        .surat-angkutan {
            margin: 20px;
            margin-top: 30px;
            margin-bottom: 30px;
        }

        .title p {
            text-align: center;
            margin: 1px 0;
            font-family: 'roboto mono';
            font-weight: bold;
            font-size: 12pt;
        }

        .title h3 {
            text-align: center;
            text-decoration: underline;
            margin: 1px 0;
            font-family: 'arial';
            font-size: 18pt;
        }

        .detail-info {
            display: flex;
            justify-content: space-between;
            margin-top: 18px;
            font-weight: bold;
            font-family: 'roboto mono';
            font-size: 11pt;
            /* margin-bottom: 10px; */

        }

        .left-detail, .right-detail {
            width: 48%;
        }

        .left-detail p{
            height: 9%;
        }

        .right-detail {
            text-align: left;
        }

        #panjangne{
            width: 3cm;
        }

        tr td #kiri2{
            padding-top: 10px;
        }

        .barang-table {
            width: 100%;
            border-collapse: collapse;
        }

        .barang-table thead{
            width: 100%;
            border-collapse: collapse;
            font-size: 11pt;
            font-family: 'roboto mono';
        }

        .barang-table #yowes{
            font-size: 12pt;
            font-family: 'roboto mono';
            font-weight: bold;
            text-align: center;
        }

        .barang-table th, .barang-table td {
            border: 1px solid black;
        }



        #ko{
            margin: 1%;
            font-size: 11pt;
            font-family: 'roboto mono';
            font-weight: bold;
        }

        #ku{
            margin: 1% 0;
            font-size: 11pt;
            font-family: 'roboto mono';
            font-weight: bold;
        }

        #ke{
            padding-top: 21%;
        }

        #ki{
            padding-top: 10%;
        }

        .footer-info {
            margin-top: 2%;
            display: flex;
            justify-content: space-between;
            font-size: 11pt;
            font-family: 'roboto mono';
            font-weight: bold;
        }

        .left-footer, .right-footer {
            width: 48%;
        }

        .right-footer {
            text-align: right;
            padding-right: 1%;
        }

        .left-footer{
            padding-left: 1%;
        }

        .signature-section {
            display: flex;
            justify-content: space-between;
            margin-top: 20px;
            font-size: 11pt;
            font-family: 'roboto mono';
            font-weight: bold;
        }

        .left-signature, .center-signature, .right-signature {
            text-align: center;
            width: 21%;
        }

        .left-signature p, .center-signature p, .right-signature p {
            margin: 0;
        }
    </style>
  </head>
  <body>
    <div class="kop-surat">
      <div class="logo-container">
        <img src="{{ asset('images/LogoPLN.png') }}" alt="logo pln"/>
      </div>
      <div class="info-container">
        <p><strong>PT PLN (PERSERO)</strong></p>
        <p><strong>UNIT INDUK DISTRIBUSI (UID) JAWA TIMUR</strong></p>
        <p><strong>UNIT PELAKSANA PELAYANAN PELANGGAN (UP3) MALANG</strong></p>
      </div>
    </div>

    <div class="surat-angkutan">
      <div class="title">
        <h3>SURAT ANGKUTAN</h3>
        <p id="pe">......./LOG.08.02/GD. ARIES/VI/2024</p>
      </div>

      <div class="detail-info">

        <div class="left-detail">
          <p>Kendaraan No.  &emsp;&ensp;&ensp;&ensp;&nbsp;:  N 8979 BF</p>
          <p>Nama Pengemudi &emsp;&nbsp;&nbsp;&nbsp;: SULIS</p>
          <p>Dari Logistik  &emsp;&ensp;&ensp;&ensp;&ensp;&ensp;&nbsp;:  UP3 MALANG</p>
        </div>

        <div class="right-detail">

          <table>

            <tr>
              <td></td>
            </tr>
          <tr>
          <td rowspan="5" id="panjangne">SPK No. &ensp; :&emsp;</td>
          <td id="kiri1">PT. NATA USAHA BERSAMA</td>
          </tr>

          <tr>
            <td></td>
          </tr>
          <tr>
            <td></td>
          </tr>

          <tr>
          <td id="kiri2">8039/PJ/DAN.01.03/F04700080/2024 - PK/REN.UP3-MLG/2024</td>
          </tr>

          <tr>
            <td id="kiri2">JEHAWAN</td>
          </tr>


          </table>

        </div>
      </div>

      <table class="barang-table">
        <thead>
          <tr>
            <th rowspan="2">No. Urut</th>
            <th rowspan="2">Nama Barang<br />(ditulis selengkapnya)</th>
            <th rowspan="2">No. Normalisasi</th>
            <th rowspan="2">Satuan</th>
            <th>Banyaknya yang diminta</th>
            <th>Banyaknya yang dikirim</th>
          </tr>
          <tr>
            <th>dengan angka</th>
            <th>dengan angka</th>
          </tr>

        </thead>
        <tbody>
          <tr id="yowes">
            <td>1</td>
            <td>CABLE PWR; NFA2X-T; 3X70+1X70; 0.6/1kV; OH</td>
            <td>3110542</td>
            <td>M</td>
            <td>131</td>
            <td>131</td>
          </tr>
          <tr id="yowes">
            <td>2</td>
            <td>POLE ACC; STEEL WIRE GALV 35mm2</td>
            <td>3040331</td>
            <td>M</td>
            <td>9</td>
            <td>9</td>
          </tr>
          <tr id="yowes">
            <td>3</td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
          </tr>
          <tr id="yowes">
            <td>4</td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
          </tr>
          <tr id="yowes">
            <td>5</td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
          </tr>
          <tr id="yowes">
            <td>6</td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
          </tr>
          <tr id="yowes">
            <td>7</td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
          </tr>
          <tr id="yowes">
            <td>8</td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
          </tr>
          <tr id="yowes">
            <td>9</td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
          </tr>
          <tr id="yowes">
            <td>10</td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
          </tr>

          <tr>
            <td colspan="1">

            </td>

            <td colspan="1" style="border-right: 0;" id="po">
              <p id="ko">VENDOR &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;:</p>
              <p id="ko">NO. SPK &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&ensp;:</p>
              <div class="row" id="ke">
              <p id="ko">JENIS PEKERJAAN &emsp;&ensp;&ensp;&nbsp;:</p>
              <p id="ko">IDPEL &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&ensp;&nbsp;&ensp; :</p>
              <p id="ko">NAMA PELANGGAN &emsp;&ensp;&nbsp;:</p>
              <p id="ko">ALAMAT PELANGGAN &ensp;:</p>
              <br>
              <p id="ko">DAYA &emsp;&emsp;&emsp;&emsp;&ensp;&ensp;&nbsp;&ensp;&emsp;&emsp;&emsp;:</p>
              <p id="ko">ULP &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&ensp;:</p>
            </div>
            </td>

            <td colspan="3" style="border-left: 0;">
              <p id="ku">PT. NATA USAHA BERSAMA</p>
              <p id="ku">8039/PJ/DAN.01.03/F04700080/2024</p>
              <div class="row" id="ki"></div>
              <p id="ku"> SUTR</p>
              <p id="ku"> KOL/51303/20240619/0592</p>
              <p id="ku"> JEHAWAN</p>
              <p id="ku"> JL JOYO UTAMA DALANNO 468L, MERJOSARI, LOWOKWARU, KOTA MALANG, JAWA TIMUR</p>
              <div style="display: flex; padding: 0;">
              <p id="ku"> PB</p>
              <p id="ku"> ULP BATU</p>
              <p id="ku"></p>
            </div>
              <p id="ku">ULP BATU</p>
            </td>

            <td colspan="1">

            </td>
          </tr>
        </tbody>
      </table>

      <div class="footer-info">

        <div class="left-footer">
          Diterima tgl&emsp;........................
        </div>

        <div class="right-footer">
          Malang,&emsp;.............................
        </div>
      </div>

        <div class="signature-section">

          <div class="left-signature">
              <br>
              <p>Penerima,</p>
              <br>
              <br>
              <br>
              <br>
              <br>
              <p>SANTI</p>
          </div>

          <div class="center-signature">
            <p>Mengetahui,</p>
            <p>Security,</p>
            <br>
            <br>
            <br>
            <br>
            <br>
            <p>...................</p>
        </div>

          <div class="right-signature">
              <br>
              <p>Yang menyerahkan,</p>
              <br>
              <br>
              <br>
              <br>
              <br>
              <p>LIA KURNIAWATI</p>
          </div>

        </div>


  </body>
</html>
