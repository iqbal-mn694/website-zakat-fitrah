<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LaporanController;

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Muzakki Routes
Route::get('/muzakki', [App\Http\Controllers\MuzakkiController::class, 'index'])->name('muzakki.index');
Route::get('/muzakki/search', [App\Http\Controllers\MuzakkiController::class, 'search'])->name('muzakki.search');

// Mustahik Routes
Route::get('/mustahik', [App\Http\Controllers\MustahikController::class, 'index'])->name('mustahik.index');
Route::get('/mustahik/search', [App\Http\Controllers\MustahikController::class, 'search'])->name('mustahik.search');

// Mustahik Warga Routes
Route::get('/mustahik-warga/create', [App\Http\Controllers\MustahikWargaController::class, 'create'])->name('mustahik-warga.create');
Route::post('/mustahik-warga', [App\Http\Controllers\MustahikWargaController::class, 'store'])->name('mustahik-warga.store');

// Mustahik Lainnya Routes
Route::get('/mustahik-lainnya/create', [App\Http\Controllers\MustahikLainnyaController::class, 'create'])->name('mustahik-lainnya.create');
Route::post('/mustahik-lainnya', [App\Http\Controllers\MustahikLainnyaController::class, 'store'])->name('mustahik-lainnya.store');

// Distribusi Zakat Routes
Route::get('/distribusi-zakat', [App\Http\Controllers\DistribusiZakatController::class, 'index'])->name('distribusi-zakat.index');
Route::get('/distribusi-zakat/search', [App\Http\Controllers\DistribusiZakatController::class, 'search'])->name('distribusi-zakat.search');
Route::get('/admin/laporan-distribusi/export-pdf', 
    [\App\Filament\Pages\LaporanDistribusi::class, 'exportViaRoute'])
    ->name('filament.admin.pages.laporan-distribusi.export-pdf');

// Laporan Routes
Route::get('/laporan/distribusi', [LaporanController::class, 'distribusi'])->name('laporan.distribusi');
Route::get('/laporan/pengumpulan', [LaporanController::class, 'pengumpulan'])->name('laporan.pengumpulan');

// Temporary route for checking data
Route::get('/check-data', function() {
    $data = [
        'bayar_zakat' => App\Models\BayarZakat::all(),
        'mustahik_warga' => App\Models\MustahikWarga::all(),
        'mustahik_lainnya' => App\Models\MustahikLainnya::all(),
    ];
    return response()->json($data);
});

require __DIR__.'/auth.php';
