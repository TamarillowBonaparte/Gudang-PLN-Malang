<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>PLN ARM MALANG</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="{{asset ('admin/assets/img/favicon.png')}}" rel="icon">
    <link href="{{asset ('admin/assets/img/apple-touch-icon.png')}}" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.gstatic.com" rel="preconnect">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">

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

    <style>
        body {
            font-family: 'Roboto', sans-serif;
        margin: 0;
        padding: 0;
    }

        .a4 {
            width: 297mm;
            height: 210mm;
            margin: auto;
            padding: 10mm;
            box-sizing: border-box;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            font-size: 10px;
        }

        th, td {
            font-size: 10px;
            border: 1px solid black;
            padding: 5px;
            text-align: center;
        }


    </style>
</head>
<body>

   <!-- ======= Header ======= -->
    @include('header')
    <!-- End Header -->

    <!-- ======= Vendor Sidebar ======= -->
    @include('sidebarvendor')
    <main id="main" class="main">
        <div class="pagetitle">
            <h1>Daftar Pengembalian Material</h1>
        </div><!-- End Page Title -->


        <div class="card">
            <div class="card-body">
                <form action="{{ route('cetaksurat') }}" method="POST">
                    @csrf
                    <div class="row mt-3">
                        <div class="col-5">
                            <div class="row">
                                <div class="col">
                                    <label for="setuju" class="form-label">Setuju<span style="color: red;">*</span></label>
                                    <input type="text" name="setuju" id="setuju" list="setujuls" class="form-control input-focus mb-2" autocomplete="off">
                                    <datalist id="setujuls">
                                    {{-- @forelse ($setuju as $stj)
                                        <option value="{{ $stj->nama }}">
                                    @empty

                                    @endforelse --}}
                                    </datalist>
                                </div>
                                <div class="col">
                                    <label for="kepalagudang" class="form-label">Kepala Gudang<span style="color: red;">*</span></label>
                                    <input type="text" name="kepalagudang" id="kepalagudang" list="kplgdng" class="form-control input-focus mb-2" autocomplete="off">
                                    <datalist id="kplgdng">
                                    {{-- @forelse ($kepalaGdng as $kplgdng)
                                        <option value="{{ $kplgdng->nama }}">
                                    @empty

                                    @endforelse --}}
                                    </datalist>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col">
                                    <label for="pemeriksa" class="form-label">Pemeriksa<span style="color: red;">*</span></label>
                                    <input type="text" name="pemeriksa" id="pemeriksa" list="pemeriksals" class="form-control input-focus mb-2" autocomplete="off">
                                    <datalist id="pemeriksals">
                                    {{-- @forelse ($pemeriksa as $pmrksa)
                                        <option value="{{ $pmrksa->nama }}">
                                    @empty

                                    @endforelse --}}
                                    </datalist>
                                </div>
                                <div class="col">
                                    <label for="penerima" class="form-label">Penerima<span style="color: red;">*</span></label>
                                    <input type="text" name="penerima" id="penerima" class="form-control input-focus mb-2" list="penerimals" autocomplete="off">
                                    <datalist id="penerimals">
                                    {{-- @forelse ($penerima as $pnrm)
                                        <option value="{{ $pnrm->nama }}">
                                    @empty

                                    @endforelse --}}
                                    </datalist>
                                </div>
                            </div>

                            <label for="nospk" class="form-label">No. SPK<span style="color: red;">*</span></label>
                            <input
                            type="text"
                            name="nospk"
                            id="nospk"
                            class="form-control input-focus mb-2"
                            autocomplete="off">

                            <label for="jenispkrjn" class="form-label">Jenis Pekerjaan<span style="color: red;">*</span></label>
                            <select class="form-select mb-2 nospk" id="jenispekerjaan" name="jenispekerjaan" aria-label="Default select example">
                                <option selected></option>
                                <option value="1">SUTR</option>
                                <option value="2">GKS</option>
                                <option value="3">GKU</option>
                                <option value="4">GKL</option>
                                <option value="5">PTM</option>
                                <option value="6">ESTETIKA</option>
                                <option value="7">PFK</option>
                                <option value="8">KEANDALAN</option>
                                <option value="9">PEMELIHARAAN</option>
                            </select>

                            <label for="idpel" class="form-label">IDPEL<span style="color: red;">*</span></label>
                            <input type="text" name="idpel" id="idpel" class="form-control input-focus mb-2" autocomplete="off">

                            <label for="nama_pel" class="form-label">Nama Pelanggan<span style="color: red;">*</span></label>
                            <input type="text" name="nama_pel" id="nama_pel" class="form-control input-focus mb-2" autocomplete="off">

                            <label for="alamat_pel" class="form-label">Alamat Pelanggan<span style="color: red;">*</span></label>
                            <input type="text" name="alamat_pel" id="alamat_pel" class="form-control input-focus mb-2" autocomplete="off">

                            <label for="ulp" class="form-label">Kondisi Material<span style="color: red;">*</span></label>
                            <select class="form-select mb-2 nospk" id="" name="kondisimaterial" aria-label="Default select example">
                                <option selected></option>
                                <option value="1">Rusak</option>
                                <option value="2">Masih dapat dipergunakan</option>
                                <option value="3">Baru</option>
                                <option value="4">Garansi</option>
                            </select>

                            <label for="nama_pel" class="form-label">NO. DPB / BUKTI<span style="color: red;">*</span></label>
                            <input type="text" name="nama_pel" id="nama_pel" class="form-control input-focus mb-2" autocomplete="off">

                        </div>

                        <div class="col">
                            <label for="search" class="form-label">Nama Material<span style="color: red;">*</span></label>
                            <input type="text" class="form-control input-focus mb-2" list="materialdl" id="search" placeholder="Cari..." autocomplete="off">
                            <datalist id="materialdl">
                                {{-- list material --}}
                            </datalist>

                            <div class="row">
                                <div class="col">
                                    <input type="text" style="display:none;" id="idmaterial">
                                    <label for="normalisasi" class="form-label">Normalisasi</label>
                                    <input type="text" class="form-control input-focus mb-2" id="normalisasi" aria-label="Disabled input example" disabled readonly>
                                </div>
                                <div class="col-2">
                                    <label for="satuan" class="form-label">Satuan</label>
                                    <input type="text" class="form-control input-focus mb-2" id="satuan" aria-label="Disabled input example" disabled readonly>
                                </div>
                                <div class="col">
                                    <label for="item" class="form-label">Banyak Diminta<span style="color: red;">*</span></label>
                                    <input type="number" class="form-control input-focus mb-2" id="item">
                                </div>
                            </div>
                            <div class="col text-end">
                                <button type="button" class="btn btn-primary mb-2" id="tambah">Tambah</button>
                            </div>

                            <!-- Tabel Bootstrap di bawah form alamat -->
                            <div class="table-responsive mt-3">
                                <table class="table table-sm table-bordered">
                                    <thead>
                                        <tr>
                                            <th scope="col">No</th>
                                            <th scope="col">Nama Material</th>
                                            <th scope="col">Satuan</th>
                                            <th scope="col">Banyak Diminta</th>
                                            <th scope="col">Hapus</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        {{-- items --}}
                                    </tbody>
                                </table>
                            </div>
                            <div class="col text-end">
                                <button class="btn btn-success mb-2" type="submit" id="cetaksurat">Cetak</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </main>
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
                // Dapatkan jumlah baris yang sudah ada di tabel
                let rowCount = $("table tbody tr").length + 1;

                // Buat baris baru
                let newRow = `<tr>
                                <td style="display:none;"><input type="text" value="${idMaterial}" name="idmaterial[]" class="form-control input-focus mb-2" id="idmaterial" aria-label="Disabled input example"></td>
                                <td>${rowCount}</td>
                                <td>${namaMaterial}</td>
                                <td>${satuan}</td>
                                <td><input type="text" value="${banyakDiminta}" name="banyakdiminta[]" class="form-control input-focus mb-2" id="banyakdiminta" aria-label="Disabled input example" style="display:none;">${banyakDiminta}</td>
                                <td><button type="button" class="btn btn-danger delete-row"><i class="bi bi-trash3"></i></button></td>
                            </tr>`;

                // Tambahkan baris ke dalam tabel
                $("table tbody").append(newRow);

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

    <script>
        //buat vendor
        document.addEventListener('DOMContentLoaded', function() {
            var userSelect = document.getElementById('pbpd');
            var dayalama = document.getElementById('dayalama');

            function toggleAlamatField() {
                if (userSelect.value === "1") {
                    dayalama.disabled = true;
                    dayalama.value = '';  // Reset nilai input jika diinginkan
                } else {
                    dayalama.disabled = false;
                }
            }

            // Panggil fungsi pertama kali untuk set default state
            toggleAlamatField();

            // Event listener untuk dropdown user level
            userSelect.addEventListener('change', toggleAlamatField);
        });
    </script>

    <script type="text/javascript">
        $.ajaxSetup({
            headers: {
                'csrftoken': '{{ csrf_token() }}'
            }
        });
    </script>

    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.2/dist/sweetalert2.all.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
