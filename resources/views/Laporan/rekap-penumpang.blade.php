@extends('layout.v_template')
@section('title', 'Rekap Absensi Penumpang')
    
@section('content')
<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Rekap Absensi Penumpang</h1>
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
                <h6 class="m-0 font-weight-bold text-center">REKAP ABSENSI PENUMPANG</h6>
             </div>
            {{-- <div class="card-header">
                <div class="card-tools">
                    <a href="/create-rute" class="btn btn-info">Tambah<i class="fas fa-plus-square"></i></a>
                </div>
            </div> --}}
            <div class="card-body">
                <div class="table-responsive">
                <form action="{{ route('superadmin.filter-penumpang') }}" method="GET" class="mb-3">
                    <div class="row">
                        <div class="col-sm-3">
                            <select name="bulan" id="filter_bulan" class="form-control">
                                <option value="">-- Pilih Bulan --</option>
                                @foreach (range(1, 12) as $month)
                                <option value="{{ $month }}">{{ date('F', mktime(0, 0, 0, $month, 10)) }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-sm-3">
                            <select name="tahun" id="filter_tahun" class="form-control">
                                <option value="">-- Pilih Tahun --</option>
                                @foreach (range(2021, 2030) as $year)
                                <option value="{{ $year }}">{{ $year }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-sm-3">
                            <input type="date" name="tanggal" id="filter_tanggal" class="form-control" value="{{ old('tanggal') }}">
                        </div>
                        <div class="col-sm-3 d-flex">
                            <button type="submit" class="btn btn-primary me-2">Filter</button>
                            |
                            <a href="{{ route('superadmin.filter-penumpang') }}" class="btn btn-secondary">Reset</a>
                            |
                            {{-- <a href="{{ route('superadmin.filter-penumpang') }}" class="btn btn-primary">Export</a> --}}
                        </div>
                    </div>
                </form>
                
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <tr>
                        <th>No.</th>
                        <th>Tanggal</th>
                        <th>Nama Penumpang</th>
                        <th>Alamat Penumpang</th>
                        <th>Jenis Penumpang</th>
                    </tr>

                    {{-- <tr>
                        <td>1</td>
                        <td>Rute A</td>
                        <td>Terminal Blambangan</td>
                        <td>Terminal Brawijaya</td>
                        <td>
                        <a href="/edit-rute"> <i class="fa fa-edit"></i></a> 
                        | 
                        <a href="#"><i class="fa fa-trash" aria-hidden="true" style="color:red"></i></a>
                        </td>
                    </tr> --}}

                    {{-- <tr>
                        <td>2</td>
                        <td>Rute B</td>
                        <td>Terminal Blambangan</td>
                        <td>Terminal Sasak Perot</td>
                        <td>
                        <a href="#"> <i class="fa fa-edit"></i></a> 
                        | 
                        <a href="#"><i class="fa fa-trash" aria-hidden="true" style="color:red"></i></a>
                        </td>
                    </tr> --}}
                    @foreach ($dtRekapPenumpang as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->tanggal }}</td>
                        <td>{{ $item->nama_penumpang }}</td>
                        <td>{{ $item->alamat_penumpang }}</td>
                        <td>{{ $item->jenis_penumpang }}</td>
                    </tr>
                    @endforeach
                    
                </table>
                <div class="col-sm-3 d-flex">
                    <a href="{{ route('superadmin.cetak-penumpang') }}" class="btn btn-primary">Cetak</a>
                </div>
            </div>
            {{-- <div class="card-footer">
                {{ $dtBerita->links() }}
                </div>     --}}
           </div>
       </div>
</div>
</div>

@endsection