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
              <h5 class="card-title">DPB Belum Memiliki Surat Jalan</h5>
              <table class="table datatable">
                <thead>
                  <tr>
                    <th>Tanggal Diminta</th>
                    <th>Nomer Surat</th>
                    <th>Vendor</th>
                    <th>Pelanggan</th>
                    <th>No. Polisi</th>
                    <th>Pengemudi</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody id="dpmOngoing">
                  @forelse ($dpmOngoing as $ongoing)
                  <tr>
                    <td style="display: none;"><input type="text" name="idsrtjln" value="{{ $ongoing->id_srtjln }}"></td>
                    <td>{{ \Carbon\Carbon::parse($ongoing->tgl)->translatedFormat('d M Y') }}</td>
                    <td>{{ $ongoing->nomor }}</td>
                    <td>{{ $ongoing->vendor }}</td>
                    <td>{{ $ongoing->pelanggan }}</td>
                    <td style="text-align: center">-</td>
                    <td style="text-align: center">-</td>
                    <td>
                      <a href="{{ route('editdatasurat', ['id' => Crypt::encryptString($ongoing->id_srtjln)]) }}" class="btn btn-sm btn-outline-success" target="_blank"><i class="bi bi-pencil"></i> Edit</a>
                    </td>
                  </tr>
                  @empty
                  <tr>
                    <td colspan="7" style="text-align: center">Belum ada permintaan</td>
                  </tr>
                  @endforelse
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col-lg-12">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Riwayat Edit Surat Jalan</h5>
              <table class="table datatable">
                <thead>
                  <tr>
                    <th>Tanggal Diminta</th>
                    <th>Nomer Surat</th>
                    <th>Sebelum Diubah</th>
                    <th>Sesudah Diubah</th>
                  </tr>
                </thead>
                <tbody id="dpmOngoing">
                  {{-- @forelse ($dpmOngoing as $ongoing) --}}
                  <tr>
                    
                    <td>30 Nov 2024</td>
                    <td>TUG 5. MLG24-0005</td>
                    <td>TA</td>
                    <td>10</td>
                  </tr>
                  {{-- @empty --}}
                  <tr>
                    {{-- <td colspan="7" style="text-align: center">Belum ada data yang diubah</td> --}}
                  </tr>
                  {{-- @endforelse --}}
                </tbody>
              </table>
            </div>
          </div>
        </div>
        
        
        {{-- @if ()
            
        @else
            
        @endif

        <div class="col-lg-12">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Surat Jalan Admin</h5>
              <table class="table datatable">
                <thead>
                  <tr>
                    <th>Tanggal Diminta</th>
                    <th>Nomer Surat</th>
                    <th>Vendor</th>
                    <th>Pelanggan</th>
                    <th>No. Polisi</th>
                    <th>Pengemudi</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody id="dpmOngoing">
                  @forelse ($dpmOngoing as $ongoing)
                  <tr>
                    <td style="display: none;"><input type="text" name="idsrtjln" value="{{ $ongoing->id_srtjln }}"></td>
                    <td>{{ \Carbon\Carbon::parse($ongoing->tgl)->translatedFormat('d M Y') }}</td>
                    <td>{{ $ongoing->nomor }}</td>
                    <td>{{ $ongoing->vendor }}</td>
                    <td>{{ $ongoing->pelanggan }}</td>
                    <td style="text-align: center">-</td>
                    <td style="text-align: center">-</td>
                    <td>
                      <a href="{{ route('editdatasurat', ['id' => Crypt::encryptString($ongoing->id_srtjln)]) }}" class="btn btn-sm btn-outline-success" target="_blank"><i class="bi bi-pencil"></i> Edit</a>
                    </td>                    
                  </tr>
                  @empty
                  <tr>
                    <td colspan="7" style="text-align: center">Belum ada permintaan</td>
                  </tr>
                  @endforelse
                </tbody>
              </table>
            </div>
          </div>          
        </div> --}}

      </div>
    </section>

  </main><!-- End #main -->
{{--
  <!-- Footer -->
  @include('footergudang')
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a> --}}

  <!-- Vendor JS Files -->
  <script src="{{asset('admin/assets/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

</body>

</html>
