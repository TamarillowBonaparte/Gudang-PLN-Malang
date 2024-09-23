<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>PLN ARM MALANG</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

  <!-- Favicons -->
  <link href="{{ asset('admin/assets/img/logo pln.png') }}" rel="icon">
  <link href="{{ asset('admin/assets/img/apple-touch-icon.png') }}" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{ asset('admin/assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
  <link href="{{ asset('admin/assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
  <link href="{{ asset('admin/assets/vendor/boxicons/css/boxicons.min.css')}}" rel="stylesheet">
  <link href="{{ asset('admin/assets/vendor/quill/quill.snow.css')}}" rel="stylesheet">
  <link href="{{ asset('admin/assets/vendor/quill/quill.bubble.css')}}" rel="stylesheet">
  <link href="{{ asset('admin/assets/vendor/remixicon/remixicon.css')}}" rel="stylesheet">
  <link href="{{ asset('admin/assets/vendor/simple-datatables/style.css')}}" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="{{asset('admin/assets/css/style.css')}}" rel="stylesheet">

  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>



</head>

<body>
  <!-- ======= Header =======-->
  @include('headergudang')

  <main id="mai" class="main">
    <div class="pagetitle">
      <h1>Dashboard</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item active">Dashboard</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section mt-5 ms-4 me-4">
      <div class="row">
        <div class="col-lg-12">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">DPB/DPM Belum Memiliki Surat Jalan</h5>
              <!-- Table with stripped rows -->
              <table class="table datatable">
                <thead>
                  <tr>
                    <th><b>Tanggal Diminta</b></th>
                    <th><b>Nomer Surat</b></th>
                    <th><b>Vendor</b></th>
                    <th><b>Pelanggan</b></th>
                    <th><b>No. Polisi</b></th>
                    <th><b>Pengemudi</b></th>
                    <th><b>Action</b></th>
                  </tr>
                </thead>
                <tbody>
                @forelse ($dpmOngoing as $ongoing)
                <tr>
                  <form action="{{ route('cetaksrtjln') }}" method="POST">
                    @csrf
                    <td style="display:none;"><input type="text" name="idsrtjln" value="{{ $ongoing->id_srtjln }} "></td>
                    <td>{{ $ongoing->tgl }}</td>
                    <td>{{ $ongoing->nomor }}</td>
                    <td>{{ $ongoing->vendor }}</td>
                    <td>{{ $ongoing->pelanggan }}</td>
                    <td>
                        <input type="text" name="nopol" class="form-control" placeholder="Contoh: N 1234 CG" maxlength="11" required oninput="this.value = this.value.toUpperCase();">
                    </td>
                    <td>
                        <input type="text" name="pengemudi" class="form-control" oninput="this.value = this.value.replace(/[^a-zA-Z\s]/g, '').toUpperCase();"  required>
                    </td>
                    </td>
                    <td>
                        <button type="submit" class="btn btn-outline-success" onclick="return confirmSubmit()">Cetak</button>
                      </td>
                  </form>
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
    
    <script>
        function confirmSubmit() {
          // Dialog konfirmasi bawaan browser
          return confirm('Apakah Anda yakin ingin mencetak?');
        }
      </script>


    <section class="section ms-4 me-4">
      <div class="row">
        <div class="col-lg-12">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Sudah Memiliki Surat Jalan</h5>
              <!-- Table with stripped rows -->
              <table class="table datatable">
                <thead>
                  <tr>
                    <th><b>Nomer Surat Jalan</b></th>
                    <th><b>Tanggal Cetak</b></th>
                    <th><b>Nomer DPM/DPB</b></th>
                    <th><b>Vendor</b></th>
                    <th><b>No. Polisi</b></th>
                    <th><b>Pengemudi</b></th>
                    <th><b>Action</b></th>
                  </tr>
                </thead>
                <tbody>
                  @forelse ($dpm as $dpb)
                    <tr>
                      <td>{{ $dpb->nosj }}</td>
                      <td>{{ $dpb->tgldicetak }}</td>
                      <td>{{ $dpb->nomor }}</td>
                      <td>{{ $dpb->vendor }}</td>
                      <td>{{ $dpb->nomor_polisi }}</td>
                      <td>{{ $dpb->pengemudi }}</td>
                      <td>
                        <a href="#" class="btn btn-sm btn-outline-secondary me-1">
                          <i class="bi bi-eye"></i>
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

  </main> <!-- End #main -->

  </main><!-- End #main -->

  <!-- ======= footer ======= -->
  @include('footergudang')
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="{{asset('admin/assets/vendor/apexcharts/apexcharts.min.js')}}"></script>
  <script src="{{asset('admin/assets/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
  <script src="{{asset('admin/assets/vendor/chart.js/chart.umd.js')}}"></script>
  <script src="{{asset('admin/assets/vendor/echarts/echarts.min.js')}}"></script>
  <script src="{{asset('admin/assets/vendor/quill/quill.js')}}"></script>
  <script src="{{asset('admin/assets/vendor/simple-datatables/simple-datatables.js')}}"></script>
  <script src="{{asset('admin/assets/vendor/tinymce/tinymce.min.js')}}"></script>
  <script src="{{asset('admin/assets/vendor/php-email-form/validate.js')}}"></script>

  <!-- Template Main JS File -->
  <script src="{{asset('admin/assets/js/main.js')}}"></script>

</body>

</html>
