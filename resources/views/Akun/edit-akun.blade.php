@extends('layout.v_template')
@section('title', 'Edit Akun')
@section('content')
<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Edit Data Akun</h1>
</div>
<div class="container-fluid">
    <!-- Basic Card Example -->
    <div class="card shadow mb-4">
       <div class="card-header py-3">
          <h6 class="m-0 font-weight-bold text-center">EDIT AKUN</h6>
       </div>
       <div class="content">
           <div class="card-info card-outline">
            <div class="card-body">
                <form method="post"  action="{{ route('superadmin.user.update', ['id' => $data->id]) }}" enctype="multipart/form-data">
                    @csrf
                    @method('post')
                    <div class="form-group">
                        <label for="exampleInputNama1">Nama</label>
                        <input type="text" class="form-control" id="exampleInputNama1" name="name" value="{{ old('name', $data->name) }}">
                        @error('name')
                        <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group mt-2">
                        <label for="exampleInputEmail1">Email</label>
                        <input type="email" class="form-control" id="exampleInputEmail1" name="email" value="{{ old('email', $data->email) }}">
                        @error('email')
                        <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group mt-2">
                        <label for="exampleInputPassword1">Password</label>
                        <input type="password" class="form-control" id="exampleInputPassword1" name="password" placeholder="Password">
                        @error('password')
                        <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group mt-2">
                        <label for="exampleInputPasswordConfirmation">Confirm Password</label>
                        <input type="password" class="form-control" id="exampleInputPasswordConfirmation" name="password_confirmation" placeholder="Confirm Password">
                    </div>
                    <div class="form-group mt-2">
                        <label for="exampleInputAlamat1">Alamat</label>
                        <input type="text" class="form-control" id="exampleInputAlamat1" name="alamat" value="{{ old('alamat', $data->alamat) }}">
                        @error('alamat')
                        <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group mt-2">
                        <label for="exampleInputTlpn1">No Telepon</label>
                        <input type="text" class="form-control" id="exampleInputTlpn1" name="tlp" value="{{ old('tlp', $data->tlp) }}">
                        @error('tlp')
                        <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    @if ($data->foto)
                    <img src="{{ asset('storage/photos/' . $data->foto) }}" width="100" height="100px" alt="User Photo">
                    @endif
                    <div class="form-group mt-2">
                        <label for="exampleInputFoto1">Foto</label>
                        <input type="file" class="form-control" id="exampleInputFoto1" name="foto">
                        <small>Upload foto jika ingin menggantinya</small>
                        @error('foto')
                        <br>
                        <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group mt-2">
                        <label for="exampleInputRole1">Role</label>
                        <select class="form-control" id="exampleInputRole1" name="role">
                            <option value="super_admin" {{ old('role', $data->role) == 'super_admin' ? 'selected' : '' }}>Superadmin</option>
                            <option value="admin" {{ old('role', $data->role) == 'admin' ? 'selected' : '' }}>Admin</option>
                            <option value="petugas" {{ old('role', $data->role) == 'petugas' ? 'selected' : '' }}>Petugas</option>
                            <option value="driver" {{ old('role', $data->role) == 'driver' ? 'selected' : '' }}>Driver</option>
                        </select>
                        @error('role')
                        <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary mt-3">Submit</button>
                </form>
            </div>
           </div>
       </div>
</div>
</div>
@endsection
