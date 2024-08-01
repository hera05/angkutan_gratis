<!DOCTYPE html>
<html>
<head>
    <title>Cetak Rekap Driver</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
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
        .center {
            text-align: center;
        }
    </style>
</head>
<body>
    <h2 class="center">Cetak Rekap Driver</h2>
    <p class="center">Periode: {{ \Carbon\Carbon::parse($start_date)->format('d-m-Y') }} s/d {{ \Carbon\Carbon::parse($end_date)->format('d-m-Y') }}</p>
    <table>
        <thead>
            <tr>
                <th>No.</th>
                <th>Tanggal</th>
                <th>Nama Driver</th>
                <th>Datang</th>
                <th>Selesai</th>
                <th>Izin</th>
                <th>Izin Alasan</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            @foreach($dtCetakDriver as $item)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ \Carbon\Carbon::parse($item->created_at)->format('d-m-Y') }}</td>
                <td>{{ $item->name }}</td>
                <td>{{ \Carbon\Carbon::parse($item->datang_time)->format('H:i') }}</td>
                <td>{{ \Carbon\Carbon::parse($item->selesai_time)->format('H:i') }}</td>
                <td>{{ ($item->izin_time) }}</td>
                <td>{{ $item->izin_alasan }}</td>
                <td>{{ $item->status }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <script>
        window.print();
    </script>
</body>
</html>
