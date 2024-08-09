@extends('layout.v_template')
@section('title', 'Rekap Presensi Penumpang')
    
@section('content')
<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Rekap Presensi Penumpang</h1>
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
                <h6 class="m-0 font-weight-bold text-center">REKAP PRESENSI PENUMPANG</h6>
             </div>
            {{-- <div class="card-header">
                <div class="card-tools">
                    <a href="/create-rute" class="btn btn-info">Tambah<i class="fas fa-plus-square"></i></a>
                </div>
            </div> --}}
            <div class="card-body">
                <div class="table-responsive">
                    <form action="{{ route('superadmin.filter-penumpang') }}" method="GET" class="mb-3">
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
                                <a href="{{ route('superadmin.rekap-penumpang') }}" class="btn btn-secondary">Reset</a>
                            </div>
                        </div>
                    </form>
                    @if ($dtRekapPenumpang->count() > 0)
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <tr>
                        <th>No.</th>
                        <th>Tanggal</th>
                        <th>Nama Driver</th>
                        <th>Plat Nomor</th>
                        <th>Nama Penumpang</th>
                        <th>Alamat Penumpang</th>
                        <th>Jenis Penumpang</th>
                    </tr>
                    @foreach ($dtRekapPenumpang as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->created_at->format('d-m-Y') }}</td> 
                        <td>{{ $item->driver_penumpang->user->name }}</td>
                        <td>{{ $item->driver_penumpang->plat_nomor }}</td>
                        <td>{{ $item->nama_penumpang }}</td>
                        <td>{{ $item->alamat_penumpang }}</td>
                        <td>{{ $item->jenis_penumpang }}</td>
                    </tr>
                    @endforeach
                    
                </table>
                @else
            <p>Tidak ada data untuk ditampilkan.</p>
        @endif
        <div class="card-header">
            <div class="card-tools">
                {{-- <a href="{{ route('create-pegawai') }}" class="btn btn-info">Simpan Data<i class="fas fa-plus-square"></i></a> --}}
                <a href="{{ route('superadmin.cetak-penumpang') }}" target="_blank" class="btn btn-primary">Cetak Data<i class="fas fa-print"></i></a>
            </div>
        </div>
        {{-- <!-- Link untuk cetak -->
        <a href="{{ route('superadmin.cetak-penumpang', ['dari' => request()->dari, 'sampai' => request()->sampai]) }}" target="_blank">Cetak</a> --}}
                {{-- <div class="col-sm-3 d-flex">
                    <a href="{{ route('superadmin.cetak-penumpang') }}" class="btn btn-primary">Cetak</a>
                </div> --}}
            </div>
            {{-- <div class="card-footer">
                {{ $dtBerita->links() }}
                </div>     --}}
           </div>
       </div>
</div>
</div>

@endsection