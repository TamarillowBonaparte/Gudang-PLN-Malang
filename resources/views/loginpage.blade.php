<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>PLN UP3 MALANG</title>
    <link href="https://fonts.googleapis.com/css?family=Karla:400,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.materialdesignicons.com/4.8.95/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('Login/assets/css/login.css') }}">
    <style>
        .large-text {
            font-size: 24px;
        }

        .video-background {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            object-fit: cover;
            z-index: -1;
        }

        .login-card {
            background-color: rgba(255, 255, 255, 0.8); /* Transparansi untuk melihat video di belakang */
            position: relative;
            z-index: 1;
        }
    </style>
</head>
<body>
    <!-- Video sebagai latar belakang -->
    <video autoplay muted loop class="video-background">
        <source src="{{ asset('Login/assets/background.mp4') }}" type="video/mp4">
        Your browser does not support the video tag.
    </video>

    <main class="d-flex align-items-center min-vh-100 py-3 py-md-0">
        <div class="container">
            <div class="card login-card">
                <div class="row no-gutters">
                    <div class="col-md-5">
                        <img src="{{ asset('Login/assets/images/plnup3malang.jpg') }}" alt="login" class="login-card-img">
                    </div>
                    <div class="col-md-7">
                        <div class="card-body">
                            <div class="brand-wrapper">
                                <img src="{{ asset('Login/assets/images/logo pln.png') }}" alt="logo" class="logo">
                                <strong class="logo-text large-text">PLN UP3 MALANG</strong>
                            </div>
                            <p class="login-card-description">Selamat Datang, login untuk masuk.</p>
                            <form action="#!">
                                <div class="form-group">
                                    <label for="email" class="sr-only">Email</label>
                                    <input type="email" name="email" id="email" class="form-control" placeholder="Email address">
                                </div>
                                <div class="form-group mb-4">
                                    <label for="password" class="sr-only">Password</label>
                                    <input type="password" name="password" id="password" class="form-control" placeholder="***********">
                                </div>
                                <input name="login" id="login" class="btn btn-block login-btn mb-4" type="button" value="Login">
                            </form>
                            <nav class="login-card-footer-nav">
                                <a> <i class="fa fa-copyright" aria-hidden="true"></i>.</a>
                                <a>PLN UP3N MALANG</a>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</body>
</html>
