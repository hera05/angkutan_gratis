<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cetak Rekap Angkutan</title>
    <link rel="stylesheet" href="{{asset('template')}}/cetak/css/style.css">
</head>
<body>
    <div class="header">
        <h1>DINAS PERHUBUNGAN KABUPATEN BANYUWANGI</h1>
        <p>Jl. K.H. Agus Salim No.83, Taman Baru, Kec. Banyuwangi, Kabupaten Banyuwangi, Jawa Timur 68416</p>
    </div>
    <div class="content">
        <p>Sesi: Sesi 1</p>
        <p>Tanggal: 24 JANUARI 2024</p>
        <p class="center">Rute: TERMINAL BRAWIJAYA - TERMINAL SASAK PEROT</p>
        <table>
            <tr>
                <th>No.</th>
                <th>Tanggal</th>
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
            @foreach ($dtCetakAngkutan as $item)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $item->created_at }}</td>
                <td>{{ $item->plat_nomor }}</td>
                <td>{{ $item->nama_driver }}</td>
                <td>{{ $item->nama_rute }}</td>
                <td>{{ $item->opsi }}</td>
                <td>{{ $item->sesi }}</td>
                <td>{{ $item->jumlah_penumpang }}</td>
                <td><img src="{{ asset('storage/' . $item->gambar) }}" alt="gambar" width="100"></td>
               
            </tr>
            @endforeach
        </table>
    </div>
    <script type="text/javascript">
        window.print();
    </script>
</body>
</html>
