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
                
                <th>Keberangkatan</th>
                <th>Kedatangan</th>
            </tr>
            
            @foreach ($dtCetakAngkutan as $item)
            <tr>
                
                <td>
                    @if ($item->opsi == 'keberangkatan')
                        <img src="{{ asset('storage/photos/' . $item->gambar) }}" alt="keberangkatan" width="100">
                    @endif
                </td>
                <td>
                    @if ($item->opsi == 'kedatangan')
                        <img src="{{ asset('storage/photos/' . $item->gambar) }}" alt="kedatangan" width="100">
                    @endif
                </td>
            </tr>
            @endforeach
            
        </table>
    </div>
    <script type="text/javascript">
        window.print();
    </script>
</body>
</html>
