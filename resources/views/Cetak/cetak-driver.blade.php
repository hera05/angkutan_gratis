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
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Nama Driver</th>
                    <th>Datang</th>
                    <th>Selesai</th>
                    <th>Izin</th>
                    <th>Izin Alasan</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($dtCetakDriver as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->datang_time }}</td>
                        <td>{{ $item->selesai_time }}</td>
                        <td>{{ $item->izin_time }}</td>
                        <td>{{ $item->izin_alasan }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <script type="text/javascript">
        window.print();
    </script>
</body>
</html>
