@extends('layout.v_template')
@section('title', 'Rekap Presensi Driver')
    
@section('content')
<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Rekap Presensi Driver</h1>
    {{-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
            class="fas fa-download fa-sm text-white-50"></i> Generate Report</a> --}}
</div>
    <!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Basic Card Example -->
    <div class="card shadow mb-4">
       <div class="content">
           <div class="card-info card-outline">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-center">REKAP PRESENSI DRIVER</h6>
             </div>
            <div class="card-body">
                <div class="table-responsive">
                <form action="{{ route('superadmin.filter-driver') }}" method="GET" class="mb-3">
                    <div class="row pb-3">
                        <div class="col-md-3">
                            <label for="exampleInputTanggalDari">Dari Tanggal</label>
                            <input type="date" name="dari" class="form-control" id="exampleInputTanggalDari" placeholder="Dari Tanggal" autocomplete="off" value="{{ date('d-m-Y') }}">
                        </div>
                        <div class="col-md-3">
                            <label for="exampleInputTanggalSampai">Sampai Tanggal</label>
                            <input type="date" name="sampai" class="form-control " id="exampleInputTanggalSampai" placeholder="Sampai Tanggal" autocomplete="off" value="{{ date('d-m-Y') }}">
                        </div>
                        <div class="col-md-1 pt-4">
                            <button type="submit" class="btn btn-primary me-2">Filter</button>
                        </div>
                        <div class="col-md-1 pt-4">
                            <a href="{{ route('superadmin.rekap-driver') }}" class="btn btn-secondary">Reset</a>
                        </div>
                    </div>
                </form>

                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Tanggal</th>
                            <th>Nama Driver</th>
                            <th>Foto</th>
                            <th>Keterangan</th>
                            {{-- <th>Izin</th>
                            <th>Izin Alasan</th> --}}
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($dtRekapDriver as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->created_at->format('d-m-Y') }}</td> 
                            <td>{{ $item->mobil->user->name }}</td>
                            <td><img src="{{ asset('storage/photos/' . $item->foto) }}" alt="gambar" width="100"></td>
                            <td>{{ $item->keterangan }}</td>
                            {{-- <td>{{ $item->izin_time}}</td>
                            <td>{{ $item->izin_alasan }}</td> --}}
                            <td>{{ $item->status }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="card-header">
                    <div class="card-tools">
                        {{-- <a href="{{ route('create-pegawai') }}" class="btn btn-info">Simpan Data<i class="fas fa-plus-square"></i></a> --}}
                        <a href="{{ route('superadmin.cetak-driver') }}" target="_blank" class="btn btn-primary">Cetak Data<i class="fas fa-print"></i></a>
                    </div>
                </div>
                {{-- @if($dtRekapDriver->isNotEmpty())
                    <form method="GET" action="{{ route('superadmin.cetak-driver') }}" target="_blank">
                        <input type="hidden" name="dari" value="{{ request('dari') }}">
                        <input type="hidden" name="sampai" value="{{ request('sampai') }}">
                        <button type="submit" class="btn btn-success">Cetak</button>
                    </form>
                    @endif --}}
                <!-- Tombol Cetak -->
                {{-- @if($dtRekapDriver->isNotEmpty())
                <form method="GET" action="{{ route('superadmin.cetak-driver') }}" target="_blank">
                    <input type="hidden" name="dari" value="{{ request('dari') }}">
                    <input type="hidden" name="sampai" value="{{ request('sampai') }}">
                    <button type="submit" class="btn btn-success">Cetak</button>
                </form>
                @endif --}}
            </div>
           </div>
       </div>
    </div>
</div>

@endsection
