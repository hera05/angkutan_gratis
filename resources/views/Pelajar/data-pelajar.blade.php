@extends('layout.v_template')
@section('title', 'Data Pelajar')
    
@section('content')
<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Data Pelajar</h1>
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
                    <a href="{{ route('superadmin.create-data-pelajar') }}" class="btn btn-info">Tambah<i class="fas fa-plus-square"></i></a>
                </div>
            </div>
            <div class="card-body">
                <table class="table table-bordered">
                    <tr>
                        <th>No.</th>
                        <th>Nama Pelajar</th>
                        <th>Titik Jemput</th>
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
                    @foreach ($dtPelajar as $item)
                    <tr>
                        
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->nama_pelajar }}</td>
                        <td>{{ $item->alamat_pelajar }}</td>
                        <td>
                        <a href="{{ route('superadmin.edit-data-pelajar',$item->id) }}"> <i class="fa fa-edit"></i></a> 
                        | 
                        <a href="#" data-toggle="modal" data-target="#modal-hapus{{ $item->id }}"><i class="fas fa-trash" aria-hidden="true" style="color:red"></i></a>
                        {{-- <a href="{{ route('superadmin.delete-data-pelajar',$item->id) }}"><i class="fa fa-trash" aria-hidden="true" style="color:red"></i></a> --}}
                        </td>
                    </tr>
                    @endforeach
                    <div class="modal fade" id="modal-hapus{{ $item->id }}">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title">Konfirmasi Hapus Data</h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <p>Apakah kamu yakin ingin menghapus data pelajar <b>{{ $item->nama_pelajar }}</b>?</p>
                                </div>
                                <div class="modal-footer justify-content-between">
                                    <form action="{{ route('superadmin.delete-data-pelajar', ['id' => $item->id]) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary">Ya, Hapus</button>
                                    </form>
                                </div>
                            </div>
                            <!-- /.modal-content -->
                        </div>
                        <!-- /.modal-dialog -->
                    </div>
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