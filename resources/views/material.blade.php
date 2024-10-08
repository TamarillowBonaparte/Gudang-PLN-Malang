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

  <!-- ======= Header =======--->
  @include('header')

  <!-- ======= Siderbar =======--->
  @include('sidebar')

  <main id="main" class="main">
    <div class="pagetitle">
      <h1>Material</h1>
      <nav>
        <div class="row">
          <div class="col">
            <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ url('home') }}">Dashboard</a></li>
            <li class="breadcrumb-item active">Material</li>
          </ol>
        </div>
          <div class="col d-flex justify-content-end">
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#tmbhMat"><i class="bi bi-plus"></i>Tambah Material Baru</button></div>
        </div>
      </nav>
    </div><!-- End Page Title -->
    
    <section class="section">
      <div class="row">
        <div class="col-lg-12">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Tabel Material</h5>
              <!-- Table with stripped rows -->
              <table id="material" class="table datatable">
                <thead>
                  <tr>
                    <th>
                      <b>Nama Material</b>
                    </th>
                    <th>Deskripsi Material</th>
                    <th>Normalisasi</th>
                    <th>Satuan</th>
                    <th>Bagian</th>
                    <th>Jumlah</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  @forelse ($materials as $material)
                  <tr>
                    <td>{{ $material->nama }}</td>
                    <td>{{ $material->deskripsi }}</td>
                    <td>{{ $material->normalisasi }}</td>
                    <td>{{ $material->satuan }}</td>
                    <td>{{ $material->bagian }}</td>
                    <td>{{ $material->jumlah_sap }}</td>
                    <td>                      
                      <button type="button" class="btn btn-outline-secondary btn-sm" data-bs-toggle="modal" data-bs-target="#edittmbh"><i class="bi bi-pencil"></i> Edit/Tambah</button>
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

    <div class="row">
      <div class="col">
        <section class="section">
          <div class="row">
            <div class="col-lg-12">
              <div class="card">
                <div class="card-body">
                  <h5 class="card-title" style="color: red">Material Keluar<i class="bi bi-dash"></i></h5>
                  <!-- Table with stripped rows -->
                  <table class="table datatable">
                    <thead>
                      <tr>
                        <th>
                          <b>Nama Material</b>
                        </th>
                        <th>Tanggal</th>
                      </tr>
                    </thead>
                    <tbody>
                    </tbody>
                  </table>
                  <!-- End Table with stripped rows -->
                </div>
              </div>
            </div>
          </div>
        </section>
      </div>
      <div class="col">
        <section class="section">
          <div class="row">
            <div class="col-lg-12">
              <div class="card">
                <div class="card-body">
                  <h5 class="card-title" style="color: green">Material Masuk<i class="bi bi-plus"></i></h5>
                  <!-- Table with stripped rows -->
                  <table class="table datatable">
                    <thead>
                      <tr>
                        <th>
                          <b>Nama Material</b>
                        </th>
                        <th>Tanggal</th>
                      </tr>
                    </thead>
                    <tbody>
                    </tbody>
                  </table>
                  <!-- End Table with stripped rows -->
                </div>
              </div>
            </div>
          </div>
        </section>
      </div>
    </div>

    <section class="section">
      <div class="row">
        <div class="col-lg-12">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Tabel Material Bekas</h5>
              <!-- Table with stripped rows -->
              <table class="table datatable">
                <thead>
                  <tr>
                    <th>
                      <b>Nama Material</b>
                    </th>
                    <th>Deskripsi Material</th>
                    <th>Normalisasi</th>
                    <th>Satuan</th>
                    <th>Bagian</th>
                    <th>Jumlah</th>
                  </tr>
                </thead>
                <tbody>
                </tbody>
              </table>
              <!-- End Table with stripped rows -->
            </div>
          </div>
        </div>
      </div>
    </section>

    {{-- modal tambah material baru --}}
    <div class="modal fade" id="tmbhMat" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-header">
            <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Material Baru</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <form action="#" method="POST">
              <div class="form-group row mb-2" id="perinput">
                <label class="col-sm-3 col-form-label">Nama:<span style="color: red;">*</span></label>
                <div class="col-sm-9">
                    <input type="text" id="namaMat" name="namaMat" class="form-control" placeholder="" autocomplete="off">
                </div>
              </div>

              <div class="form-group row mb-2" id="perinput">
                <label class="col-sm-3 col-form-label">normalisasi:<span style="color: red;">*</span></label>
                <div class="col-sm-9">
                    <input type="text" id="normalisasi" name="normalisasi" class="form-control" placeholder="" autocomplete="off">
                </div>
              </div>

              <div class="form-group row mb-2" id="perinput">
                <label class="col-sm-3 col-form-label">Derkripsi:</label>
                <div class="col-sm-9">
                    <input type="text" id="deskripsi" name="deskripsi" class="form-control" placeholder="" autocomplete="off">
                </div>
              </div>

              <div class="form-group row mb-2" id="perinput">
                <label class="col-sm-3 col-form-label">Satuan:<span style="color: red;">*</span></label>
                <div class="col-sm-9">
                    <input type="text" id="satuan" name="satuan" class="form-control" placeholder="" autocomplete="off">
                </div>
              </div>

              <div class="form-group row mb-2" id="perinput">
                <label class="col-sm-3 col-form-label">Bagian:</label>
                <div class="col-sm-9">
                    <input type="text" id="bagian" name="bagian" class="form-control" placeholder="" autocomplete="off">
                </div>
              </div>

              <div class="form-group row" id="perinput">
                <label class="col-sm-3 col-form-label">Jumlah SAP:<span style="color: red;">*</span></label>
                <div class="col-sm-9">
                    <input type="text" id="jlmh" name="jlmh" class="form-control" placeholder="" autocomplete="off">
                </div>
              </div>

            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
              <button type="button" class="btn btn-primary">Simpan</button>
            </form>
          </div>
        </div>
      </div>
    </div>
    {{-- modal edit/tambah material --}}
    <div class="modal fade" id="edittmbh" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-header">
            <h1 class="modal-title fs-5" id="exampleModalLabel">Edit/Tambah</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">

          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
            <button type="button" class="btn btn-primary">Simpan</button>
          </div>
        </div>
      </div>
    </div>
  </main>

  <!-- ======= Footer ======= -->
  @include('footer')

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
