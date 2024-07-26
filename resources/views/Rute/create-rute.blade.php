@extends('layout.v_template')
@section('title', 'Create Rute')
@section('content')
<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Tambah Data Rute</h1>
    {{-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
            class="fas fa-download fa-sm text-white-50"></i> Generate Report</a> --}}
</div>
<div class="container-fluid">
    <!-- Basic Card Example -->
    <div class="card shadow mb-4">
       <div class="card-header py-3">
          <h6 class="m-0 font-weight-bold text-center">TAMBAH RUTE</h6>
       </div>
       <div class="content">
           <div class="card-info card-outline">
            
            <div class="card-body">
                <form action="{{ route('superadmin.simpan-data-rute') }}" method="POST">
                    {{ csrf_field() }}
                    {{-- <div class="form-group">
                        <label for="tgl_berita">Tanggal</label>
                        <input type="date" id="tgl_berita" name="tgl_berita" class="form-control" placeholder="Tanggal Berita">
                    </div> --}}
                    {{-- <div class="form-group">
                        <label for="nama_rute">Nama Rute</label>
                        <input type="text" id="nama_rute" name="nama_rute" class="form-control" placeholder="Nama Rute>
                    </div> --}}
                    <div class="form-group">
                        <label for="nama_rute">Nama Rute</label>
                        <input type="text" id="nama_rute" name="nama_rute" class="form-control" placeholder="Nama Rute">
                    </div>
                    
                    {{-- <div class="form-group">
                        <label for="uraian_berita">Uraian</label>
                        <textarea id="uraian_berita" name="uraian_berita" class="form-control" placeholder="Uraian Berita"></textarea>
                    </div> --}}
                    <div class="form-group">
                        <button type="submit" class="btn btn-info">Simpan</button>
                    </div>
                </form>
            </div>
           </div>
       </div>
</div>
</div>
@endsection