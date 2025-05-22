<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Laporan Pengumpulan - Sistem Informasi Zakat Fitrah</title>
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <!-- Add Alpine.js for dropdown functionality -->
    <script src="//unpkg.com/alpinejs" defer></script>
</head>
<body class="antialiased bg-gray-50 font-sans">
    <!-- Navbar -->
    <nav class="fixed w-full z-50 bg-white shadow-sm">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex h-16 items-center justify-between">
                <!-- Logo -->
                <div class="flex items-center space-x-2">
                    <svg class="h-8 w-8 text-emerald-600 transform transition-transform duration-300 hover:rotate-90" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 3v18m9-9H3m16.24-6.24a9 9 0 11-12.48 0" />
                    </svg>
                    <a href="{{ route('welcome') }}" class="text-2xl font-bold text-emerald-600 hover:text-emerald-700 tracking-wide transition-colors duration-300">SIZAKAT</a>
                </div>
                <!-- Navigation Links -->
                <div class="hidden sm:flex sm:items-center sm:justify-end sm:flex-1 sm:pl-8">
                    <div class="flex space-x-8">
                        <a href="{{ route('welcome') }}" class="nav-link">Beranda</a>
                        <a href="{{ route('muzakki.index') }}" class="nav-link">Muzakki</a>
                        <a href="{{ route('mustahik.index') }}" class="nav-link">Mustahik</a>
                        <a href="{{ route('distribusi-zakat.index') }}" class="nav-link">Distribusi Zakat</a>
                        <div class="relative" x-data="{ open: false }">
                            <button @click="open = !open" @click.away="open = false" class="nav-link inline-flex items-center active">
                                <span>Laporan</span>
                                <svg class="ml-2 h-5 w-5 transform transition-transform duration-200" :class="{'rotate-180': open}" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </button>
                            <div x-show="open" 
                                 x-transition:enter="transition ease-out duration-100"
                                 x-transition:enter-start="transform opacity-0 scale-95"
                                 x-transition:enter-end="transform opacity-100 scale-100"
                                 x-transition:leave="transition ease-in duration-75"
                                 x-transition:leave-start="transform opacity-100 scale-100"
                                 x-transition:leave-end="transform opacity-0 scale-95"
                                 class="absolute right-0 mt-2 w-48 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5 z-50">
                                <div class="py-1">
                                    <a href="{{ route('laporan.distribusi') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-emerald-50 hover:text-emerald-600">Laporan Distribusi</a>
                                    <a href="{{ route('laporan.pengumpulan') }}" class="block px-4 py-2 text-sm text-emerald-600 bg-emerald-50">Laporan Pengumpulan</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Login Button -->
                    <div class="flex items-center ml-8">
                        @if (Route::has('login'))
                            @auth
                            @else
                                <a href="{{ url('/admin/login') }}" class="text-gray-700 hover:text-emerald-600 px-3 py-2">Log in</a>
                            @endauth
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </nav>

    <!-- Add margin-top to account for fixed navbar -->
    <div class="pt-16">
        <!-- Header Section -->
        <div class="bg-gradient-to-br from-emerald-500 to-emerald-300 py-16">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="text-center">
                    <h2 class="text-3xl font-extrabold text-white sm:text-4xl drop-shadow-lg">Laporan Pengumpulan Zakat Fitrah</h2>
                    <p class="mt-4 text-lg text-emerald-100 drop-shadow">Rekapitulasi pengumpulan zakat fitrah dari muzakki</p>
                </div>
            </div>
        </div>

        <!-- Content Section -->
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <h2 class="text-2xl font-bold text-gray-800 mb-6">Laporan Pengumpulan Zakat Fitrah</h2>

                <!-- Summary Cards -->
                <div class="grid grid-cols-2 md:grid-cols-4 gap-4 mb-6">
                    <!-- Total Muzakki -->
                    <div class="bg-white overflow-hidden shadow rounded-lg">
                        <div class="p-5">
                            <h3 class="text-sm font-medium text-gray-500">Total Muzakki</h3>
                            <p class="mt-1 text-2xl font-semibold text-emerald-600">{{ $totalMuzakki }}</p>
                        </div>
                    </div>

                    <!-- Total Jiwa -->
                    <div class="bg-white overflow-hidden shadow rounded-lg">
                        <div class="p-5">
                            <h3 class="text-sm font-medium text-gray-500">Total Jiwa</h3>
                            <p class="mt-1 text-2xl font-semibold text-emerald-600">{{ $totalJiwa }}</p>
                        </div>
                    </div>

                    <!-- Total Beras -->
                    <div class="bg-white overflow-hidden shadow rounded-lg">
                        <div class="p-5">
                            <h3 class="text-sm font-medium text-gray-500">Total Beras</h3>
                            <p class="mt-1 text-2xl font-semibold text-emerald-600">{{ number_format($totalBeras, 2) }} Kg</p>
                        </div>
                    </div>

                    <!-- Total Uang -->
                    <div class="bg-white overflow-hidden shadow rounded-lg">
                        <div class="p-5">
                            <h3 class="text-sm font-medium text-gray-500">Total Uang</h3>
                            <p class="mt-1 text-2xl font-semibold text-emerald-600">Rp {{ number_format($totalUang, 0, ',', '.') }}</p>
                        </div>
                    </div>
                </div>

                <!-- Additional Summary Cards -->
                <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-6">
                    <!-- Total Keseluruhan (dalam Beras) -->
                    <div class="bg-white overflow-hidden shadow rounded-lg">
                        <div class="p-5">
                            <h3 class="text-sm font-medium text-gray-500">Total Keseluruhan (dalam Beras)</h3>
                            <p class="mt-1 text-2xl font-semibold text-emerald-600">{{ number_format($totalKeseluruhanBeras, 2) }} Kg</p>
                            <p class="mt-1 text-sm text-gray-500">
                                Termasuk konversi uang ke beras ({{ number_format($berasFromUang, 2) }} Kg)<br>
                                Harga beras rata-rata: Rp {{ number_format($hargaBerasRataRata, 0, ',', '.') }}/Kg
                            </p>
                        </div>
                    </div>

                    <!-- Total Sudah Didistribusikan -->
                    <div class="bg-white overflow-hidden shadow rounded-lg">
                        <div class="p-5">
                            <h3 class="text-sm font-medium text-gray-500">Sudah Didistribusikan</h3>
                            <p class="mt-1 text-2xl font-semibold text-emerald-600">{{ number_format($totalDistribusiBeras, 2) }} Kg</p>
                            <p class="mt-1 text-sm text-gray-500">Total zakat yang telah dibagikan</p>
                        </div>
                    </div>

                    <!-- Sisa Belum Didistribusikan -->
                    <div class="bg-white overflow-hidden shadow rounded-lg">
                        <div class="p-5">
                            <h3 class="text-sm font-medium text-gray-500">Sisa Belum Didistribusikan</h3>
                            <p class="mt-1 text-2xl font-semibold text-emerald-600">{{ number_format($sisaBeras, 2) }} Kg</p>
                            <p class="mt-1 text-sm text-gray-500">Sisa zakat yang belum dibagikan</p>
                        </div>
                    </div>
                </div>

                <!-- Table -->
                <div class="bg-white shadow overflow-hidden sm:rounded-lg">
                    <div class="px-4 py-5 sm:px-6 bg-gray-50">
                        <h3 class="text-lg leading-6 font-medium text-gray-900">Rekapitulasi Pengumpulan Zakat</h3>
                    </div>
                    <div class="border-t border-gray-200">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">No</th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nama KK</th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Jumlah Jiwa</th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Jenis Bayar</th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Jumlah</th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Tanggal</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                @foreach($pengumpulanZakat as $index => $zakat)
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $index + 1 }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $zakat->nama_kk }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $zakat->jumlah_tanggungan_bayar }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $zakat->jenis_bayar }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                        @if($zakat->jenis_bayar == 'beras')
                                            {{ $zakat->bayar_beras }} Kg
                                        @else
                                            Rp {{ number_format($zakat->bayar_uang, 0, ',', '.') }}
                                        @endif
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $zakat->created_at->format('d/m/Y') }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer class="bg-gradient-to-br from-gray-800 to-gray-900">
        <div class="max-w-7xl mx-auto py-12 px-4 sm:px-6 lg:px-8">
            <div class="text-center">
                <p class="text-base text-gray-400">&copy; {{ date('Y') }} Sistem Informasi Zakat Fitrah. All rights reserved.</p>
            </div>
        </div>
    </footer>

    <style>
        .nav-link {
            @apply text-gray-700 hover:text-emerald-600 px-3 py-2 font-medium transition-all duration-300 border-b-2 border-transparent hover:border-emerald-500 relative after:absolute after:bottom-0 after:left-0 after:w-full after:h-0.5 after:bg-emerald-500 after:transform after:scale-x-0 after:origin-left after:transition-transform after:duration-300 hover:after:scale-x-100;
        }
        .nav-link.active {
            @apply text-emerald-600 border-b-2 border-emerald-600 after:scale-x-100;
        }
    </style>
</body>
</html> 