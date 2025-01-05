<!DOCTYPE html>
<html lang="en">

<head>
    <title>Login | GRADUFY</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/png" href="{{ asset('Login') }}/images/favicon.ico" />
    <link rel="stylesheet" type="text/css" href="{{ asset('Login') }}/vendor/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css"
        href="{{ asset('Login') }}/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('Login') }}/vendor/animate/animate.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('Login') }}/vendor/css-hamburgers/hamburgers.min.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('Login') }}/vendor/select2/select2.min.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('Login') }}/css/util.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('Login') }}/css/main.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('Login') }}/css/sweetalert2.min.css">

</head>

<body>
    <div class="limiter">
        <div class="container-login100">
            <div class="wrap-login100">
                <div class="login100-pic js-tilt" data-tilt>
                    <img src="{{ asset('Login') }}/images/logo.png" alt="IMG">
                </div>

                <!-- Form Login sesuai Tampilan Anda -->
                <form method="POST" action="{{ route('login') }}" class="login100-form validate-form">
                    @csrf
                    <span class="login100-form-title">
                        Login Form
                    </span>

                    <!-- Input Email -->
                    <div class="wrap-input100 validate-input" data-validate="Valid email is required: ex@abc.xyz">
                        <input class="input100" type="email" name="email" placeholder="Email"
                            value="{{ old('email') }}" required autofocus>
                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
                            <i class="fa fa-envelope" aria-hidden="true"></i>
                        </span>
                    </div>

                    <!-- Input Password -->
                    <div class="wrap-input100 validate-input" data-validate="Password is required">
                        <input class="input100" type="password" name="password" placeholder="Password" required>
                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
                            <i class="fa fa-lock" aria-hidden="true"></i>
                        </span>
                    </div>

                    <!-- Button Login -->
                    <div class="container-login100-form-btn">
                        <button class="login100-form-btn">
                            Login
                        </button>
                    </div>

                    {{-- <!-- Forgot Password Link -->
                    <div class="text-center p-t-12">
                        <span class="txt1">
                            Forgot
                        </span>
                        <a class="txt2" href="{{ route('password.request') }}">
                            Username / Password?
                        </a>
                    </div> --}}

                    {{-- <!-- Create Account Link -->
                    <div class="text-center p-t-136">
                        <a class="txt2" href="#">
                            Create your Account
                            <i class="fa fa-long-arrow-right m-l-5" aria-hidden="true"></i>
                        </a>
                    </div> --}}
                </form>
            </div>
        </div>
    </div>

    <script src="{{ asset('Login') }}/vendor/jquery/jquery-3.2.1.min.js"></script>
    <script src="{{ asset('Login') }}/vendor/bootstrap/js/popper.js"></script>
    <script src="{{ asset('Login') }}/vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="{{ asset('Login') }}/vendor/select2/select2.min.js"></script>
    <script src="{{ asset('Login') }}/vendor/tilt/tilt.jquery.min.js"></script>

    <script>
        $('.js-tilt').tilt({
            scale: 1.1
        })
    </script>
    <script src="{{ asset('Login') }}/js/main.js"></script>

    @if ($errors->any())
        <script src="{{ asset('Login') }}/js/sweetalert2.min.js"></script>
        <script>
            Swal.fire({
                icon: 'error',
                title: 'Oops..',
                text: '{{ $errors->first() }}',
                showConfirmButton: false,
                timer: 1500
            });
        </script>
    @endif

</body>

</html>
