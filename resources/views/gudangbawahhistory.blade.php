<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>PLN ARM MALANG</title>
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <!-- Favicons -->
  <link href="{{ asset('admin/assets/img/logo pln.png') }}" rel="icon">
  <link href="{{ asset('admin/assets/img/apple-touch-icon.png') }}" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans|Nunito|Poppins" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{ asset('admin/assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
  <link href="{{ asset('admin/assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
  <link href="{{ asset('admin/assets/vendor/simple-datatables/style.css')}}" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="{{asset('admin/assets/css/style.css')}}" rel="stylesheet">

  <style>
    /* Add the custom styles here */
    .main {
        transition: margin-left 0.3s ease;
        margin-left: 250px;
        padding: 20px;
        margin-top: 50px;
    }

    .table {
        width: 100%;
        overflow-x: auto;
    }
  </style>
</head>

<body>

  <!-- Header -->
  @include('headergudang')

  <!-- Sidebar -->
  @include('sidebargudangbawah')

  <main id="mai" class="main">
    <div class="pagetitle">
      <h1>Riwayat Surat Yang Sudah Memiliki Surat Jalan</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item active">Riwayat Surat Jalan</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section ms-4 me-4">
      <div class="row">
        <div class="col-lg-12">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Sudah Memiliki Surat Jalan</h5>
              <table class="table datatable">
                <thead>
                  <tr>
                    <th>Nomer Surat Jalan</th>
                    <th>Tanggal Cetak</th>
                    <th>Nomer DPM/DPB</th>
                    <th>Vendor</th>
                    <th>No. Polisi</th>
                    <th>Pengemudi</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody id="table_dpm">
                  @forelse ($dpm as $dpb)
                    <tr>
                      <td>{{ $dpb->nosj }}</td>
                      <td>{{ \Carbon\Carbon::parse($dpb->tgldicetak)->format('d M Y') }}</td>
                      <td>{{ $dpb->nomor }}</td>
                      <td>{{ $dpb->vendor }}</td>
                      <td>{{ $dpb->nomor_polisi }}</td>
                      <td>{{ $dpb->pengemudi }}</td>
                      <td>
                        <a href="{{ route('gudangbawah.show', Crypt::encrypt($dpb->idsrt)) }}" class="btn btn-sm btn-outline-secondary"><i class="bi bi-eye"></i> Detail</a>
                      </td>
                    </tr>
                  @empty
                  @endforelse
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </section>

  </main><!-- End #main -->

  <!-- Footer -->
  {{-- @include('footergudang')
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a> --}}


  <!-- Vendor JS Files -->
  <script src="{{asset('admin/assets/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

</body>

</html>
