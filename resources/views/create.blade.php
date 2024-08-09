@extends('dhasboard.layout')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Tambah Kursus</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Form Tambah Kursus</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <section class="content">
      <div class="container-fluid">
       <form action="{{ route('courses.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row">
          <!-- left column -->
          <div class="col-md-6">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Form Tambah Kursus</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <div class="card-body">
                <div class="form-group">
                  <label for="judul">Judul Kursus</label>
                  <input type="text" class="form-control" id="judul" name="judul" placeholder="Masukkan judul kursus">
                  @error('judul')
                    <small>{{ $message }}</small>
                  @enderror
                </div>
                <div class="form-group">
                  <label for="deskripsi">Deskripsi</label>
                  <textarea class="form-control" id="deskripsi" name="deskripsi" placeholder="Masukkan deskripsi kursus"></textarea>
                  @error('deskripsi')
                    <small>{{ $message }}</small>
                  @enderror
                </div>
                <div class="form-group">
                  <label for="durasi">Durasi (dalam menit)</label>
                  <input type="number" class="form-control" id="durasi" name="durasi" placeholder="Masukkan durasi kursus">
                  @error('durasi')
                    <small>{{ $message }}</small>
                  @enderror
                </div>
              </div>
              <!-- /.card-body -->

              <div class="card-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
              </div>
            </div>
            <!-- /.card -->
          </div>
          <!--/.col (left) -->
        </div>
       </form>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
  
  </div>  
    
@endsection
