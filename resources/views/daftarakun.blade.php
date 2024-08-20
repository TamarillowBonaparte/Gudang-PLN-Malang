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
        <button class="btn btn-outline-success my-2 my-sm-0" data-bs-toggle="modal" data-bs-target="#cek"><i class="bi bi-plus"></i></button>
      </form>
    </nav>

    <!-- start popup register -->
    <div class="modal fade" id="cek" tabindex="-1" role="dialog" aria-labelledby="ExampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
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
                <td>mboh</td>
                <td>vendor</td>
                <td>
                  <div class="btn"><i class="bi bi-brush"></i></div>
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

    <script src="resources/js/popup.js"></script>
</body>