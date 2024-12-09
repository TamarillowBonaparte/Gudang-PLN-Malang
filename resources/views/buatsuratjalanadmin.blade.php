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
  <link href="{{asset ('admin/assets/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
  <link href="{{asset ('admin/assets/vendor/bootstrap-icons/bootstrap-icons.css')}}" rel="stylesheet">
  <link href="{{asset ('admin/assets/vendor/boxicons/css/boxicons.min.css')}}" rel="stylesheet">
  <link href="{{asset ('admin/assets/vendor/quill/quill.snow.css')}}" rel="stylesheet">
  <link href="{{asset ('admin/assets/vendor/quill/quill.bubble.css')}}" rel="stylesheet">
  <link href="{{asset ('admin/assets/vendor/remixicon/remixicon.css')}}" rel="stylesheet">
  <link href="{{asset ('admin/assets/vendor/simple-datatables/style.css')}}" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

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

<style>
  input::placeholder {
      font-style: italic;
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
      <h1>Buat Surat Jalan</h1>
    </div><!-- End Page Title -->

    <section class="section mt-3 ms-2 me-2">
      <div class="row">
        <div class="col-lg-12">
          <div class="card">
            <div class="card-body">
              <form action="{{ route('suratjalanadmin') }}" method="POST">
                @csrf
                <div class="row mb-4 p-3">
                  <div class="col">
                    <label class="col-sm col-form-label">Tanggal:</label>
                    <input type="text" class="form-control mb-1 w-25" value="{{ date('d M Y') }}" autocomplete="off" readonly disabled>
    
                    <label class="col-sm col-form-label">Nomor Daftar Permintaan:<span style="color: red;">*</span></label>
                    <input class="form-control" id="nopermintaan" name="nopermintaan" placeholder="1234567890" autocomplete="off" required>
    
                    <label class="col-sm col-form-label">Dikirim ke:</label>
                    <input class="form-control" id="kepada" name="kepada" placeholder="Gudang Aris Munandar" autocomplete="off">
    
                    <label class="col-sm col-form-label">Alamat</label>
                    <input class="form-control" id="alamat" name="alamat" placeholder="Jl XXXXX XXX" autocomplete="off">
    
                    <label class="col-sm col-form-label">No. Kendaraan:</label>
                    <input type="text" id="nopol" name="nopol" class="form-control" autocomplete="off" placeholder="N 1234 ABC" maxlength="11" oninput="this.value = this.value.toUpperCase();">
    
                    <label class="col-sm col-form-label">Nama Pengemudi:</label>
                    <input class="form-control" id="pengemudi" name="pengemudi" autocomplete="off">
    
                    <label class="col-sm col-form-label">Penerima:</label>
                    <input class="form-control" id="penerima" name="penerima" autocomplete="off" oninput="this.value = this.value.toUpperCase();">
    
                    <label class="col-sm col-form-label">Yang Menyerahkan:</label>
                    <input class="form-control" id="menyerahkan" name="menyerahkan" autocomplete="off" oninput="this.value = this.value.toUpperCase();">
    
                    <label class="col-sm col-form-label">Keterangan:</label>
                    <textarea name="keterangan" id="keterangan" rows="2" class="form-control"></textarea>
                  </div>
                  
                  <div class="col">
                    <label class="col-sm col-form-label">Nama Material:<span style="color: red;">*</span></label>
                    <input type="text" id="search" name="namaMat" list="materialdl" placeholder="Cari material..." class="form-control mb-1" autocomplete="off">                  
                    <datalist id="materialdl">
                      {{-- list material --}}
                  </datalist>
                    <div class="row">                    
                      <div class="col">
                        <input type="text" style="display:none;" id="idmaterial">
                        <label class="col-sm col-form-label">Normalisasi:</label>
                        <input type="text" id="normalisasi" name="normalisasi" class="form-control mb-1" autocomplete="off" readonly disabled>
                      </div>
                      <div class="col">
                        <label class="col-sm col-form-label">Satuan:</label>
                        <input type="text" id="satuan" name="satuan" class="form-control mb-1" autocomplete="off" readonly disabled>
                      </div>
                      <div class="col">
                        <label class="col-sm col-form-label">Jumlah:<span style="color: red;">*</span></label>
                        <input type="number" id="item" name="item" class="form-control mb-1" autocomplete="off">                      
                      </div>
                    </div>
                    <div class="col text-end">
                      <button class="btn btn-primary mt-2" type="button" id="tambah">Tambah</button>
                    </div>
                    <table class="table">
                      <thead>
                        <tr>
                          <th>Nama Material</th>
                          <th>Jumlah</th>
                          <th class="w-25">Action</th>
                        </tr>
                      </thead>
                      <tbody id="materialsj">
                        {{--  --}}
                      </tbody>
                    </table>
                    <div class="col text-end">
                      <button type="submit" class="btn btn-success">Simpan</button>
                    </div>
                  </div>
                </div>                
              </form>
            </div>
          </div>          
        </div>
      </div>
    </section>

  </main><!-- End #main -->
{{--
  <!-- Footer -->
  @include('footergudang')
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a> --}}

  <script type="text/javascript">

    let productsData = {};  // Object to hold product data
    let productSatuan = {};  // Object to hold product data
    let productsId = {}

    $('#search').on('keyup', function () {
        let $value = $(this).val();

        $.ajax({
            type: "GET",
            url: `/search`,
            data: {
                'search': $value
            },
            success: function (response) {

            console.log(response);
            
                let options = '';
                productsId = {}
                productsData = {}; // Clear previous data
                productSatuan = {}

                response.materials.forEach(product => {
                    options += `<option value="${product.nama}" data-id="${product.id}">`;
                    productsId[product.nama] = product.id;
                    productsData[product.nama] = product.normalisasi;
                    productSatuan[product.nama] = product.satuan;
                });

                $('#materialdl').html(options);
            }
        });
    });

    $('#search').on('input', function () {
        let selectedTitle = $(this).val();
        if (productsId[selectedTitle]) {
            $('#idmaterial').val(productsId[selectedTitle]);
        } else {
            $('#idmaterial').val('');
        }
    });

    $('#search').on('input', function () {
        let selectedTitle = $(this).val();
        if (productsData[selectedTitle]) {
            $('#normalisasi').val(productsData[selectedTitle]);
        } else {
            $('#normalisasi').val('');
        }
    });

    $('#search').on('input', function () {
        let selectedTitle = $(this).val();
        if (productSatuan[selectedTitle]) {
            $('#satuan').val(productSatuan[selectedTitle]);
        } else {
            $('#satuan').val('');
        }
    });

    $("#tambah").click(function() {
        // Ambil nilai dari input
        let idMaterial = $('#idmaterial').val();
        let namaMaterial = $('#search').val();
        let normalisasi = $('#normalisasi').val();
        let satuan = $('#satuan').val();
        let banyakDiminta = $('#item').val();

        // Pastikan semua field diisi sebelum menambahkan baris ke tabel
        if (namaMaterial && normalisasi && satuan && banyakDiminta) {

            // Buat baris baru
            let newRow = `<tr>
                            <td style="display:none;"><input type="text" value="${idMaterial}" name="idmaterial[]" class="form-control input-focus mb-2" id="idmaterial" aria-label="Disabled input example"></td>                            
                            <td>${namaMaterial}</td>
                            <td><input type="text" value="${banyakDiminta}" name="banyakdiminta[]" class="form-control input-focus mb-2" id="banyakdiminta" aria-label="Disabled input example" style="display:none;">${banyakDiminta}</td>
                            <td><button type="button" class="btn btn-danger delete-row"><i class="bi bi-trash3"></i></button></td>
                        </tr>`;

            // Tambahkan baris ke dalam tabel
            $("#materialsj").append(newRow);

            // Kosongkan input setelah menambahkan ke tabel
            $('#search').val('');
            $('#normalisasi').val('');
            $('#satuan').val('');
            $('#item').val('');
        } else {
            alert("Pastikan semua field diisi.");
        }
    });

    // Event listener untuk menghapus baris
    $(document).on('click', '.delete-row', function() {
        $(this).closest('tr').remove();

        // Update nomor urut setelah penghapusan
        $("table tbody tr").each(function(index) {
            $(this).find('td:first').text(index + 1);
        });
    });
  </script>

  <!-- Vendor JS Files -->
  <script src="{{asset ('admin/assets/vendor/apexcharts/apexcharts.min.js')}}"></script>
  <script src="{{asset ('admin/assets/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
  <script src="{{asset ('admin/assets/vendor/chart.js/chart.umd.js')}}"></script>
  <script src="{{asset ('admin/assets/vendor/echarts/echarts.min.js')}}"></script>
  <script src="{{asset ('admin/assets/vendor/quill/quill.js')}}"></script>
  <script src="{{asset ('admin/assets/vendor/simple-datatables/simple-datatables.js')}}"></script>
  <script src="{{asset ('admin/assets/vendor/tinymce/tinymce.min.js')}}"></script>
  <script src="{{asset ('admin/assets/vendor/php-email-form/validate.js')}}"></script>
  <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>

</body>

</html>
