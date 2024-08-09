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
            <th>Nama Penumpang</th>
            <th>Alamat Penumpang</th>
            <th>Jenis Penumpang</th>
        </tr>
        @foreach ($dtCetakPenumpang as $item)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $item->created_at->format('d-m-Y') }}</td>
            <td>{{ $item->nama_penumpang }}</td>
            <td>{{ $item->alamat_penumpang }}</td>
            <td>{{ $item->jenis_penumpang }}</td>
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
