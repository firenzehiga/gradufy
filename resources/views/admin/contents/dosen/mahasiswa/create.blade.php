@extends('admin.main')

@section('content')
<div class="content">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <span class="h4">Tambah Mahasiswa</span>
                    <ol class="breadcrumb ">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Create Mahasiswa</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                         <!-- form start -->
                        <form id="quickForm" action="proses_pasien.php" method="POST" >
                            <div class="card-body">
                                <div class="form-group row">
                                    <label for="" class="col-sm-2 col-form-label">Nama :</label>
                                    <div class="col-sm-5">
                                    <input type="text" name="" class="form-control" id="" value="">   
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="" class="col-sm-2 col-form-label">NIM :</label>
                                    <div class="col-sm-5">
                                    <input type="number" name="" class="form-control" id="" value="">   
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="" class="col-sm-2 col-form-label">Alamat :</label>
                                    <div class="col-sm-5">
                                        <textarea class="form-control" rows="3"  placeholder="Input Alamat" id="alamat"  name="alamat"></textarea>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="" class="col-sm-2 col-form-label">Telepon :</label>
                                    <div class="col-sm-5">
                                    <input type="number" name="nama" class="form-control" id="nama" value="">   
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="" class="col-sm-2 col-form-label">Email :</label>
                                    <div class="col-sm-5">
                                    <input type="email" name="email" class="form-control" id="email" value="" placeholder="Input email">
                                    </div>
                                </div>
                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer">
                                    
                            <button type="submit" class="btn btn-primary" value="add" name="aksi">Submit</button>

                            <a href="pasien.php" class="btn btn-danger" >Batal</a>
                            </div>
                        </form>
                    </div>
                    <!-- /.card -->
                </div>
                <!--/.col (right) -->
            </div>
            
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>   
</div>
<!-- /.content -->

@endsection
