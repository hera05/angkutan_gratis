@extends('layout.v_template')

@section('title', 'Edit Mobil')

@section('content')
<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Edit Mobil</h1>
    {{-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
            class="fas fa-download fa-sm text-white-50"></i> Generate Report</a> --}}
</div>
<div class="container-fluid">
    <!-- Basic Card Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-center">EDIT MOBIL</h6>
        </div>
        <div class="content">
            <div class="card-info card-outline">
                <div class="card-body">
                    <form action="{{ route('superadmin.update-data-mobil', ['id' => $data->id]) }}" method="POST">
                        @csrf
                        @method('post')
                        <div class="form-group">
                            <label for="merek_mobil">Merek Mobil</label>
                            <input type="text" id="merek_mobil" name="merek_mobil" class="form-control" placeholder="Merek Mobil" value="{{ old('merek_mobil', $data->merek_mobil) }}" required>
                        </div>
                        <div class="form-group">
                            <label for="plat_nomor">Plat Nomor</label>
                            <input type="text" id="plat_nomor" name="plat_nomor" class="form-control" placeholder="Plat Nomor" value="{{ old('plat_nomor', $data->plat_nomor) }}" required>
                        </div>
                        <div class="form-group">
                            <label for="no_stnk">Nomor STNK</label>
                            <input type="text" id="no_stnk" name="no_stnk" class="form-control" placeholder="Nomor STNK" value="{{ old('no_stnk', $data->no_stnk) }}" required>
                        </div>
                        <!-- Status Pajak Selection -->
                        <div class="form-group mt-2">
                            <label for="status_pajak">Status Pajak</label>
                            <select class="form-control" id="status_pajak" name="status_pajak" required>
                                <option value="Aktif" {{ $data->status_pajak == 'Aktif' ? 'selected' : '' }}>Aktif</option>
                                <option value="Tidak Aktif" {{ $data->status_pajak == 'Tidak Aktif' ? 'selected' : '' }}>Tidak Aktif</option>
                            </select>
                        </div>
                        <!-- Uji Kir Selection -->
                        <div class="form-group mt-2">
                            <label for="uji_kir">Uji Kir</label>
                            <select class="form-control" id="uji_kir" name="uji_kir" required>
                                <option value="Sudah" {{ $data->uji_kir == 'Sudah' ? 'selected' : '' }}>Sudah</option>
                                <option value="Belum" {{ $data->uji_kir == 'Belum' ? 'selected' : '' }}>Belum</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="jumlah_kursi">Jumlah Kursi</label>
                            <input type="number" id="jumlah_kursi" name="jumlah_kursi" class="form-control" placeholder="Jumlah Kursi" value="{{ old('jumlah_kursi', $data->jumlah_kursi) }}">
                        </div>
                        <div class="form-group">
                            <label for="user_id">Driver</label>
                            <select name="user_id" class="form-control" id="user_id" required>
                                @foreach($drivers as $driver)
                                    <option value="{{ $driver->id }}" {{ $data->user_id == $driver->id ? 'selected' : '' }}>{{ $driver->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="rute_id">Rute</label>
                            <select name="rute_id" class="form-control" id="rute_id" required>
                                @foreach($rutes as $rute)
                                    <option value="{{ $rute->id }}" {{ $data->rute_id == $rute->id ? 'selected' : '' }}>{{ $rute->nama_rute }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-info">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
