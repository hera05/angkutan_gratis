@extends('layout.v_template')
@section('title', 'Data Angkutan')
    
@section('content')
<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Data Angkutan</h1>
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
                <h6 class="m-0 font-weight-bold text-center">DATA ANGKUTAN</h6>
             </div>
            {{-- <div class="card-header">
                <div class="card-tools">
                    <a href="/create-rute" class="btn btn-info">Tambah<i class="fas fa-plus-square"></i></a>
                </div>
            </div> --}}
            <br>
            <div class="card-body">
                <div class="table-responsive">
                <form action="{{ route('superadmin.filter-angkutan') }}" method="GET" class="mb-2">
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
                        <div class="col-sm-3">
                            <select name="sesi" id="filter_sesi"  class="form-control">
                                <option value="">Sesi</option>
                                <option value="sesi 1" selected="{{isset($_GET['sesi']) && $_GET['sesi'] == 'sesi 1'}}">Sesi 1</option>
                                <option value="sesi 2" selected="{{isset($_GET['sesi']) && $_GET['sesi'] == 'sesi 1'}}">Sesi 2</option>
                            </select>
                        </div>
                        <div class="col-sm-3">
                            <button type="submit" class="btn btn-primary me-2">Filter</button>
                            |
                            <a href="{{ route('superadmin.filter-angkutan') }}" class="btn btn-secondary">Reset</a>
                            |
                            {{-- <a href="#" class="btn btn-primary">Export</a> --}}
                        </div>
                    </div>
                </form>
                
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <tr>
                        <th>No.</th>
                        <th>Tanggal</th>
                        <th>Plat Nomor</th>
                        <th>Nama Driver</th>
                        <th>Nama Rute</th>
                        <th>Opsi</th>
                        <th>Sesi</th>
                        <th>Jumlah Penumpang</th>
                        <th>Gambar</th>
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
                    @foreach ($dtRekapAngkutan as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->created_at }}</td>
                        <td>{{ $item->plat_nomor }}</td>
                        <td>{{ $item->nama_driver }}</td>
                        <td>{{ $item->nama_rute }}</td>
                        <td>{{ $item->opsi }}</td>
                        <td>{{ $item->sesi }}</td>
                        <td>{{ $item->jumlah_penumpang }}</td>
                        <td><img src="{{ asset('storage/' . $item->gambar) }}" alt="gambar" width="100"></td>
                       
                    </tr>
                    @endforeach
                    
                </table>
                <div class="col-sm-3 d-flex">
                    <a href="{{ route('superadmin.cetak-angkutan') }}" class="btn btn-primary">Cetak</a>
                </div>
                {{-- <div class="col-sm-3 d-flex">
                    <a href="#" class="btn btn-primary">Cetak</a>
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



{{-- <script>
    document.addEventListener('DOMContentLoaded', function() {
        const filterForm = document.getElementById('filterForm');
        const filterElements = filterForm.querySelectorAll('input, select');

        filterElements.forEach(element => {
            element.addEventListener('change', function() {
                filterForm.submit();
            });
        });
    });
</script> --}}