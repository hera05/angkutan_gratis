@extends('layout.v_template')
@section('title', 'Edit Data Driver')
@section('content')
<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Edit Data Driver</h1>
    {{-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
            class="fas fa-download fa-sm text-white-50"></i> Generate Report</a> --}}
</div>
<div class="container-fluid">
    <!-- Basic Card Example -->
    <div class="card shadow mb-4">
       <div class="card-header py-3">
          <h6 class="m-0 font-weight-bold text-center">EDIT DRIVER</h6>
       </div>
       <div class="content">
           <div class="card-info card-outline">
            
            <div class="card-body">
                <form action="#" method="POST">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label for="id_driver">ID Driver</label>
                        <input type="text" id="id_driver" name="id_driver" class="form-control" placeholder="ID Driver">
                    </div>
                    {{-- <div class="form-group">
                        <label for="tgl_berita">Tanggal</label>
                        <input type="date" id="tgl_berita" name="tgl_berita" class="form-control" placeholder="Tanggal Berita">
                    </div> --}}
                    {{-- <div class="form-group">
                        <label for="nama_rute">Nama Rute</label>
                        <input type="text" id="nama_rute" name="nama_rute" class="form-control" placeholder="Nama Rute>
                    </div> --}}
                    <div class="form-group">
                        <label for="nama_driver">Nama Driver</label>
                        <input type="text" id="nama_driver" name="nama_driver" class="form-control" placeholder="Nama Driver">
                    </div>
                    <div class="form-group">
                        <label for="nik_driver">NIK Driver</label>
                        <input type="text" id="nik_driver" name="nik_driver" class="form-control" placeholder="NIK Driver">
                    </div>
                    <div class="form-group">
                        <label for="alamat">Alamat</label>
                        <textarea id="alamat" name="alamat" class="form-control" placeholder="Alamat"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="no_hp">Nomor Handphone</label>
                        <input type="text" id="no_hp" name="no_hp" class="form-control" placeholder="Nomor Handphone">
                    </div>
                    <div class="form-group">
                        <label for="username">Username</label>
                        <input type="text" id="username" name="username" class="form-control" placeholder="Username">
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="text" id="password" name="password" class="form-control" placeholder="Password">
                    </div>
                    <div class="form-group">
                        <label for="gambar">Gambar</label>
                        <input type="file" id="gambar" name="gambar" class="form-control" placeholder=" Gambar">
                    </div>
                    <div class="form-group">
                        <label for="status">Status</label>
                        <input type="text" id="status" name="status" class="form-control" placeholder="Status">
                    </div>
                    {{-- <div class="form-group">
                        <label for="uraian_berita">Uraian</label>
                        <textarea id="uraian_berita" name="uraian_berita" class="form-control" placeholder="Uraian Berita"></textarea>
                    </div> --}}
                    <div class="form-group">
                        <button type="submit" class="btn btn-info">Ubah</button>
                    </div>
                </form>
            </div>
           </div>
       </div>
</div>
</div>
@endsection