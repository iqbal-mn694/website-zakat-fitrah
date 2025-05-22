<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Laporan Distribusi Zakat</title>
    <style>
        body {
            font-family: 'DejaVu Sans', sans-serif;
            font-size: 12px;
            color: #333;
        }
        h1, h2 {
            text-align: center;
            margin-bottom: 10px;
        }
        h2 {
            background-color: #f0f0f0;
            padding: 6px;
            border-radius: 4px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
            margin-bottom: 20px;
        }
        th, td {
            border: 1px solid #999;
            padding: 6px 8px;
            text-align: left;
        }
        th {
            background-color: #f7f7f7;
            font-weight: bold;
        }
        tr:nth-child(even) {
            background-color: #fcfcfc;
        }
        .total {
            text-align: right;
            font-weight: bold;
            font-size: 14px;
            margin-top: 20px;
        }
        .footer {
            margin-top: 40px;
            text-align: center;
            font-size: 11px;
            color: #888;
        }
    </style>
</head>
<body>

    <h1>Laporan Distribusi Zakat Fitrah</h1>

    <h2>Tabel A - Mustahik Warga</h2>
    <table>
        <thead>
            <tr>
                <th>Kategori</th>
                <th>Daerah</th>
                <th>Hak per Jiwa</th>
                <th>Jumlah KK</th>
                <th>Total Beras (Kg)</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($rekapWarga as $row)
                <tr>
                    <td>{{ $row->kategori }}</td>
                    <td>{{ $row->daerah }}</td>
                    <td>{{ number_format($row->hak, 2) }}</td>
                    <td>{{ $row->jumlah_kk }}</td>
                    <td>{{ number_format($row->total_beras, 2) }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <h2>Tabel B - Mustahik Lainnya</h2>
    <table>
        <thead>
            <tr>
                <th>Kategori</th>
                <th>Daerah</th>
                <th>Hak per Jiwa</th>
                <th>Jumlah KK</th>
                <th>Total Beras (Kg)</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($rekapLainnya as $row)
                <tr>
                    <td>{{ $row->kategori }}</td>
                    <td>{{ $row->daerah }}</td>
                    <td>{{ number_format($row->hak, 2) }}</td>
                    <td>{{ $row->jumlah_kk }}</td>
                    <td>{{ number_format($row->total_beras, 2) }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <p class="total">Total Distribusi Beras: {{ number_format($totalDistribusiBeras, 2) }} Kg</p>

    <div class="footer">
        Dicetak pada {{ now()->format('d M Y H:i') }}
    </div>

</body>
</html>
