@extends('layout.v_template')
@section('title', 'Data Akun')
    
@section('content')
<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Data Akun</h1>
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
                    <a href="/create-akun" class="btn btn-info">Tambah<i class="fas fa-plus-square"></i></a>
                </div>
            </div>
            <div class="card-body">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>Alamat</th>
                            <th>No Telepon</th>
                            <th>Role</th>
                            <th>Foto</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($users as $item)
                        <tr>
                            <td>{{$item->name}}</td>
                            <td>{{$item->email}}</td>
                            <td>{{$item->alamat}}</td>
                            <td>{{$item->tlp}}</td>
                            <td>{{$item->role}}</td>
                            <td>{{$item->foto}}</td>
                        </tr>
                        @endforeach
                    </tbody>
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
@section
{{-- <script>
    $.ajaxSetup({
        headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $("#table-1").dataTable({
        processing: true,
        serverSide: true,
        ajax: {
            type: 'GET',
            url: "{{ route('user.list') }}",
        },
        columns: [
            { data: 'nama', name: 'nama' },
            { data: 'username', name: 'username' },
            { data: 'tlp', name: 'tlp' },
            { data: 'alamat', name: 'alamat' },
            { data: 'rt', name: 'rt' },
            { data: 'rw', name: 'rw' },
            { data: '', orderable: false },
        ],
        order: [[0, 'desc']],
        columnDefs: [
        {
          targets: -1,
          orderable: false,
          render: (data, type, full, meta) => {
            return `<div class="btn-group">
                <a class="btn dropdown-toggle hide-arrow" data-toggle="dropdown">Aksi</a>
                <div class="dropdown-menu dropdown-menu-right">
                    <a href="javascript:;" class="dropdown-item" data-toggle="modal" data-target="#edit" onclick="edit(this, ${full.id})">Edit</a>
                    ${full.deletable
                        ? `<a href="javascript:;" class="dropdown-item delete-record" onclick="hapus(${full.id})">Hapus</a>`
                        : ''
                    }
                </div>
            </div>`
          }
        }
      ],
    });

    const edit = (this_el, id_user) => {
        let url = `{{ route('user.update', ':id') }}`.replace(':id', id_user),
            tr_el = this_el.closest('tr'),
            row = $("#table-1").DataTable().row(tr_el),
            row_data = row.data();

        $('#nama').val(row_data.nama);
        $('#username_edit').val(row_data.username);
        $('#tlp').val(row_data.tlp);
        $('#alamat').val(row_data.alamat);
        $('#rt').val(row_data.rt);
        $('#rw').val(row_data.rw);
        $('#form_edit').attr('action', url);
    }

    const hapus = id => {
        swal({
            title             : "Apakah Anda Yakin ?",
            text              : "Data Yang Sudah Dihapus Tidak Bisa Dikembalikan!",
            type              : "warning",
            showCancelButton  : true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor : "#d33",
            confirmButtonText : "Ya, Tetap Hapus!"
        }).then((result) => {
            $.ajax({
                url    : `{{ route('user.destroy', ':id') }}`.replace(':id', id),
                type   : "delete",
                success: function(data) {
                    $('#table-1').DataTable().ajax.reload();
                    swal({
                        type: 'success',
                        title: 'Data Pelanggan berhasil dihapus.',
                        showConfirmButton: true,
                        confirmButtonClass: 'btn btn-success',
                    });
                }
            })
        }).catch((failed) => {
            console.error(failed)
        })
    }

</script> --}}
@endsection