<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cetak Rekap Angkutan</title>
    <link rel="stylesheet" href="{{asset('template')}}/cetak/css/style.css">
    <style>
        .header {
            display: flex;
            align-items: center;
            justify-content: flex-start;
        }

        .header img {
            margin-right: 20px; /* Memberikan jarak antara logo dan teks */
        }

        .header h1 {
            margin: 0;
            font-size: 24px;
        }

        .header p {
            margin: 5px 0 0 0;
            font-size: 14px;
        }
    </style>
</head>
<body>
    <div class="header">
        <img src="{{ asset('template') }}/assets/images/logo-dinas-perhubungan.png" width="50" alt="Logo" class="dark-logo" />
        <div>
        <h1>DINAS PERHUBUNGAN KABUPATEN BANYUWANGI</h1>
        <p>Jl. K.H. Agus Salim No.83, Taman Baru, Kec. Banyuwangi, Kabupaten Banyuwangi, Jawa Timur 68416</p>
    </div>
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
            @foreach ($pairedData as $data)
            <tr>
                <td>
                    @if ($data['keberangkatan'])
                        <img src="{{ asset('storage/photos/' . $data['keberangkatan']->gambar) }}" alt="keberangkatan" width="100">
                    @endif
                </td>
                <td>
                    @if ($data['kedatangan'])
                        <img src="{{ asset('storage/photos/' . $data['kedatangan']->gambar) }}" alt="kedatangan" width="100">
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
