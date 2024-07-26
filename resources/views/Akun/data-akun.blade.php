@extends('layout.v_template')
@section('title', 'Data Akun')
    
@section('content')
<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Data Akun</h1>
</div>
<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Basic Card Example -->
    <div class="card shadow mb-4">
       <div class="content">
           <div class="card-info card-outline">
            <div class="card-header">
                <div class="card-tools">
                    <a href="{{ route('superadmin.user.create') }}" class="btn btn-info">Tambah <i class="fas fa-plus-square"></i></a>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>Alamat</th>
                            <th>No Telepon</th>
                            <th>Role</th>
                            <th>Foto</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($users as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{$item->name}}</td>
                            <td>{{$item->email}}</td>
                            <td>{{$item->alamat}}</td>
                            <td>{{$item->tlp}}</td>
                            <td>{{$item->role}}</td>
                            <td><img src="{{ asset('storage/photos/' . $item->foto) }}" alt="gambar" width="100"></td>
                            <td>
                                <a href="{{ route('superadmin.user.edit',$item->id) }}"> <i class="fa fa-edit"></i></a> 
                                | 
                                <a href="#" data-toggle="modal" data-target="#modal-hapus{{ $item->id }}"><i class="fas fa-trash" aria-hidden="true" style="color:red"></i></a>
                            </td>
                        </tr>
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
                                        <p>Apakah kamu yakin ingin menghapus data user <b>{{ $item->name }}</b>?</p>
                                    </div>
                                    <div class="modal-footer justify-content-between">
                                        <form action="{{ route('superadmin.user.delete', ['id' => $item->id]) }}" method="POST">
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
                        <!-- /.modal -->
                        @endforeach
                    </tbody>
                </table>
            </div>
           </div>
       </div>
    </div>
</div>

@endsection
