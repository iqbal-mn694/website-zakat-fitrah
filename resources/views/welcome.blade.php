<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sistem Informasi Zakat Fitrah</title>
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
                        <a href="{{ route('welcome') }}" class="nav-link active">Beranda</a>
                        <a href="{{ route('muzakki.index') }}" class="nav-link">Muzakki</a>
                        <a href="{{ route('mustahik.index') }}" class="nav-link">Mustahik</a>
                        <a href="{{ route('distribusi-zakat.index') }}" class="nav-link">Distribusi Zakat</a>
                        <div class="relative" x-data="{ open: false }">
                            <button @click="open = !open" @click.away="open = false" class="nav-link inline-flex items-center">
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
                                    <a href="{{ route('laporan.pengumpulan') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-emerald-50 hover:text-emerald-600">Laporan Pengumpulan</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Login Button -->
                    <div class="flex items-center ml-8">
            @if (Route::has('login'))
                    @auth
                    @else
                                <a href="{{ route('login') }}" class="text-gray-700 hover:text-emerald-600 px-3 py-2">Log in</a>
                            @endauth
                        @endif
                    </div>
                </div>
            </div>
        </div>
                </nav>

    <!-- Hero Section -->
    <div class="relative min-h-[60vh] flex items-center justify-center bg-gradient-to-br from-emerald-500 to-emerald-300">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-32">
            <div class="text-center">
                <h1 class="text-5xl font-extrabold tracking-tight text-white sm:text-6xl md:text-7xl drop-shadow-lg">
                    <span class="block">Sistem Informasi</span>
                    <span class="block text-emerald-200 mt-2">Zakat Fitrah</span>
                </h1>
                <p class="mt-6 max-w-lg mx-auto text-xl text-emerald-100 sm:max-w-3xl drop-shadow">
                    Memudahkan pengelolaan dan pendistribusian zakat fitrah untuk kemaslahatan umat
                </p>
            </div>
        </div>
    </div>

    <!-- Pengertian Section -->
    <div class="py-12 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center">
                <h2 class="text-3xl font-extrabold text-gray-900 sm:text-4xl">Pengertian Zakat Fitrah</h2>
                <p class="mt-4 text-lg text-gray-500">Memahami makna dan keutamaan zakat fitrah dalam Islam</p>
            </div>
            <div class="mt-20 grid grid-cols-1 gap-8 sm:grid-cols-2 lg:grid-cols-3">
                <!-- Pengertian -->
                <div class="pt-6 transition-transform duration-300 transform hover:-translate-y-1 hover:shadow-2xl hover:border-emerald-500 border border-gray-200 bg-white rounded-lg px-6 pb-8 h-full">
                    <div class="-mt-6">
                        <div>
                            <span class="inline-flex items-center justify-center p-3 bg-emerald-500 rounded-md shadow-lg transform -translate-y-1/2 hover:rotate-6 transition-transform duration-300">
                                <svg class="h-6 w-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"/>
                                </svg>
                            </span>
                        </div>
                        <h3 class="mt-4 text-lg font-medium text-gray-900 tracking-tight group-hover:text-emerald-600">Definisi</h3>
                        <p class="mt-5 text-base text-gray-500">Zakat fitrah adalah zakat yang wajib dikeluarkan oleh setiap muslim di bulan Ramadhan sebelum menunaikan shalat Idul Fitri. Zakat ini berfungsi untuk menyucikan jiwa orang yang berpuasa.</p>
                    </div>
                </div>
                <!-- Hukum -->
                <div class="pt-6 transition-transform duration-300 transform hover:-translate-y-1 hover:shadow-2xl hover:border-emerald-500 border border-gray-200 bg-white rounded-lg px-6 pb-8 h-full">
                    <div class="-mt-6">
                        <div>
                            <span class="inline-flex items-center justify-center p-3 bg-emerald-500 rounded-md shadow-lg transform -translate-y-1/2 hover:rotate-6 transition-transform duration-300">
                                <svg class="h-6 w-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 6l3 1m0 0l-3 9a5.002 5.002 0 006.001 0M6 7l3 9M6 7l6-2m6 2l3-1m-3 1l-3 9a5.002 5.002 0 006.001 0M18 7l3 9m-3-9l-6-2m0-2v2m0 16V5m0 16H9m3 0h3"/>
                                    </svg>
                            </span>
                        </div>
                        <h3 class="mt-4 text-lg font-medium text-gray-900 tracking-tight group-hover:text-emerald-600">Hukum & Ketentuan</h3>
                        <p class="mt-5 text-base text-gray-500">Hukumnya wajib bagi setiap muslim yang mampu. Besarannya adalah 2,5 kg beras atau makanan pokok yang biasa dikonsumsi, atau dapat diganti dengan uang senilai beras tersebut.</p>
                    </div>
                </div>
                <!-- Manfaat -->
                <div class="pt-6 transition-transform duration-300 transform hover:-translate-y-1 hover:shadow-2xl hover:border-emerald-500 border border-gray-200 bg-white rounded-lg px-6 pb-8 h-full">
                    <div class="-mt-6">
                        <div>
                            <span class="inline-flex items-center justify-center p-3 bg-emerald-500 rounded-md shadow-lg transform -translate-y-1/2 hover:rotate-6 transition-transform duration-300">
                                <svg class="h-6 w-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14.828 14.828a4 4 0 01-5.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                    </svg>
                            </span>
                        </div>
                        <h3 class="mt-4 text-lg font-medium text-gray-900 tracking-tight group-hover:text-emerald-600">Manfaat & Hikmah</h3>
                        <p class="mt-5 text-base text-gray-500">Membersihkan puasa dari perbuatan sia-sia, mencukupi kebutuhan fakir miskin di hari raya, dan menumbuhkan rasa syukur kepada Allah SWT.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Waktu & Penerima Section -->
    <div class="bg-gradient-to-br from-emerald-100 to-emerald-50 py-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="lg:text-center">
                <h2 class="text-3xl font-extrabold text-gray-900">Waktu & Penerima Zakat Fitrah</h2>
                <p class="mt-4 max-w-2xl text-xl text-gray-500 lg:mx-auto">Ketentuan waktu pembayaran dan golongan penerima zakat fitrah</p>
            </div>
            <div class="mt-16 grid md:grid-cols-2 gap-8">
                <div class="bg-white p-6 rounded-lg shadow-sm border border-gray-200 hover:border-emerald-500 hover:shadow-xl transition-all duration-300 transform hover:-translate-y-1">
                    <div class="flex items-center justify-center mb-4">
                        <span class="inline-flex items-center justify-center p-3 bg-emerald-500 rounded-md shadow-lg hover:rotate-6 transition-transform duration-300">
                            <svg class="h-6 w-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                        </span>
                    </div>
                    <h3 class="text-lg font-medium text-gray-900 text-center mb-4 group-hover:text-emerald-600">Waktu Pembayaran</h3>
                    <p class="mt-2 text-base text-gray-500">Dapat dibayarkan sejak awal Ramadhan, namun lebih utama pada malam Idul Fitri dan paling lambat sebelum pelaksanaan shalat Idul Fitri.</p>
                </div>
                <div class="bg-white p-6 rounded-lg shadow-sm border border-gray-200 hover:border-emerald-500 hover:shadow-xl transition-all duration-300 transform hover:-translate-y-1">
                    <div class="flex items-center justify-center mb-4">
                        <span class="inline-flex items-center justify-center p-3 bg-emerald-500 rounded-md shadow-lg hover:rotate-6 transition-transform duration-300">
                            <svg class="h-6 w-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/>
                    </svg>
                        </span>
                    </div>
                    <h3 class="text-lg font-medium text-gray-900 text-center mb-4 group-hover:text-emerald-600">Penerima Zakat</h3>
                    <p class="mt-2 text-base text-gray-500">Delapan golongan (asnaf) yang berhak: fakir, miskin, amil, muallaf, riqab, gharim, fisabilillah, dan ibnu sabil.</p>
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
