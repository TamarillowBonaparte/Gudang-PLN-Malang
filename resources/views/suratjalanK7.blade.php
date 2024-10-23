<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Surat Angkutan</title>
    <link rel="stylesheet" href="style_k7.css" />

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
            border-collapse: collapse;
            width: 100%;
        }

        .barang-table thead{
            border-collapse: collapse;
            font-size: 11pt;
            font-family: 'roboto mono';
            background-color: yellow;
        }

        .barang-table #yowes{
            font-size: 12pt;
            font-family: 'roboto mono';
            font-weight: bold;
        }

        .barang-table #nourut{
            text-align: center;
            width: 1.3cm;
        }

        .barang-table #namamaterial{
            width: 30%;
        }

        .barang-table #normalisasimaterial{
            width: 1pt;
        }

        .barang-table #satuan{
            width: 1pt;
            text-align: center;
        }

        .barang-table #jumlahmaterial{
            width: 1pt;
            text-align: right;
        }

        .barang-table #keterangan1{
            border-width: 0;
            width: 3.2cm;
            text-align: left;
        }

        .barang-table #keterangan2{
            border-top: 0;
            border-right: 0;
            width: 1pt;
            text-align: left;
        }

        .barang-table #keterangan3{
            border-right: 0;
            width: 3.2cm;
            text-align: left;
        }

        .barang-table #keterangan4{
            width: 3.2cm;
            text-align: center;
        }


        .barang-table #ket1{
            border-left: 0;
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
        <img src="assets/logo PLN.png" class="logo" />
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
          <td rowspan="5" id="panjangne">
            KEPADA &nbsp;:
            <br>
            <br>
            SPK NO. &ensp;:&emsp;</td>
          <td ></td>
          </tr>

          <tr>
            <td ></td>
          </tr>

          <tr>
            <td id="kiri1">PT. NATA USAHA BERSAMA</td>
          </tr>

          <tr>
            <td></td>
          </tr>

          <tr>
          <td id="kiri2">8039/PJ/DAN.01.03/F04700080/2024 - PK/REN.UP3-MLG/2024</td>
          </tr>


          </table>

        </div>
      </div>

      <table class="barang-table">
        <thead>
          <tr>
            <th>No. Urut</th>
            <th>Nama Material</th>
            <th>Normalisasi <br> Material</th>
            <th>Satuan</th>
            <th>Jumlah <br> Material</th>
            <th colspan="2">Keterangan</th>
          </tr>

        </thead>
        <tbody>
          <tr id="yowes">
            <td id="nourut"              rowspan="2">1</td>
            <td id="namamaterial"        rowspan="2">BOX;APPVI TR 53 KVA;AL PLATE 2MM;</td>
            <td id="normalisasimaterial" rowspan="2"></td>
            <td id="satuan"              rowspan="2">M</td>
            <td id="jumlahmaterial"      rowspan="2">1</td>
            <td id="keterangan1"         >NO RESERVASI</td>
            <td id="ket1"                rowspan="2">&nbsp;DI</td>
          </tr>

          <tr id="yowes">
            <td id="keterangan2">SAP :</td>
          </tr>

          <tr id="yowes">
            <td id="nourut"              rowspan="2">1</td>
            <td id="namamaterial"        rowspan="2">BOX;APPVI TR 53 KVA;AL PLATE 2MM;</td>
            <td id="normalisasimaterial" rowspan="2"></td>
            <td id="satuan"              rowspan="2">M</td>
            <td id="jumlahmaterial"      rowspan="2">1</td>
            <td id="keterangan1"         >NAMA</td>
            <td id="ket1"                rowspan="2">&nbsp;DA</td>
          </tr>

          <tr id="yowes">
            <td id="keterangan2">PELANGGAN :</td>
          </tr>

          <tr id="yowes">
            <td id="nourut"              >1</td>
            <td id="namamaterial"        >BOX;APPVI TR 53 KVA;AL PLATE 2MM;</td>
            <td id="normalisasimaterial" ></td>
            <td id="satuan"              >M</td>
            <td id="jumlahmaterial"      >1</td>
            <td id="keterangan3"         >ULP :</td>
            <td id="ket1"                >&nbsp;DA</td>
            </tr>

            <tr id="yowes">
              <td id="nourut"              >1</td>
              <td id="namamaterial"        >BOX;APPVI TR 53 KVA;AL PLATE 2MM;</td>
              <td id="normalisasimaterial" ></td>
              <td id="satuan"              >M</td>
              <td id="jumlahmaterial"      >1</td>
              <td id="keterangan3"         >ALAMAT</td>
              <td id="ket1"                >&nbsp;DA</td>
              </tr>

              <tr id="yowes">
                <td id="nourut"              >1</td>
                <td id="namamaterial"        >BOX;APPVI TR 53 KVA;AL PLATE 2MM;</td>
                <td id="normalisasimaterial" ></td>
                <td id="satuan"              >M</td>
                <td id="jumlahmaterial"      >1</td>
                <td id="keterangan3"         >PB / PD :</td>
                <td id="ket1"                >&nbsp;DA</td>
                </tr>

                <tr id="yowes">
                  <td id="nourut"              >1</td>
                  <td id="namamaterial"        >BOX;APPVI TR 53 KVA;AL PLATE 2MM;</td>
                  <td id="normalisasimaterial" ></td>
                  <td id="satuan"              >M</td>
                  <td id="jumlahmaterial"      >1</td>
                  <td id="keterangan3"         ></td>
                  <td id="ket1"                ></td>
                  </tr>

                  <tr id="yowes">
                    <td id="nourut"              >1</td>
                    <td id="namamaterial"        >BOX;APPVI TR 53 KVA;AL PLATE 2MM;</td>
                    <td id="normalisasimaterial" ></td>
                    <td id="satuan"              >M</td>
                    <td id="jumlahmaterial"      >1</td>
                    <td id="keterangan3"         >ID PELANGGAN :</td>
                    <td id="ket1"                >&nbsp;DA</td>
                    </tr>

                    <tr id="yowes">
                      <td id="nourut"                  >1</td>
                      <td id="namamaterial"            >BOX;APPVI TR 53 KVA;AL PLATE 2MM;</td>
                      <td id="normalisasimaterial"     ></td>
                      <td id="satuan"                  >M</td>
                      <td id="jumlahmaterial"          >1</td>
                      <td id="keterangan4" colspan="2" >TUG 123989132D</td>
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
