@extends('layout.v_template')
@section('title', 'Create Akun')
@section('content')
<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Tambah Data Akun</h1>
    {{-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
            class="fas fa-download fa-sm text-white-50"></i> Generate Report</a> --}}
</div>
<div class="container-fluid">
    <!-- Basic Card Example -->
    <div class="card shadow mb-4">
       <div class="card-header py-3">
          <h6 class="m-0 font-weight-bold text-center">TAMBAH AKUN</h6>
       </div>
       <div class="content">
           <div class="card-info card-outline">
            
            <div class="card-body">
                <form method="POST"  action="{{ route('superadmin.user.store') }}" enctype="multipart/form-data">
                {{ csrf_field() }}
                    <div class="form-group">
                        <label for="exampleInputNama1">Nama</label>
                        <input type="text" class="form-control" id="exampleInputNama1" name="name" aria-describedby="emailHelp">
                        
                    </div>
                    <div class="form-group mt-2">
                        <label for="exampleInputEmail1">Email</label>
                        <input type="email" class="form-control" id="exampleInputEmail1" name="email" aria-describedby="emailHelp">
                        
                    </div>
                    <div class="form-group mt-2">
                        <label for="exampleInputPassword1">Password</label>
                        <input type="password" class="form-control" id="exampleInputPassword1" name="password" placeholder="Password">
                    </div>
                    <div class="form-group mt-2">
                        <label for="exampleInputPasswordConfirmation">Confirm Password</label>
                        <input type="password" class="form-control" id="exampleInputPasswordConfirmation" name="password_confirmation" placeholder="Confirm Password">
                    </div>

                    <div class="form-group">
                        <label for="exampleInputAlamat1">Alamat</label>
                        <input type="text" class="form-control" id="exampleInputAlamat1" name="alamat" aria-describedby="alamatHelp">
                        
                    </div>
                    <div class="form-group mt-2">
                        <label for="exampleInputTlpn1">No Telepon</label>
                        <input type="text" class="form-control" id="exampleInputTlpn1" name="tlp" aria-describedby="teleponHelp">
                        
                    </div>
                    <div class="form-group mt-2">
                        <label for="exampleInputFoto1">Foto</label>
                        <input type="file" class="form-control" id="exampleInputFoto1" name="foto" aria-describedby="fotoHelp">
                    </div>
                    <!-- Role Selection -->
                    <div class="form-group mt-2">
                        <label for="exampleInputRole1">Role</label>
                        <select class="form-control" id="exampleInputRole1" name="role">
                            <option value="super_admin">Superadmin</option>
                            <option value="admin">Admin</option>
                            <option value="petugas">Petugas</option>
                            <option value="driver">Driver</option>
                        </select>
                    </div>
                   
                    <button type="submit" class="btn btn-primary mt-3">Submit</button>
                </form>
            </div>
           </div>
       </div>
</div>
</div>
@endsection