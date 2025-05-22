<x-filament::page>
    {{-- Tabel A: Mustahik Warga --}}
    <x-filament::section>
        <x-slot name="heading">Tabel A - Mustahik Warga</x-slot>
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200 text-sm text-left text-gray-700">
                <thead class="bg-gray-50 text-xs uppercase text-gray-500">
                    <tr>
                        <th class="px-4 py-2">Kategori</th>
                        <th class="px-4 py-2">Daerah</th>
                        <th class="px-4 py-2">Hak per Jiwa</th>
                        <th class="px-4 py-2">Jumlah KK</th>
                        <th class="px-4 py-2">Total Beras (Kg)</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200 bg-white">
                    @foreach ($rekapWarga as $row)
                        <tr>
                            <td class="px-4 py-2">{{ $row->kategori }}</td>
                            <td class="px-4 py-2">{{ $row->daerah }}</td>
                            <td class="px-4 py-2">{{ $row->hak }}</td>
                            <td class="px-4 py-2">{{ $row->jumlah_kk }}</td>
                            <td class="px-4 py-2">{{ $row->total_beras }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </x-filament::section>

    {{-- Tabel B: Mustahik Lainnya --}}
    <x-filament::section class="mt-8">
        <x-slot name="heading">Tabel B - Mustahik Lainnya</x-slot>
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200 text-sm text-left text-gray-700">
                <thead class="bg-gray-50 text-xs uppercase text-gray-500">
                    <tr>
                        <th class="px-4 py-2">Kategori</th>
                        <th class="px-4 py-2">Daerah</th>
                        <th class="px-4 py-2">Hak per Jiwa</th>
                        <th class="px-4 py-2">Jumlah KK</th>
                        <th class="px-4 py-2">Total Beras (Kg)</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200 bg-white">
                    @foreach ($rekapLainnya as $row)
                        <tr>
                            <td class="px-4 py-2">{{ $row->kategori }}</td>
                            <td class="px-4 py-2">{{ $row->daerah }}</td>
                            <td class="px-4 py-2">{{ $row->hak }}</td>
                            <td class="px-4 py-2">{{ $row->jumlah_kk }}</td>
                            <td class="px-4 py-2">{{ $row->total_beras }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </x-filament::section>

    <a href="{{ route('filament.admin.pages.laporan-distribusi.export-pdf') }}"
       class="px-4 py-2 bg-red-600 text-white rounded hover:bg-red-700">Export PDF</a>

    {{-- Total --}}
    <div class="mt-6 text-right font-semibold text-lg">
        Total Distribusi Beras: {{ $totalDistribusiBeras }} Kg
    </div>



</x-filament::page>


