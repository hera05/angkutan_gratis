<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Cetak</title>
    <link rel="stylesheet" href="{{ asset('css/cetak.css') }}">
</head>
<body>
    <div class="header">
        <h1>DINAS PERHUBUNGAN KABUPATEN BANYUWANGI</h1>
        <p>Jl. K.H. Agus Salim No.83, Taman Baru, Kec. Banyuwangi, Kabupaten Banyuwangi, Jawa Timur 68416</p>
    </div>

    <div class="content">
        <p>Sesi: {{ $jadwal->sesi }}</p>
        <p>Tanggal: {{ \Carbon\Carbon::parse($jadwal->tanggal)->format('d F Y') }}</p>
        <p>Rute: {{ $jadwal->rute }}</p>

        <table>
            <thead>
                <tr>
                    <th>PLAT NOMOR</th>
                    <th>KEBERANGKATAN</th>
                    <th>KEDATANGAN</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($jadwals as $jadwal)
                <tr>
                    <td>{{ $jadwal->plat_nomor }}</td>
                    <td>
                        <img src="{{ asset('images/bus.jpg') }}" alt="Bus">
                        <p>Jumlah Penumpang: {{ $jadwal->jumlah_penumpang_berangkat }}</p>
                    </td>
                    <td>
                        <img src="{{ asset('images/bus.jpg') }}" alt="Bus">
                        <p>Jumlah Penumpang: {{ $jadwal->jumlah_penumpang_datang }}</p>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>
