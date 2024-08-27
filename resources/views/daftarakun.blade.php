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

    <style>
        .container {
            position: relative;
            top: 20%;
            margin: auto;
            padding-bottom: 1%;
            border-radius: 0.35em;
            text-align: center;
        }

        #perinput {
            padding: 1%;
        }
    </style>

</head>


<body>

    <!-- ======= Header =======--->
    @include('header')

    <!-- ======= Siderbar =======--->
    @include('sidebar')

    <main id="main" class="main">
        <div class="pagetitle">
            <h1>Daftar Akun</h1>
        </div><!-- End Page Title -->

        <nav class="navbar">
            <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('home') }}">Dashboard</a></li>
                <li class="breadcrumb-item active">Daftar Akun</li>
            </ul>
            <form class="form-inline my-2 my-lg-0">
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                    <i class="bi bi-plus"></i>
                </button>
            </form>
        </nav>

        <!-- start popup register -->

        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Register Akun</h5>
                        <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                    </div>

                    <div class="modal-body">
                        <div class="container">

                            <div class="form-group row" id="perinput">
                                <label class="col-sm-3 col-form-label">Username:</label>
                                <div class="col-sm-9">
                                    <input type="text" id="username" name="username" class="form-control" placeholder="Enter Username">
                                </div>
                            </div>

                            <div class="form-group row" id="perinput">
                                <label class="col-sm-3 col-form-label">Password:</label>
                                <div class="col-sm-9">
                                    <div class="input-group">
                                        <input type="password" class="form-control input-focus" placeholder="Input Password" aria-label="Input Password" aria-describedby="button-addon2" id="passwordInput">
                                        <button class="btn btn-outline-secondary" type="button" id="button-addon2"><i class="bi bi-eye"></i></button>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row" id="perinput">
                                <label class="col-sm-3 col-form-label">User Level:</label>
                                <div class="dropdown col-sm-9">
                                    <div class="form-group">
                                        <div class="input-group">
                                            <select class="form-control" id="jenis_user" name="jenis_user">
                                                <option value="1">Admin</option>
                                                <option value="2">Vendor</option>
                                                <option value="3">Gudang</option>
                                            </select>
                                            <!-- Ikon dropdown menggunakan Bootstrap Icons -->
                                            <div class="input-group-append">
                                                <span class="input-group-text" id="dropdown-icon"><i class="bi bi-caret-down-fill"></i></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row" id="alamat_container">
                                <label class="col-sm-3 col-form-label">Alamat:</label>
                                <div class="col-sm-9">
                                    <input type="text" id="alamat" name="alamat" class="form-control" placeholder="Masukkan Alamat Vendor">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                        <button type="button" class="btn btn-primary">Daftar</button>
                    </div>


                </div>
            </div>
        </div>
        <!-- @if(session('show_modal'))
        <script>
            $(document).ready(function() {
            $('#exampleModal').modal('show');
        });
        </script> -->

        @endif

        <!-- end popup register -->
        @include('editakun')
        <!-- Recent Sales -->
        <div class="col-12">
            <div class="card recent-sales overflow-auto">
                <div class="card-body">
                    <h5 class="card-title">Status Surat Jalan</h5>
                    <table class="table table-borderless datatable">
                        <thead>
                            <tr>
                                <th scope="col">Username</th>
                                <th scope="col">Password</th>
                                <th scope="col">Level</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>wisnu</td>
                                <td>123</td>
                                <td>vendor</td>
                                <td>
                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#edit">
                                        <i class="bi bi-brush"></i>
                                    </button>
                                    <button type="button" class="btn btn-danger btn-delete" data-id="3">
                                        <i class="bi bi-trash2"></i>
                                    </button>
                                </td>
                            </tr>
                            <tr>
                                <td>dani</td>
                                <td>admin123</td>
                                <td>vendor</td>
                                <td>
                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#edit">
                                        <i class="bi bi-brush"></i>
                                    </button>
                                    <button type="button" class="btn btn-danger btn-delete" data-id="3">
                                        <i class="bi bi-trash2"></i>
                                    </button>
                                </td>
                            </tr>
                            <tr>
                                <td>faiz</td>
                                <td>cabul</td>
                                <td>vendor</td>
                                <td>
                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#edit">
                                        <i class="bi bi-brush"></i>
                                    </button>
                                    <button type="button" class="btn btn-danger btn-delete" data-id="3">
                                        <i class="bi bi-trash2"></i>
                                    </button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div><!-- End Recent Sales -->
      </main>

        <!-- Modal Konfirmasi Hapus -->
        <div class="modal fade" id="confirmDelete" tabindex="-1" role="dialog" aria-labelledby="confirmDeleteLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="confirmDeleteLabel">Konfirmasi Hapus</h5>
                        <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                        </button>
                    </div>
                    <div class="modal-body">
                        Apakah Anda yakin ingin menghapus data ini?
                    </div>
                    <div class="modal-footer">
                        <form id="deleteForm" method="POST" action="">
                            @csrf
                            @method('DELETE')
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                            <button type="submit" class="btn btn-danger">Hapus</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- Include Bootstrap JS and Popper.js -->
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const togglePassword = document.querySelector('#button-addon2');
                const passwordInput = document.querySelector('#passwordInput');
                const eyeIcon = document.querySelector('#eyeIcon');

                togglePassword.addEventListener('click', function() {
                    // Toggle the type attribute
                    const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
                    passwordInput.setAttribute('type', type);

                    // Toggle the eye icon
                    eyeIcon.classList.toggle('bi-eye');
                    eyeIcon.classList.toggle('bi-eye-slash');
                });
            });
        </script>

        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const deleteButtons = document.querySelectorAll('.btn-delete');
                const deleteForm = document.querySelector('#deleteForm');
                const modal = document.querySelector('#confirmDelete');
                let deleteUrl = '';

                deleteButtons.forEach(button => {
                    button.addEventListener('click', function() {
                        const id = this.getAttribute('data-id');
                        deleteUrl = `/your-delete-route/${id}`; // Update with your route
                        deleteForm.action = deleteUrl;
                        $(modal).modal('show');
                    });
                });
            });
        </script>

<script>
    //buat vendor
    document.addEventListener('DOMContentLoaded', function() {
        var userSelect = document.getElementById('jenis_user');
        var alamatContainer = document.getElementById('alamat_container');
        var dropdownIcon = document.getElementById('dropdown-icon');

        function toggleAlamatField() {
            if (userSelect.value === "2") {
                alamatContainer.style.display = 'flex';
            } else {
                alamatContainer.style.display = 'none';
            }
        }

        // Panggil fungsi pertama kali untuk set default state
        toggleAlamatField();

        // Event listener untuk dropdown user level
        userSelect.addEventListener('change', toggleAlamatField);

        // Event listener untuk ikon dropdown
        dropdownIcon.addEventListener('click', function() {
            userSelect.focus();  // Membuat dropdown fokus
            userSelect.click();  // Membuka dropdown
        });
    });
</script>




    <!-- Include Bootstrap JS and Popper.js -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
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
