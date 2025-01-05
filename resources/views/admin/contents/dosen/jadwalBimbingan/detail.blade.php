@extends('admin.main')

@section('content')
<div class="content">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Detail Pengajuan</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Detail Pengajuan</li>
            </ol>
          </div><!-- /.col -->
        </div>
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card card-info" >
                <div class="card-header">
                    <h3 class="card-title">Detail Pengajuan Jadwal</h3>
                </div>
                <div class="card-body">
                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-4 col-5 col-form">Nama Lengkap:</label>
                        <span>{{ $jadwalbmb->mahasiswa->nama }}</span>
                    </div>
                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-4 col-5 col-form">NIM:</label>
                        <span>{{ $jadwalbmb->mahasiswa->nim }}</span>
                    </div>
                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-4 col-5 col-form">Tgl Pengajuan :</label>
                        <span>{{ $jadwalbmb->tanggal->isoFormat('dddd') }} {{ $jadwalbmb->tanggal->format('Y-m-d ') }}</span>
                    </div>
                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-4 col-5 col-form">Jam :</label>
                        <span>{{ $jadwalbmb->tanggal->format('H:i') }}</span>
                    </div>

                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-4 col-5 col-form">Deskripsi :</label>
                        <span>{{ $jadwalbmb->deskripsiBimbingan }}</span>
                    </div>
                    {{-- Jika Statusnya "Jadwal Direvisi" maka alasannya akan tampil --}}
                    {{-- @if ($jadwalbmb->status == 'Jadwal Direvisi')      
                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-4 col-form">Alasan :</label>
                        <span>{{ $jadwalbmb->pesan }}</span>
                    </div>
                    @endif --}}

                    
                    
                    {{-- Jika Statusnya "Menunggu Disetujui" maka form ubah jadwal akan tampil --}}
                    @if ($jadwalbmb->status == 'Menunggu Disetujui' OR $jadwalbmb->status == 'Jadwal Direvisi')
                    <!-- Date and time -->
                    
                    <form action="{{ route('dosen.jadwalBimbingan.revisi', $jadwalbmb->id) }}" method="POST">
                        @csrf
                        @method('PATCH')
                    <div class="form-group">
                    <label>Ubah Jadwal :</label>
                        <div class="input-group date" id="reservationdatetime" data-target-input="nearest">
                            <input type="text" class="form-control datetimepicker-input" name="tanggal" id="tanggal" data-target="#reservationdatetime" value="{{ old('tanggal', $jadwalbmb->tanggal) }}" required/>
                            
                            <div class="input-group-append" data-target="#reservationdatetime" data-toggle="datetimepicker">
                                <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Pesan</label>
                        <input type="text" class="form-control" name="pesan" id="pesan" placeholder="Kirim Pesan Alasan" value="{{ old('pesan', $jadwalbmb->pesan) }}" required>
                    </div>
                </div>
                
                    <div class="card-footer">
                        <input type="hidden" name="tanggal_lama" id="tanggal_lama" value="{{ old('tanggal_lama', $jadwalbmb->tanggal) }}"/>
                            <button type="submit" class="btn btn-info" id="ubah_jadwal">Ubah Jadwal</button>
                        </form>
                        @endif
                            
                        <a href="/dosen/jadwalBimbingan" class="btn btn-danger float-right">Kembali</a>
                    </div>
  
                    
                </div>
            </div>
        </div>
</div>

@endsection

