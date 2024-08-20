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
    <!-- <link href="{{asset ('admin/assets/vendor/boxicons/css/boxicons.min.css')}}" rel="stylesheet"> -->
    <!-- <link href="{{asset ('admin/assets/vendor/quill/quill.snow.css')}}" rel="stylesheet"> -->
    <!-- <link href="{{asset ('admin/assets/vendor/quill/quill.bubble.css')}}" rel="stylesheet"> -->
    <!-- <link href="{{asset ('admin/assets/vendor/remixicon/remixicon.css')}}" rel="stylesheet"> -->
    <!-- <link href="{{asset ('admin/assets/vendor/simple-datatables/style.css')}}" rel="stylesheet"> -->

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
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
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
                                        <input type="password" class="form-control input-focus" placeholder="Input Password" aria-label="Input Password" aria-describedby="button-addon2">
                                        <button class="btn btn-outline-secondary" type="button" id="button-addon2"><i class="bi bi-eye"></i></button>
                                    </div>
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
                                <td>mboh</td>
                                <td>vendor</td>
                                <td>
                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#edit">
                                        <i class="bi bi-brush"></i>
                                    </button>
                                    <div class="btn"><i class="bi bi-trash2"></i></div>
                                </td>
                            </tr>
                            <tr>
                                <td>dani</td>
                                <td>predator</td>
                                <td>vendor</td>
                                <td>
                                    <div class="btn"><i class="bi bi-brush"></i></div>
                                    <div class="btn"><i class="bi bi-trash2"></i></div>
                                </td>
                            </tr>
                            <tr>
                                <td>faiz</td>
                                <td>baik</td>
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

        <!-- Include Bootstrap JS and Popper.js -->
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>