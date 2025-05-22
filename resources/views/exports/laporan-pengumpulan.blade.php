<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Laporan Pengumpulan Zakat</title>
    <style>
        body { font-family: sans-serif; font-size: 12px; }
        h2 { margin-bottom: 10px; }
        table { border-collapse: collapse; width: 100%; margin-bottom: 20px; }
        th, td { border: 1px solid #000; padding: 6px; text-align: left; }
        .summary-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 10px;
            margin-bottom: 20px;
        }
        .summary-card {
            border: 1px solid #000;
            padding: 10px;
            font-size: 14px;
        }
        .summary-card div:first-child {
            color: #666;
            font-size: 12px;
        }
        .summary-card div:last-child {
            font-weight: bold;
            font-size: 16px;
        }
    </style>
</head>
<body>
    <h2>Laporan Rekapitulasi Pengumpulan Zakat</h2>

    <div class="summary-grid">
        <div class="summary-card">
            <div>Total Muzakki</div>
            <div>{{ $totalMuzakki }}</div>
        </div>
        <div class="summary-card">
            <div>Total Jiwa</div>
            <div>{{ $totalJiwa }}</div>
        </div>
        <div class="summary-card">
            <div>Total Beras (kg)</div>
            <div>{{ number_format($totalBeras, 2) }}</div>
        </div>
        <div class="summary-card">
            <div>Total Uang (Rp)</div>
            <div>Rp {{ number_format($totalUang, 0, ',', '.') }}</div>
        </div>
        <div class="summary-card">
            <div>Dikonversi ke Beras (kg)</div>
            <div>{{ number_format($berasFromUang, 2) }}</div>
        </div>
        <div class="summary-card">
            <div>Total Keseluruhan (Beras)</div>
            <div>{{ number_format($totalKeseluruhanBeras, 2) }} kg</div>
        </div>
        <div class="summary-card">
            <div>Sudah Didistribusikan (kg)</div>
            <div>{{ number_format($totalDistribusiBeras, 2) }}</div>
        </div>
        <div class="summary-card">
            <div>Sisa Beras (kg)</div>
            <div>{{ number_format($sisaBeras, 2) }}</div>
        </div>
        <div class="summary-card">
            <div>Harga Beras Rata-rata (Rp/kg)</div>
            <div>Rp {{ number_format($hargaBerasRataRata, 0, ',', '.') }}</div>
        </div>
    </div>

    <h2>Detail Pengumpulan Zakat</h2>
    <table>
        <thead>
            <tr>
                <th>Nama KK</th>
                <th>Jumlah Tanggungan</th>
                <th>Jenis Bayar</th>
                <th>Beras (kg)</th>
                <th>Uang (Rp)</th>
                <th>Tanggal</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($pengumpulanZakat as $zakat)
                <tr>
                    <td>{{ $zakat->nama_kk }}</td>
                    <td>{{ $zakat->jumlah_tanggungan_bayar }}</td>
                    <td>{{ ucfirst($zakat->jenis_bayar) }}</td>
                    <td>{{ number_format($zakat->bayar_beras, 2) }}</td>
                    <td>Rp {{ number_format($zakat->bayar_uang, 0, ',', '.') }}</td>
                    <td>{{ \Carbon\Carbon::parse($zakat->created_at)->format('d M Y') }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>