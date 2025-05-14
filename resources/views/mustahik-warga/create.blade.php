<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Tambah Mustahik Warga') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form method="POST" action="{{ route('mustahik-warga.store') }}">
                        @csrf

                        <div class="mb-4">
                            <label for="nama_mustahik" class="block text-sm font-medium text-gray-700">Nama Mustahik</label>
                            <input type="text" name="nama_mustahik" id="nama_mustahik" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500" required>
                        </div>

                        <div class="mb-4">
                            <label for="kategori" class="block text-sm font-medium text-gray-700">Kategori</label>
                            <input type="text" name="kategori" id="kategori" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500" required>
                        </div>

                        <div class="mb-4">
                            <label for="hak" class="block text-sm font-medium text-gray-700">Hak</label>
                            <input type="number" name="hak" id="hak" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500" required>
                        </div>

                        <div class="mb-4">
                            <label for="id_aturan_zakat" class="block text-sm font-medium text-gray-700">Aturan Zakat</label>
                            <select name="id_aturan_zakat" id="id_aturan_zakat" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500" required>
                                <option value="">Pilih Aturan Zakat</option>
                                @foreach($aturanZakat as $aturan)
                                    <option value="{{ $aturan->id_aturan_zakat }}">{{ $aturan->nama_aturan }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="flex items-center justify-end mt-4">
                            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                                Simpan
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout> 