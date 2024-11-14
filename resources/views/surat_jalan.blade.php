<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>PLN ARM MALANG</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="{{ asset('admin/assets/img/logo pln.png') }}" rel="icon">
  <link href="{{ asset('admin/assets/img/apple-touch-icon.png') }}" rel="apple-touch-icon">

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
</head>

<body>

  <!-- ======= Header ======= -->
  @include('header')

  <!-- ======= Sidebar ======= -->
  @include('sidebar')

  <main id="main" class="main">
    <div class="pagetitle">
      <h1>Surat Jalan</h1>
      <nav>
        <div class="row">
          <div class="col">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="{{ url('home') }}">Dashboard</a></li>
              <li class="breadcrumb-item">Surat Jalan</li>
            </ol>
          </div>
          <div class="col d-flex justify-content-end">
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#tmbhMat"><i class="bi bi-plus"></i>Tambah Surat Jalan Baru</button>
          </div>
        </div>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
        <div class="col-lg-12">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Tabel Riwayat Surat Jalan</h5>

              <!-- Table with stripped rows -->
              <table class="table datatable">
                <thead>
                  <tr>
                    <th>
                      <b>Tanggal Dikirim</b>
                    </th>
                    <th>
                      <b>Nomer Surat Jalan</b>
                    </th>
                    <th>No. DPM/DPB</th>
                    <th>Pengemudi</th>
                    <th>Plat Nomer Kendaraan</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  @forelse ($suratjalan as $item)
                  <tr>
                    <td>{{ \Carbon\Carbon::parse($item->tgldicetak)->format('d M Y') }}</td>
                    <td>{{ $item->nosj }}</td>
                    <td>{{ $item->nomor_dpb }}</td>
                    <td>{{ $item->pengemudi }}</td>
                    <td>{{ $item->nomor_polisi }}</td>
                    <td>
                      <a href="#" class="btn btn-sm btn-outline-secondary me-1">
                        <i class="bi bi-download"></i> Download
                      </a>
                      <a href="#" class="btn btn-sm btn-outline-secondary">
                        <i class="bi bi-printer"></i> Print
                      </a>
                    </td>
                  </tr>
                  @empty
                      
                  @endforelse                  
                </tbody>
              </table>
              <!-- End Table with stripped rows -->
            </div>
          </div>
        </div>
      </div>
    </section>
  </main><!-- End #main -->

  {{-- modal tambah material baru --}}
  <div class="modal fade" id="tmbhMat" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Material Baru</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form action="{{ route('materialBaru') }}" method="POST">
              @csrf
              <div class="form-group row mb-2" id="perinput">
                <label class="col-sm-3 col-form-label">Nama:<span style="color: red;">*</span></label>
                <div class="col-sm-9">
                    <input type="text" id="namaMat" name="namaMat" class="form-control" autocomplete="off">
                </div>
              </div>

              <div class="form-group row mb-2" id="perinput">
                <label class="col-sm-3 col-form-label">Normalisasi:<span style="color: red;">*</span></label>
                <div class="col-sm-9">
                    <input type="number" id="normalisasi" name="normalisasi" class="form-control" autocomplete="off">
                </div>
              </div>

              <div class="form-group row mb-2" id="perinput">
                <label class="col-sm-3 col-form-label">Deskripsi:</label>
                <div class="col-sm-9">
                  <textarea class="form-control" id="deskripsi" name="deskripsi" rows="2" autocomplete="off"></textarea>
                </div>
              </div>

              <div class="form-group row mb-2" id="perinput">
                  <label class="col-sm-3 col-form-label">Satuan:<span style="color: red;">*</span></label>
                  <div class="col-sm-9">
                      <select id="satuan" name="satuan" class="form-select" required>
                          <option value="" disabled selected>Pilih</option>
                          <option value="BH">BH</option>
                          <option value="U">U</option>
                          <option value="M">M</option>
                          <option value="SET">SET</option>
                          <option value="BGT">BGT</option>
                      </select>
                  </div>
              </div>

              <div class="form-group row mb-2" id="perinput">
                <label class="col-sm-3 col-form-label">Bagian:</label>
                <div class="col-sm-9">
                    <input type="text" id="bagian" name="bagian" class="form-control" autocomplete="off">
                </div>
              </div>

              <div class="form-group row" id="perinput">
                <label class="col-sm-3 col-form-label">Jumlah SAP:<span style="color: red;">*</span></label>
                <div class="col-sm-9">
                    <input type="number" id="jlmh" name="jumlah_sap" class="form-control" autocomplete="off">
                </div>
              </div>

              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                <button type="submit" class="btn btn-primary">Simpan</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>

  <!-- ======= Footer ======= -->
  @include('footer')
 <!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="{{asset ('admin/assets/vendor/apexcharts/apexcharts.min.js')}}"></script>
  <script src="{{asset ('admin/assets/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
  <script src="{{asset ('admin/assets/vendor/chart.js/chart.umd.js')}}"></script>
  <script src="{{asset ('admin/assets/vendor/echarts/echarts.min.js')}}"></script>
  <script src="{{asset ('admin/assets/vendor/quill/quill.js')}}"></script>
  <script src="{{asset ('admin/assets/vendor/simple-datatables/simple-datatables.js')}}"></script>
  <script src="{{asset ('admin/assets/vendor/tinymce/tinymce.min.js')}}"></script>
  <script src="{{asset ('admin/assets/vendor/php-email-form/validate.js')}}"></script>

  <!-- Template Main JS File -->
  <script src="{{asset ('admin/assets/js/main.js')}}"></script>
</body>
</html>
