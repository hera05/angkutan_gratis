@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">Daftar User</div>
                
                <div class="card-body">
                    <form method="POST"  action="{{ url('store-user') }}" enctype="multipart/form-data">
                    {{ csrf_field() }}
                        <div class="form-group">
                            <label for="exampleInputEmail1">Nama</label>
                            <input type="text" class="form-control" id="exampleInputEmail1" name="name" aria-describedby="emailHelp">
                            
                        </div>
                        <div class="form-group mt-2">
                            <label for="exampleInputEmail1">Email</label>
                            <input type="email" class="form-control" id="exampleInputEmail1" name="email" aria-describedby="emailHelp">
                            
                        </div>
                        <div class="form-group mt-2">
                            <label for="exampleInputPassword1">Password</label>
                            <input type="password" class="form-control" id="exampleInputPassword1" name="password" placeholder="Password">
                        </div>

                        <div class="form-group">
                            <label for="exampleInputAlamat1">Alamat</label>
                            <input type="text" class="form-control" id="exampleInputAlamat1" name="alamat" aria-describedby="alamatHelp">
                            
                        </div>
                        <div class="form-group mt-2">
                            <label for="exampleInputTlpn1">No Telepon</label>
                            <input type="text" class="form-control" id="exampleInputTlpn1" name="telepon" aria-describedby="teleponHelp">
                            
                        </div>
                        <div class="form-group mt-2">
                            <label for="exampleInputFoto1">Foto</label>
                            <input type="file" class="form-control" id="exampleInputFoto1" name="foto" aria-describedby="fotoHelp">
                            
                        </div>
                       
                        <button type="submit" class="btn btn-primary mt-3">Submit</button>
                    </form>
                </div>
            </div>
        </div>
       
        
    </div>
</div>
<script type="text/javascript" class="init">
	

$(document).ready(function () {
	var table = $('#example').DataTable( {
        rowReorder: {
            selector: 'td:nth-child(2)'
        },
        responsive: true
    } );
});

</script>

@endsection



