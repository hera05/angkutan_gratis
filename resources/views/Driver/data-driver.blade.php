@extends('layout.v_template')
@section('title', 'Data Driver')
    
@section('content')
<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Data Driver</h1>
    {{-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
            class="fas fa-download fa-sm text-white-50"></i> Generate Report</a> --}}
</div>
    <!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Basic Card Example -->
    <div class="card shadow mb-4">
       <div class="content">
           <div class="card-info card-outline">
            <div class="card-header">
                <div class="card-tools">
                    <a href="/create-driver" class="btn btn-info">Tambah<i class="fas fa-plus-square"></i></a>
                </div>
            </div>
            <div class="card-body">
                <table class="table table-bordered">
                    <tr>
                        <th>ID Driver</th>
                        <th>Nama Driver</th>
                        <th>NIK Driver</th>
                        <th>Alamat</th>
                        <th>Nomor Handphone</th>
                        <th>Username</th>
                        <th>Password</th>
                        <th>Foto</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
{{-- 
                    <tr>
                        <td>1</td>
                        <td>Rute A</td>
                        <td>Terminal Blambangan</td>
                        <td>Terminal Brawijaya</td>
                        <td>
                        <a href="#"> <i class="fa fa-edit"></i></a> 
                        | 
                        <a href="#"><i class="fa fa-trash" aria-hidden="true" style="color:red"></i></a>
                        </td>
                    </tr>

                    <tr>
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
                    {{-- @foreach ($dtBerita as $item)
                    <tr>
                        <td>{{ $item->idberita }}</td>
                        <td>{{ date('d-m-Y', strtotime($item->tgl_berita))  }}</td>
                        <td>{{ $item->judul_berita }}</td>
                        <td>{{ $item->nip }}</td>
                        <td>{{ $item->uraian_berita }}</td>
                        <td>
                        <a href="{{ url('edit-berita',$item->id) }}"> <i class="fa fa-edit"></i></a> 
                        | 
                        <a href="{{ url('delete-berita',$item->id) }}"><i class="fa fa-trash" aria-hidden="true" style="color:red"></i></a>
                        </td>
                    </tr>
                    @endforeach
                     --}}
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