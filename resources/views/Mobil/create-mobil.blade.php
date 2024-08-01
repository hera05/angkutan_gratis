@extends('layout.v_template')
@section('title', 'Create Mobil')
@section('content')
<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Tambah Data Mobil</h1>
    {{-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
            class="fas fa-download fa-sm text-white-50"></i> Generate Report</a> --}}
</div>
<div class="container-fluid">
    <!-- Basic Card Example -->
    <div class="card shadow mb-4">
       <div class="card-header py-3">
          <h6 class="m-0 font-weight-bold text-center">TAMBAH MOBIL</h6>
       </div>
       <div class="content">
           <div class="card-info card-outline">
            
            <div class="card-body">
                <form action="{{ route('superadmin.simpan-data-mobil') }}" method="POST">
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
                        <label for="merek_mobil">Merek Mobil</label>
                        <input type="text" id="merek_mobil" name="merek_mobil" class="form-control" placeholder="Merek Mobil">
                    </div>
                    <div class="form-group">
                        <label for="plat_nomor">Plat Nomor</label>
                        <input type="text" id="plat_nomor" name="plat_nomor" class="form-control" placeholder="Plat Nomor">
                    </div>
                    <div class="form-group">
                        <label for="no_stnk">Nomor STNK</label>
                        <input type="text" id="no_stnk" name="no_stnk" class="form-control" placeholder="Nomor STNK">
                    </div>
                    <!-- Status Pajak Selection -->
                    <div class="form-group mt-2">
                        <label for="exampleInputStatusPajak">Status Pajak</label>
                        <select class="form-control" id="exampleInputStatusPajak" name="status_pajak">
                            <option value="Aktif">Aktif</option>
                            <option value="Tidak Aktif">Tidak Aktif</option>
                        </select>
                    </div>
                    <!-- Uji Kir Selection -->
                    <div class="form-group mt-2">
                        <label for="exampleInputUjiKir">Uji Kir</label>
                        <select class="form-control" id="exampleInputUjiKir" name="uji_kir">
                            <option value="Sudah">Sudah</option>
                            <option value="Belum">Belum</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="jumlah_kursi">Jumlah Kursi</label>
                        <input type="text" id="jumlah_kursi" name="jumlah_kursi" class="form-control" placeholder="Jumlah Kursi">
                    </div>
                    <div class="form-group">
                        <label for="user_id">Driver</label>
                        <select name="user_id" class="form-control" id="user_id" required>
                            @foreach($drivers as $driver)
                                <option value="{{ $driver->id }}">{{ $driver->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="rute_id">Rute</label>
                        <select name="rute_id" id="rute_id" class="form-control" required>
                            @foreach($rutes as $rute)
                            <option value="{{ $rute->id }}">{{ $rute->nama_rute }}</option>
                            @endforeach
                        </select>
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