<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cetak Rekap Absensi Driver</title>
    <link rel="stylesheet" href="{{asset('template')}}/cetak/css/style.css">
</head>
<body>
    <div class="header">
        <h1>DINAS PERHUBUNGAN KABUPATEN BANYUWANGI</h1>
        <p>Jl. K.H. Agus Salim No.83, Taman Baru, Kec. Banyuwangi, Kabupaten Banyuwangi, Jawa Timur 68416</p>
    </div>
    <div class="content">
        <p>
            Tanggal: 
            @if(isset($tanggal) && $tanggal)
                {{ \Carbon\Carbon::parse($tanggal)->format('d F Y') }}
            @elseif(isset($bulan) && $bulan && isset($tahun) && $tahun)
                {{ \Carbon\Carbon::createFromDate($tahun, $bulan, 1)->format('F Y') }}
            @elseif(isset($tahun) && $tahun)
                {{ $tahun }}
            @else
                Semua Tanggal
            @endif
        </p>
        <table>
            
                <tr>
                    <th>No.</th>
                    <th>Nama Penumpang</th>
                    <th>Alamat Penumpang</th>
                    <th>Jenis Penumpang</th>
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
                @foreach ($dtCetakPenumpang as $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->nama_penumpang }}</td>
                    <td>{{ $item->alamat_penumpang }}</td>
                    <td>{{ $item->jenis_penumpang }}</td>
                </tr>
                @endforeach
        </table>
    </div>
    <script type="text/javascript">
        window.print();
    </script>
</body>
</html>
