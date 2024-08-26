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
            <h1>Daftar Akun</h1>
        </div><!-- End Page Title -->

        <nav class="navbar">
            <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('home') }}">Dashboard</a></li>
                <li class="breadcrumb-item active">Daftar Akun</li>
            </ul>
            <form class="form-inline my-2 my-lg-0">
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                    Launch demo modal
                </button>
            </form>
        </nav>

        <!-- start popup register -->

        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>

                    </div>
                    <div class="modal-body">
                        ...
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">Save changes</button>
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
                                <td></td>
                                <td>vendor</td>
                                <td>
                                    <div class="btn"><i class="bi bi-brush"></i></div>
                                    <div class="btn"><i class="bi bi-trash2"></i></div>
                                </td>
                            </tr>
                            <tr>
                                <td>dani</td>
                                <td>admin123</td>
                                <td>vendor</td>
                                <td>
                                    <div class="btn"><i class="bi bi-brush"></i></div>
                                    <div class="btn"><i class="bi bi-trash2"></i></div>
                                </td>
                            </tr>
                            <tr>
                                <td>faiz</td>
                                <td>cabul</td>
                                <td>vendor</td>
                                <td>
                                    <div class="btn"><i class="bi bi-brush"></i></div>
                                    <div class="btn"><i class="bi bi-trash2"></i></div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div><!-- End Recent Sales -->
    </main>

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