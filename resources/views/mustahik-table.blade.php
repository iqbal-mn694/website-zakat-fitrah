<table class="min-w-full divide-y divide-gray-200">
    <thead>
        <tr>
            <th class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">No</th>
            <th class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nama</th>
            <th class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Kategori</th>
            <th class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Hak</th>
        </tr>
    </thead>
    <tbody class="bg-white divide-y divide-gray-200">
        @forelse($mustahikWarga as $index => $mustahik)
        <tr>
            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                {{ $index + 1 }}
            </td>
            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                {{ $mustahik->nama_mustahik }}
            </td>
            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                {{ $mustahik->kategori }}
            </td>
            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                {{ $mustahik->hak }}
            </td>
        </tr>
        @empty
        <tr>
            <td colspan="4" class="px-6 py-4 text-center text-gray-500">
                Tidak ada data mustahik yang ditemukan.
            </td>
        </tr>
        @endforelse
    </tbody>
</table>
@if($mustahikWarga->hasPages())
<div class="mt-4">
    {{ $mustahikWarga->links() }}
</div>
@endif 