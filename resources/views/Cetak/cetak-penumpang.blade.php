<!DOCTYPE html>
<html>
<head>
    <title>Rekap Penumpang</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid black;
        }
        th, td {
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <h1>Rekap Presensi Penumpang</h1>
    {{-- <p>Periode: {{ $start_date ? \Carbon\Carbon::parse($start_date)->format('d-m-Y') : 'Tidak ada' }} hingga {{ $end_date ? \Carbon\Carbon::parse($end_date)->format('d-m-Y') : 'Tidak ada' }}</p> --}}
    @if ($dtCetakPenumpang->count() > 0)
    <table>
        <tr>
            <th>No.</th>
            <th>Tanggal</th>
            <th>Nama Driver</th>
            <th>Plat Nomor</th>
            <th>Nama Penumpang</th>
            <th>Titik Jemput</th>
        </tr>
        @foreach ($dtCetakPenumpang as $item)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $item->created_at->format('d-m-Y') }}</td> 
            <td>{{ $item->driver_penumpang->user->name }}</td>
            <td>{{ $item->driver_penumpang->plat_nomor }}</td>
            <td>{{ $item->penumpang->nama_pelajar }}</td>
            <td>{{ $item->penumpang->alamat_pelajar }}</td>
        </tr>
        @endforeach
    </table>
    @else
        <p>Tidak ada data untuk ditampilkan.</p>
    @endif
    <script>
        window.print();
    </script>
</body>
</html>
