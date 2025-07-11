@include('admin.partials.header')
<style>
    .cardi {
        --font-color: #323232;
        --font-color-sub: #8d8686;
        --bg-color: #fff;
        --main-color: #b3b3b3;
        width: 250px;
        height: 254px;
        background: var(--bg-color);
        border: 2px solid var(--main-color);
        box-shadow: 4px 4px var(--main-color);
        border-radius: 5px;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
    }

    .cardi-photo {
        /* clear and add new css */
        transform: scale(0.3) translate(220px, 230px);
        width: 250px;
        height: 250px;
        margin-left: -125px;
        margin-top: -125px;
        background-image: url('{{ asset('edustage') }}/img/features/f1.png');
        background-repeat: no-repeat;
        background-size: contain;
        /* Memastikan gambar masuk ke dalam area tanpa terpotong */
        background-position: center;
        /* Memastikan gambar terpusat */
        border-radius: 30%;
    }


    /* delete */
    .cardi-photo::before {
        display: block;
        content: '';
        position: absolute;
        box-sizing: border-box;
        width: 160px;
        height: 200px;
        left: 50%;
        top: -10%;
        margin-left: -80px;
        background-repeat: no-repeat;
        border-radius: 50% 50% 50% 50%/60% 60% 40% 40%;
    }

    /* delete */
    .cardi-photo::after {
        display: block;
        content: '';
        position: absolute;
        width: 2.5em;
        height: .8em;
        left: 28.5%;
        top: 26%;
        border-radius: .3em;
    }

    .cardi-title {
        text-align: center;
        color: var(--font-color);
        font-size: 20px;
        font-weight: 400;
        font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
    }

    .cardi-title span {
        font-size: 15px;
        color: var(--font-color-sub);
    }

    .cardi-socials {
        display: flex;
        height: 0;
        opacity: 0;
        margin-top: 20px;
        gap: 20px;
        transition: 0.5s;
    }

    .cardi-socials-btn {
        width: 25px;
        height: 25px;
        border: none;
        background: transparent;
        cursor: pointer;
    }

    .cardi-socials-btn svg {
        width: 100%;
        height: 100%;
        fill: var(--main-color);
    }

    .cardi:hover>.cardi-socials {
        opacity: 1;
        height: 35px;
    }

    .cardi-socials-btn:hover {
        transform: translateY(-5px);
        transition: all 0.15s;
    }

    .cardi-photo:hover {
        transition: 0.3s;
        transform: scale(0.4) translate(160px, 150px);
    }

    @media only screen and (max-width: 900px) {
        .cardi {

            width: 100%;
            height: 254px;
            background: var(--bg-color);
            border: 2px solid var(--main-color);
            box-shadow: 4px 4px var(--main-color);
            border-radius: 5px;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            margin-bottom: 5%;
        }


    }
</style>
<!--================ Start Home Banner Area =================-->
<section class="detail_banner_area">
    <div class="banner_inner d-flex align-items-center">
        <div class="overlay"></div>
        <div class="container">
        </div>
    </div>
</section>

<section class="feature_area section_gap">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-5">
                <div class="main_title">
                    <h2 class="mb-3">Profile</h2>
                </div>
            </div>
        </div>
        <!-- Main content -->
        <div class="row">
            <div class="col-md-3">
                <div class="cardi">
                    <div class="cardi-photo"></div>
                    <div class="cardi-title">{{ $mahasiswa->nama }} <br>
                        <span>{{ $mahasiswa->jurusan }}</span><br>
                        <span>{{ $mahasiswa->nim }}</span>
                    </div>
                    <div class="cardi-socials">
                        <span>
                            {{ $mahasiswa->email }}
                        </span>
                    </div>
                </div>

                <!-- Profile Image -->
                {{-- <div class="card card-primary card-outline">
                    <div class="card-body box-profile">

                        <h3 class="profile-username text-center">{{ $mahasiswa->nama }}</h3>

                        <p class="text-muted text-center">{{ $mahasiswa->jurusan }}</p>

                        <ul class="list-group list-group-unbordered mb-3">
                            <li class="list-group-item">
                                <label>NIM</label> <a class="float-right">{{ $mahasiswa->nim }}</a>
                            </li>
                            <li class="list-group-item">
                                <label>Email</label> <a class="float-right">{{ $mahasiswa->email }}</a>
                            </li>
                            <li class="list-group-item">
                                <label>Telepon</label> <a class="float-right">{{ $mahasiswa->telepon }}</a>
                            </li>
                        </ul>

                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card --> --}}
            </div>
            <!-- /.col -->
            <div class="col-md-9">
                <div class="card">
                    <div class="card-header p-3">
                        <ul class="nav nav-pills">
                            <li class="nav-item">
                                <a class="nav-link active" href="#settings" data-toggle="tab">
                                    Settings
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#resetpw" data-toggle="tab">
                                    Reset Password
                                </a>
                            </li>
                        </ul>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <div class="tab-content">
                            <div class="active tab-pane" id="settings">
                                <div class="form-group row">
                                    <label for="nama" class="col-sm-2 col-form-label">
                                        Name
                                    </label>
                                    <div class="col-sm-10">
                                        <input type="email" class="form-control" id="nama" placeholder="Name"
                                            value="{{ $mahasiswa->nama }}" disabled />
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="nip" class="col-sm-2 col-form-label">
                                        NIM
                                    </label>
                                    <div class="col-sm-10">
                                        <input type="number" class="form-control" id="nip" placeholder="NIM"
                                            value="{{ $mahasiswa->nim }}" disabled />
                                    </div>
                                </div>
                                <form class="form-horizontal" method="POST"
                                    action="{{ route('profile.mahasiswa.update') }}">
                                    @csrf
                                    @method('PATCH')
                                    <div class="form-group row">
                                        <label for="telepon" class="col-sm-2 col-form-label">
                                            No. Telepon
                                        </label>
                                        <div class="col-sm-10">
                                            <input type="number" class="form-control" name="telepon" id="telepon"
                                                placeholder="Telepon"
                                                value="{{ old('telepon', $mahasiswa->telepon ?? '') }}" />
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="email" class="col-sm-2 col-form-label">
                                            Email
                                        </label>
                                        <div class="col-sm-10">
                                            <input type="email" class="form-control" name="email" id="email"
                                                placeholder="Email" value="{{ old('email', $mahasiswa->email ?? '') }}"
                                                disabled />
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="alamat" class="col-sm-2 col-form-label">
                                            Alamat
                                        </label>
                                        <div class="col-sm-10">
                                            <textarea class="form-control" name="alamat" id="alamat" placeholder="alamat">{{ old('telepon', $mahasiswa->alamat ?? '') }}</textarea>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="offset-sm-2 col-sm-10">
                                            <button type="submit" class="btn btn-primary">
                                                Update
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="tab-pane" id="resetpw">
                                <form class="form-horizontal" method="POST" action="{{ route('password.update') }}">
                                    @csrf
                                    @method('PUT')
                                    <div class="form-group row">
                                        <label for="update_password_current_password" class="col-sm-4 col-form-label">
                                            Current Password
                                        </label>
                                        <div class="col-sm-8">
                                            <input type="password" class="form-control" name="current_password"
                                                id="update_password_current_password" />
                                        </div>
                                        <x-input-error :messages="$errors->updatePassword->get('current_password')" class="mt-2" />
                                    </div>
                                    <div class="form-group row">
                                        <label for="update_password_password" class="col-sm-4 col-form-label">
                                            New Password
                                        </label>
                                        <div class="col-sm-8">
                                            <input type="password" class="form-control" name="password"
                                                id="update_password_current_password" />
                                        </div>
                                        <x-input-error :messages="$errors->updatePassword->get('password')" class="mt-2" />
                                    </div>
                                    <div class="form-group row">
                                        <label for="update_password_password_confirmation"
                                            class="col-sm-4 col-form-label">
                                            Confirm Password
                                        </label>
                                        <div class="col-sm-8">
                                            <input type="password" class="form-control" name="password_confirmation"
                                                id="update_password_password_confirmation" />
                                        </div>
                                        <x-input-error :messages="$errors->updatePassword->get('password_confirmation')" class="mt-2" />
                                    </div>

                                    <div class="form-group row">
                                        <div class="offset-sm-2 col-sm-10">
                                            <button type="submit" class="btn btn-primary">
                                                Update
                                            </button>

                                            @if (session('success') === 'password-updated')
                                                <script src="{{ asset('AdminLTE') }}/plugins/sweetalert2/sweetalert2.min.js"></script>
                                                <script>
                                                    Swal.fire({
                                                        position: 'top-end',
                                                        icon: 'success',
                                                        title: 'Data Berhasil diperbarui',
                                                        text: '{{ session('status') }}',
                                                        showConfirmButton: false,
                                                        timer: 1500,
                                                    });
                                                </script>
                                            @endif
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <!-- /.tab-pane -->
                        </div>

                        <!-- /.tab-content -->
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</section>
<!--================ End Table Area =================-->
@include('admin.partials.footer')

{{-- Alert berhasil Edit Profile --}}
@if (session('status'))
    <script src="{{ asset('AdminLTE') }}/plugins/sweetalert2/sweetalert2.min.js"></script>
    <script>
        Swal.fire({
            position: 'top-end',
            icon: 'success',
            title: 'Data Berhasil diperbarui',
            text: '{{ session('status') }}',
            showConfirmButton: false,
            timer: 1500,
        });
    </script>
@endif
