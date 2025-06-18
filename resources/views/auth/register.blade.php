<!-- filepath: c:\projects\gradufy\resources\views\auth\register.blade.php -->
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Register | GRADUFY</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/png" href="{{ asset('Login') }}/images/favicon.ico" />
    <link rel="stylesheet" type="text/css" href="{{ asset('Login') }}/vendor/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css"
        href="{{ asset('Login') }}/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('Login') }}/css/sweetalert2.min.css">
    <style>
        /* Tambahkan/ubah di <style> pada register.blade.php */
        .register-container {
            max-width: 700px;
            margin: 40px auto;
            background: #fff;
            border-radius: 16px;
            box-shadow: 0 2px 16px rgba(0, 0, 0, 0.07);
            padding: 40px 32px 24px 32px;
            width: 100%;
            box-sizing: border-box;
            align-items: center;
            flex-direction: column;
            justify-content: center;
        }

        @media (max-width: 992px) {
            .register-container {
                padding: 18px 4vw 12px 4vw;
                /* pakai vw agar responsif */
                max-width: 82vw;
                margin: 48px auto;
                border-radius: 10px;
            }

            .register-btn {
                padding: 10px 0;
                font-size: 1rem;

            }
        }

        .register-title {
            font-size: 2rem;
            font-weight: bold;
            text-align: center;
            margin-bottom: 32px;
        }

        .register-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 18px 24px;
            padding: 0 10px;

        }

        .register-grid .full {
            grid-column: 1 / span 2;
        }

        .register-input {
            position: relative;
        }

        .register-input i {
            position: absolute;
            left: 16px;
            top: 50%;
            transform: translateY(-50%);
            color: #aaa;
            font-size: 1.1rem;
        }

        .register-input input {
            width: 100%;
            padding: 10px 16px 10px 40px;
            border-radius: 24px;
            border: 1px solid #eee;
            background: #f3f3f3;
            font-size: 1rem;
            outline: none;
            transition: border 0.2s;
        }

        .register-input input:focus {
            border: 1.5px solid #6c63ff;
            background: #fff;
        }

        .register-btn {
            width: 100%;
            padding: 12px 0;
            border-radius: 24px;
            background: #6c63ff;
            color: #fff;
            font-weight: bold;
            border: none;
            font-size: 1.1rem;
            margin-top: 10px;
            transition: background 0.2s;
        }

        .register-btn:hover {
            background: #554ee2;
        }

        .register-link {
            text-align: center;
            margin-top: 18px;
            font-size: 1rem;
        }

        .register-link a {
            color: #6c63ff;
            text-decoration: none;
            font-weight: 500;
        }

        @media (max-width: 700px) {
            .register-container {
                padding: 24px 8px;
            }

            .register-grid {
                grid-template-columns: 1fr;
            }

            .register-grid .full {
                grid-column: 1;
            }
        }
    </style>
</head>

<body style="background: #f8f9fb;">
    <div class="register-container">
        <div class="register-title">Register Form</div>
        <form method="POST" action="{{ route('register') }}">
            @csrf
            <div class="register-grid">
                <div class="register-input">
                    <i class="fa fa-user"></i>
                    <input type="text" name="nama" placeholder="Nama" value="{{ old('nama') }}" required>
                </div>
                <div class="register-input">
                    <i class="fa fa-id-card"></i>
                    <input type="text" name="nim" placeholder="NIM" value="{{ old('nim') }}" required>
                </div>
                <div class="register-input">
                    <i class="fa fa-graduation-cap"></i>
                    <select name="jurusan" required style="width: 100%; padding: 10px 16px 10px 40px; border-radius: 24px; border: 1px solid #eee; background: #f3f3f3; font-size: 1rem; outline: none;">
                        <option value="" disabled {{ old('jurusan') ? '' : 'selected' }}>Pilih Jurusan</option>
                        <option value="Teknik Informatika" {{ old('jurusan') == 'Teknik Informatika' ? 'selected' : '' }}>Teknik Informatika</option>
                        <option value="Sistem Informasi" {{ old('jurusan') == 'Sistem Informasi' ? 'selected' : '' }}>Sistem Informasi</option>
                        <option value="Bisnis Digital" {{ old('jurusan') == 'Bisnis Digital' ? 'selected' : '' }}>Bisnis Digital</option>
                    </select>
                </div>
                <div class="register-input">
                    <i class="fa fa-home"></i>
                    <input type="text" name="alamat" placeholder="Alamat" value="{{ old('alamat') }}" required>
                </div>
                <div class="register-input">
                    <i class="fa fa-phone"></i>
                    <input type="text" name="telepon" placeholder="Telepon Aktif (Cth: 08123456789)"
                        value="{{ old('telepon') }}" required>
                </div>
                <div class="register-input">
                    <i class="fa fa-envelope"></i>
                    <input type="email" name="email" placeholder="Email" value="{{ old('email') }}" required>
                </div>
                <div class="register-input">
                    <i class="fa fa-lock"></i>
                    <input type="password" name="password" placeholder="Password" required>
                </div>
                <div class="register-input">
                    <i class="fa fa-lock"></i>
                    <input type="password" name="password_confirmation" placeholder="Konfirmasi Password" required>
                </div>
                <div class="full">
                    <button type="submit" class="register-btn">REGISTER</button>
                </div>
                <div class="register-link full">
                    Sudah punya akun? <a href="{{ route('login') }}">Login di sini</a>
                </div>
            </div>
        </form>
    </div>
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
