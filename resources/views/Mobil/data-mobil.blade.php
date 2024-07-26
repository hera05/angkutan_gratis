@extends('layout.v_template')
@section('title', 'Data Mobil')
    
@section('content')
<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Data Mobil</h1>
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
                <h6 class="m-0 font-weight-bold text-center">DATA MOBIL</h6>
             </div>
            <div class="card-header">
                <div class="card-tools">
                    <a href="{{ route('superadmin.create-data-mobil') }}" class="btn btn-info">Tambah<i class="fas fa-plus-square"></i></a>
                </div>
            </div>
            <div class="card-body">
                <table class="table table-bordered">
                    <tr>
                        {{-- <th>ID Mobil</th>
                        <th>Nama Pemilik Mobil</th>
                        <th>Nomor STNK</th> --}}
                        <th>No.</th>
                        <th>Plat Nomor</th>
                        {{-- <th>Status Pajak</th>
                        <th>No HP</th>
                        <th>Uji KIR</th> --}}
                        <th>Aksi</th>
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
                    @foreach ($dtMobil as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->plat_nomor }}</td>
                        <td>
                        <a href="{{ url('superadmin.edit-mobil',$item->id) }}"> <i class="fa fa-edit"></i></a> 
                        | 
                        <a href="{{ url('delete-mobil',$item->id) }}"><i class="fa fa-trash" aria-hidden="true" style="color:red"></i></a>
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