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

  <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
  <script>
    $(document).on('click', '.edit-btn', function() {
      var materialId = $(this).data('id');
      $.ajax({
          url: '/detailmaterial/' + materialId,  // Buat route untuk menangani request ini
          type: 'GET',
          success: function(data) {

            // Isi data material ke dalam form modal
            $('#modalId').val(data[0].id_material)
            $('#modalNama').val(data[0].nama);
            $('#modalDeskripsi').val(data[0].deskripsi);
            $('#modalNormalisasi').val(data[0].normalisasi);
            $('#modalSatuan').val(data[0].satuan);
            $('#modalBagian').val(data[0].bagian);
            $('#modalJumlah').val(data[0].jumlah_sap);
          }
      });
    });
  </script>

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
                      <button type="button" class="btn btn-outline-secondary btn-sm edit-btn" data-bs-toggle="modal" data-bs-target="#edittmbh" data-id="{{ $material->id_material }}">
                        <i class="bi bi-pencil"></i> Edit/Tambah
                      </button>
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

    {{-- material masuk keluar --}}
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
                        <th>Nama Material</th>
                        <th>Jumlah</th>
                        <th>Tanggal</th>
                      </tr>
                    </thead>
                    <tbody>
                      @forelse ($materialKeluar as $item)
                      <tr>
                        <td>{{ $item->nama }}</td>
                        <td>{{ $item->jumlah }}</td>
                        <td>{{ \Carbon\Carbon::parse($item->tgl_keluar)->format('d M Y') }}</td>
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
      </div>

      <!--Tabel Material Masuk-->
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
                        <th>Nama Material</th>
                        <th>Jumlah</th>
                        <th>Tanggal</th>
                      </tr>
                    </thead>
                    <tbody>
                        @forelse ($MaterialMasuk as $matsuk)
                        <tr>
                            <td>{{$matsuk->nammat}}</td>
                            <td>{{$matsuk->jumlah}}</td>
                            <td>{{\Carbon\Carbon::parse($matsuk->tgl)->format('d M Y')}}</td>
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
      </div>
    </div>

    <!--Tabel Material Bekas-->
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

    {{-- modal edit/tambah material --}}
    <div class="modal fade" id="edittmbh" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-header">
            <h1 class="modal-title fs-5" id="exampleModalLabel">Edit/Tambah</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <form action="{{ route('tambahmaterial') }}" method="POST">
            @csrf
            <div class="modal-body">

              <input type="text" id="modalId" name="idmaterial" style="visibility: hidden;">

                <div class="form-group row mb-2">
                  <label for="tambahmaterial" class="col col-form-label">Tambah Material :</label>
                  <div class="col-sm-7">
                    <input type="text" name="tambahmaterial" id="tambahmaterial" class="form-control">
                  </div>
                </div>

                <hr>

                <div class="form-group row mb-2">
                  <label for="modalNama" class="col col-form-label">Nama Material :</label>
                  <div class="col-sm-7">
                    <input type="text" class="form-control" id="modalNama" name="modalNama">
                  </div>
                </div>

                <div class="form-group row mb-2">
                  <label for="modalNormalisasi" class="col col-form-label">Normalisasi :</label>
                  <div class="col-sm-7">
                    <input type="text" class="form-control" id="modalNormalisasi" name="modalNormalisasi">
                  </div>
                </div>                              

                <div class="form-group row mb-2">
                  <label for="modalDeskripsi" class="col col-form-label">Deskripsi Material :</label>
                  <div class="col-sm-7">
                    <textarea class="form-control" id="modalDeskripsi" name="modalDeskripsi" rows="2"></textarea>
                  </div>
                </div>

                <div class="form-group row mb-2">
                  <label for="" class="col col-form-label">Satuan :</label>
                  <div class="col-sm-7">
                    <input type="text" class="form-control" id="modalSatuan" name="modalSatuan">
                  </div>
                </div>

                <div class="form-group row mb-2">
                  <label for="" class="col col-form-label">Bagian :</label>
                  <div class="col-sm-7">
                    <input type="text" class="form-control" id="modalBagian" name="modalBagian">
                  </div>
                </div>

                <div class="form-group row mb-2">
                  <label for="" class="col col-form-label">Jumlah SAP :</label>
                  <div class="col-sm-7">
                    <input type="text" class="form-control" id="modalJumlah" name="modalJumlah">
                  </div>
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
  </main>

  <!-- Sweet alertnya tambah material baru -->
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

  <script>
      @if(session('success'))
          Swal.fire({
              icon: 'success',
              title: 'Berhasil!',
              text: '{{ session('success') }}',
              confirmButtonText: 'OK'
          });
      @endif
  </script>

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
