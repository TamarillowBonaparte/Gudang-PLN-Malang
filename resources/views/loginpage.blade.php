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
        .logo {
            opacity: 0;
            transform: translateY(-20px);
            transition: opacity 1s ease-in-out, transform 1s ease-in-out;
        }
        .input-focus {
            transition: all 0.3s ease;
        }
        .input-focus:focus {
            box-shadow: 0 0 8px rgba(0, 123, 255, 0.8);
            transform: scale(1.05);
        }
        .login-btn {
            transition: background-color 0.3s ease, transform 0.3s ease;
        }
        .login-btn:hover {
            background-color: #007bff;
            transform: scale(1.05);
        }
        .password-wrapper {
            position: relative;
        }
        .toggle-password {
            position: absolute;
            top: 15%;
            right: 10px;

            cursor: pointer;
            font-size: 1.2rem;
            color: #6c757d;
            z-index: 2;
        }
        /* .toggle-password:hover {
            color: #007bff;
        } */
        .warning {
            color: red;
            font-size: 0.875rem;
            margin-top: 0.25rem;
            display: none;
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
                    <div class="col-md-7">
                        <img src="{{ asset('Login/assets/images/plnup3malang.jpg') }}" alt="login" class="login-card-img">
                    </div>
                    <div class="col-md-4">
                        <div class="card-body">
                            <div class="brand-wrapper">
                                <img src="{{ asset('Login/assets/images/logo pln.png') }}" alt="logo" class="logo">
                                <strong class="logo-text large-text">PLN UP3 MALANG</strong>
                            </div>
                            <p class="login-card-description">Selamat Datang, login untuk masuk.</p>
                            <form action="{{ url('proses_login') }}" method="POST" id="loginForm">
                                {{ csrf_field() }}
                                <div class="form-group">
                                    <label for="username" class="sr-only">Username</label>
                                    <input
                                    type="text"
                                    name="username"
                                    id="username"
                                    class="form-control input-focus"
                                    placeholder="Username">
                                    <div class="warning" id="emailWarning">Email wajib diisi!</div>
                                    @if($errors->has('username'))
                                        <span class="error">{{ $errors->first('username') }}</span>
                                    @endif
                                </div>
                                <div class="form-group mb-4 password-wrapper">
                                    <label for="password" class="sr-only">Password</label>
                                    <input
                                    type="password"
                                    name="password"
                                    id="password"
                                    class="form-control input-focus" 
                                    placeholder="Password">
                                    <i class="mdi mdi-eye-off toggle-password" id="togglePassword"></i>
                                    <div class="warning" id="passwordWarning">Password wajib diisi!</div>
                                    @if($errors->has('password'))
                                        <span class="error">{{ $errors->first('password') }}</span>
                                    @endif
                                </div>
                                <button type="submit" name="login" id="login" class="btn btn-block login-btn mb-4">Login</button>
                            </form>
                            <nav class="login-card-footer-nav">
                                <a> <i class="fa fa-copyright" aria-hidden="true"></i></a>
                                <a>PLN UP3 MALANG</a>
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

    <script>
        $(document).ready(function(){
            // Animasi fade-in untuk logo
            $('.logo').css({'opacity': '1', 'transform': 'translateY(0)'});

            // Toggle Show/Hide Password
            $('#togglePassword').on('click', function() {
                const passwordField = $('#password');
                const type = passwordField.attr('type') === 'password' ? 'text' : 'password';
                passwordField.attr('type', type);

                // Toggle icon
                $(this).toggleClass('mdi-eye');
                $(this).toggleClass('mdi-eye-off');
            });

            // Validasi Form
            $('#login').on('click', function() {
                let isValid = true;

                // Cek email
                if ($('#email').val().trim() === '') {
                    $('#emailWarning').show();
                    isValid = false;
                } else {
                    $('#emailWarning').hide();
                }

                // Cek password
                if ($('#password').val().trim() === '') {
                    $('#passwordWarning').show();
                    isValid = false;
                } else {
                    $('#passwordWarning').hide();
                }

                if (isValid) {
                    // Submit form jika valid
                    $('#loginForm').submit();
                }
            });
        });
    </script>
</body>
</html>
