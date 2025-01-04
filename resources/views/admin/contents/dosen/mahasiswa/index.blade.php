@extends('admin.main')

@section('content')
<div class="content">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Mahasiswa</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Mahasiswa</li>
            </ol>
          </div><!-- /.col -->
        </div>
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Tabel Data Mahasiswa</h3>
                {{-- <a href="{{ route('admin.contents.mahasiswa.create') }}" class="btn btn-primary">Tambah Data <i class="fas fa-plus fa-sm"></i></a> --}}
              </div>

              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>NIM</th>
                            <th>Alamat</th>
                            <th>Telepon</th>
                            <th>Email</th>
                            {{-- <th>Action</th> --}}
                        </tr>
                    </thead>
                    <tbody>
                    @foreach ($mahasiswa as $mhs)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $mhs->nama }}</td>
                        <td>{{ $mhs->nim }}</td>
                        <td>{{ $mhs->alamat }}</td>
                        <td>{{ $mhs->telepon }}</td>
                        <td>{{ $mhs->email }}</td>
                        {{-- <td class="d-flex">
                            <a href="/admin/mhss/edit" class="btn btn-warning me-2" ><i class="fas fa-edit"></i></a>
                            <form action="/admin/mhss/delete/" method="POST">
                            @csrf
                            <button class="btn btn-danger ml-2" type="submit" onclick="return confirm('Apakah anda yakin ingin menghapus?')"><i class="fas fa-trash"></i></button>
                            </form>
                        </td> --}}
                    </tr>
                    @endforeach
                    </tbody>
                
                </table>
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

@endsection
