@extends('admin.main')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Profile</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item">
                                <a href="#">Home</a>
                            </li>
                            <li class="breadcrumb-item active">User Profile</li>
                        </ol>
                    </div>
                </div>
            </div>
            
            <!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-3">
                        <!-- Profile Image -->
                        <div class="card card-primary card-outline">
                            <div class="card-body box-profile">
                                <h3 class="profile-username text-center">
                                    {{ $dosen->nama }}
                                </h3>

                                <p class="text-muted text-center">
                                    {{ $dosen->jabatan }}
                                </p>

                                <ul class="list-group list-group-unbordered mb-3">
                                    <li class="list-group-item">
                                        <b>NIP</b>
                                        <a class="float-right">
                                            {{ $dosen->nip }}
                                        </a>
                                    </li>
                                    <li class="list-group-item">
                                        <b>No. Telepon</b>
                                        <a class="float-right">
                                            {{ $dosen->telepon }}
                                        </a>
                                    </li>
                                    <li class="list-group-item">
                                        <b>Email</b>
                                        <a class="float-right">
                                            {{ $dosen->email }}
                                        </a>
                                    </li>
                                    <li class="list-group-item">
                                        <b>Alamat</b>
                                        <a class="float-right">
                                            {{ $dosen->alamat }}
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
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
                                                    value="{{ $dosen->nama }}" disabled />
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="nip" class="col-sm-2 col-form-label">
                                                Name
                                            </label>
                                            <div class="col-sm-10">
                                                <input type="number" class="form-control" id="nip" placeholder="NIP"
                                                    value="{{ $dosen->nip }}" disabled />
                                            </div>
                                        </div>
                                        <form class="form-horizontal" method="POST"
                                            action="{{ route('profile.dosen.update') }}">
                                            @csrf
                                            @method('PATCH')
                                            <div class="form-group row">
                                                <label for="telepon" class="col-sm-2 col-form-label">
                                                    No. Telepon
                                                </label>
                                                <div class="col-sm-10">
                                                    <input type="number" class="form-control" name="telepon" id="telepon"
                                                        placeholder="Telepon"
                                                        value="{{ old('telepon', $dosen->telepon ?? '') }}" />
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="email" class="col-sm-2 col-form-label">
                                                    Email
                                                </label>
                                                <div class="col-sm-10">
                                                    <input type="email" class="form-control" name="email" id="email"
                                                        placeholder="Email"
                                                        value="{{ old('email', $dosen->email ?? '') }}" />
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="alamat" class="col-sm-2 col-form-label">
                                                    Experience
                                                </label>
                                                <div class="col-sm-10">
                                                    <textarea class="form-control" name="alamat" id="alamat" placeholder="alamat">{{ old('alamat', $dosen->alamat ?? '') }}</textarea>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="offset-sm-2 col-sm-10">
                                                    <button type="submit" class="btn btn-primary">
                                                        Update
                                                    </button>
                                                    <a href="{{ route('dosen.dashboard') }}" class="btn btn-danger">
                                                        Kembali
                                                    </a>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="tab-pane" id="resetpw">
                                        <form class="form-horizontal" method="POST"
                                            action="{{ route('password.update') }}">
                                            @csrf
                                            @method('PUT')
                                            <div class="form-group row">
                                                <label for="update_password_current_password"
                                                    class="col-sm-4 col-form-label">
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
                                                    <input type="password" class="form-control"
                                                        name="password_confirmation"
                                                        id="update_password_password_confirmation" />
                                                </div>
                                                <x-input-error :messages="$errors->updatePassword->get('password_confirmation')" class="mt-2" />
                                            </div>

                                            <div class="form-group row">
                                                <div class="offset-sm-2 col-sm-10">
                                                    <button type="submit" class="btn btn-primary">
                                                        Update
                                                    </button>
                                                    <a href="{{ route('dosen.dashboard') }}" class="btn btn-danger">
                                                        Kembali
                                                    </a>

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
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection
