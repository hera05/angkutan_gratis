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
                   <form action="{{ route('superadmin.filter-angkutan') }}" method="GET" class="mb-3" onsubmit="return validateForm()">
    <div class="row pb-3">
        <div class="col-md-3">
            <label for="exampleInputTanggalDari">Dari Tanggal</label>
            <input type="date" name="dari" class="form-control" id="exampleInputTanggalDari" placeholder="Dari Tanggal" autocomplete="off" value="{{ date('d-m-Y') }}">
        </div>
        <div class="col-md-3">
            <label for="exampleInputTanggalSampai">Sampai Tanggal</label>
            <input type="date" name="sampai" class="form-control" id="exampleInputTanggalSampai" placeholder="Sampai Tanggal" autocomplete="off" value="{{ date('d-m-Y') }}">
        </div>
        <div class="col-md-3">
            <label for="exampleInputSesi">Sesi</label>
            <select name="sesi" class="form-control" id="exampleInputSesi">
                <option value="">Pilih Sesi</option>
                <option value="sesi 1">Sesi 1</option>
                <option value="sesi 2">Sesi 2</option>
            </select>
        </div>
        <div class="col-md-3">
            <label for="exampleInputRute">Rute</label>
            <select name="rute" class="form-control" id="exampleInputRute">
                <option value="">Pilih Rute</option>
                @foreach($dtRekapAngkutan as $item)
                    <option value="{{ $item->plat_nomor->rute->nama_rute }}">{{ $item->plat_nomor->rute->nama_rute }}</option>
                @endforeach
            </select>
        </div>
        <div class="col-md-1 pt-4">
            <button type="submit" class="btn btn-primary me-2">Filter</button>
        </div>
        <div class="col-md-1 pt-4">
            <a href="{{ route('superadmin.data-angkutan') }}" class="btn btn-secondary">Reset</a>
        </div>
    </div>
</form>

<script>
    function validateForm() {
        var dari = document.getElementById("exampleInputTanggalDari").value;
        var sampai = document.getElementById("exampleInputTanggalSampai").value;
        var sesi = document.getElementById("exampleInputSesi").value;
        var rute = document.getElementById("exampleInputRute").value;

        if (dari === "" || sampai === "" || sesi === "" || rute === "") {
            alert("Harap isi semua filter sebelum melanjutkan.");
            return false;
        }
        return true;
    }
</script>

                    
                    
                
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <tr>
                        <th>No.</th>
                        <th>Tanggal</th>
                        <th>Nama Petugas</th>
                        <th>Nama Driver</th>
                        <th>Plat Nomor</th>
                        <th>Nama Rute</th>
                        <th>Opsi</th>
                        <th>Sesi</th>
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
                        <td>{{ $item->created_at->format('d-m-Y') }}</td>
                        <td>{{ $item->petugas->name }}</td>
                        <td>{{ $item->plat_nomor->user->name }}</td>
                        <td>{{ $item->plat_nomor->plat_nomor }}</td>
                        <td>{{ $item->plat_nomor->rute->nama_rute }}</td>
                        <td>{{ $item->opsi }}</td>
                        <td>{{ $item->sesi }}</td>
                        <td><img src="{{ asset('storage/photos/' . $item->gambar) }}" alt="gambar" width="100"></td>
                       
                    </tr>
                    @endforeach
                    
                </table>
                <div class="card-header">
                    <div class="card-tools">
                        {{-- <a href="{{ route('create-pegawai') }}" class="btn btn-info">Simpan Data<i class="fas fa-plus-square"></i></a> --}}
                        <a href="{{ route('superadmin.cetak-angkutan') }}" target="_blank" class="btn btn-primary">Cetak Data<i class="fas fa-print"></i></a>
                    </div>
                </div>
                {{-- <div class="col-sm-3 d-flex">
                    <a href="{{ route('superadmin.cetak-angkutan') }}" class="btn btn-primary">Cetak</a>
                </div> --}}
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