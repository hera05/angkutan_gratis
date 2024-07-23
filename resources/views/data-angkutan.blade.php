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
        <form id="filterForm" action="{{ url('/filter-angkutan') }}" method="POST">
            @csrf
            <label for="tanggal">Tanggal</label>
            <input type="date" id="tanggal" name="tanggal" value="{{ old('tanggal', $tanggal ?? '2024-01-21') }}">
            
            <label for="opsi">Opsi</label>
            <select id="opsi" name="opsi">
                <option value="keberangkatan" {{ old('opsi', $opsi ?? '') == 'keberangkatan' ? 'selected' : '' }}>Keberangkatan</option>
                <option value="kedatangan" {{ old('opsi', $opsi ?? '') == 'kedatangan' ? 'selected' : '' }}>Kedatangan</option>
            </select>
            
            <label for="sesi">Sesi</label>
            <select id="sesi" name="sesi">
                <option value="sesi1" {{ old('sesi', $sesi ?? '') == 'sesi1' ? 'selected' : '' }}>Sesi 1</option>
            </select>
            
            <label for="nama_rute">Rute</label>
            <select id="nama_rute" name="nama_rute">
                <option value="brawijaya-sasakperot" {{ old('nama_rute', $nama_rute ?? '') == 'brawijaya-sasakperot' ? 'selected' : '' }}>Terminal Brawijaya - Terminal Sasak Perot</option>
            </select>
        </form>
       


            <div class="card-body">
                <table class="table table-bordered">
                    <tr>
                        <th>No.</th>
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
                        <td>{{ $item->plat_nomor }}</td>
                        <td>{{ $item->nama_driver }}</td>
                        <td>{{ $item->nama_rute }}</td>
                        <td>{{ $item->opsi }}</td>
                        <td>{{ $item->sesi }}</td>
                        <td>{{ $item->jumlah_penumpang }}</td>
                        <td><img src="{{ asset('storage/' . $item->gambar) }}" alt="Gambar" width="100"></td>
                        <td>
                        </td>
                    </tr>
                    @endforeach
                    
                </table>
            </div>
            {{-- <div class="card-footer">
                {{ $dtBerita->links() }}
                </div>     --}}
           </div>
       </div>
</div>
</div>

@endsection


<script>
    document.addEventListener('DOMContentLoaded', function() {
        const filterForm = document.getElementById('filterForm');
        const filterElements = filterForm.querySelectorAll('input, select');

        filterElements.forEach(element => {
            element.addEventListener('change', function() {
                filterForm.submit();
            });
        });
    });
</script>