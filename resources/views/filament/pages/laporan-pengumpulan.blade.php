<x-filament::page>
    <div class="space-y-6">

        {{-- Rekapitulasi Pengumpulan --}}
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            <x-filament::card>
                <div class="text-gray-500 text-sm">Total Muzakki</div>
                <div class="text-2xl font-bold">{{ $totalMuzakki }}</div>
            </x-filament::card>

            <x-filament::card>
                <div class="text-gray-500 text-sm">Total Jiwa</div>
                <div class="text-2xl font-bold">{{ $totalJiwa }}</div>
            </x-filament::card>

            <x-filament::card>
                <div class="text-gray-500 text-sm">Total Beras (kg)</div>
                <div class="text-2xl font-bold">{{ number_format($totalBeras, 2) }}</div>
            </x-filament::card>

            <x-filament::card>
                <div class="text-gray-500 text-sm">Total Uang (Rp)</div>
                <div class="text-2xl font-bold">Rp {{ number_format($totalUang, 0, ',', '.') }}</div>
            </x-filament::card>

            <x-filament::card>
                <div class="text-gray-500 text-sm">Dikonversi ke Beras (kg)</div>
                <div class="text-2xl font-bold">{{ number_format($berasFromUang, 2) }}</div>
            </x-filament::card>

            <x-filament::card>
                <div class="text-gray-500 text-sm">Total Keseluruhan (Beras)</div>
                <div class="text-2xl font-bold">{{ number_format($totalKeseluruhanBeras, 2) }} kg</div>
            </x-filament::card>

            <x-filament::card>
                <div class="text-gray-500 text-sm">Sudah Didistribusikan (kg)</div>
                <div class="text-2xl font-bold">{{ number_format($totalDistribusiBeras, 2) }}</div>
            </x-filament::card>

            <x-filament::card>
                <div class="text-gray-500 text-sm">Sisa Beras (kg)</div>
                <div class="text-2xl font-bold">{{ number_format($sisaBeras, 2) }}</div>
            </x-filament::card>

            <x-filament::card>
                <div class="text-gray-500 text-sm">Harga Beras Rata-rata (Rp/kg)</div>
                <div class="text-2xl font-bold">Rp {{ number_format($hargaBerasRataRata, 0, ',', '.') }}</div>
            </x-filament::card>
        </div>

        {{-- Tabel Detail Pengumpulan --}}
        <x-filament::card>
            <x-slot name="header">
                <h2 class="text-lg font-bold">Detail Pengumpulan Zakat</h2>
            </x-slot>

            <div class="overflow-x-auto">
                <table class="min-w-full text-sm text-left text-gray-700">
                    <thead class="bg-gray-100 text-xs uppercase text-gray-600">
                        <tr>
                            <th class="px-4 py-2">Nama KK</th>
                            <th class="px-4 py-2">Jumlah Tanggungan</th>
                            <th class="px-4 py-2">Jenis Bayar</th>
                            <th class="px-4 py-2">Beras (kg)</th>
                            <th class="px-4 py-2">Uang (Rp)</th>
                            <th class="px-4 py-2">Tanggal</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($pengumpulanZakat as $zakat)
                            <tr class="border-b">
                                <td class="px-4 py-2">{{ $zakat->nama_kk }}</td>
                                <td class="px-4 py-2">{{ $zakat->jumlah_tanggungan_bayar }}</td>
                                <td class="px-4 py-2 capitalize">{{ $zakat->jenis_bayar }}</td>
                                <td class="px-4 py-2">{{ number_format($zakat->bayar_beras, 2) }}</td>
                                <td class="px-4 py-2">Rp {{ number_format($zakat->bayar_uang, 0, ',', '.') }}</td>
                                <td class="px-4 py-2">{{ $zakat->created_at->format('d M Y') }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </x-filament::card>
    </div>
</x-filament::page>
