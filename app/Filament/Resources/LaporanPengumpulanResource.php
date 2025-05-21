<?php

namespace App\Filament\Resources;

use App\Filament\Resources\LaporanPengumpulanResource\Pages;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Forms;
use App\Models\BayarZakat;
use Illuminate\Support\Facades\DB;

class LaporanPengumpulanResource extends Resource
{
    protected static ?string $model = BayarZakat::class;

    // protected static ?string $navigationIcon = 'heroicon-o-collection';

    protected static ?string $navigationLabel = 'Laporan Pengumpulan';

    protected static ?int $navigationSort = 3;  // Untuk menambah urutan di sidebar admin

    public static function table(Tables\Table $table): Tables\Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('nama_kk')
                    ->label('Nama KK'),
                Tables\Columns\TextColumn::make('jumlah_tanggungan_bayar')
                    ->label('Jumlah Tanggungan'),
                Tables\Columns\TextColumn::make('jenis_bayar')
                    ->label('Jenis Pembayaran'),
                Tables\Columns\TextColumn::make('created_at')
                    ->label('Tanggal Pembayaran')
                    ->dateTime(),
                // Kolom lainnya bisa ditambahkan sesuai kebutuhan
            ]);
    }

    public static function form(Forms\Form $form): Forms\Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('nama_kk')
                    ->label('Nama KK')
                    ->required(),
                Forms\Components\TextInput::make('jumlah_tanggungan_bayar')
                    ->label('Jumlah Tanggungan')
                    ->numeric()
                    ->required(),
                Forms\Components\TextInput::make('jenis_bayar')
                    ->label('Jenis Pembayaran')
                    ->required(),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListLaporanPengumpulan::route('/'),
            // 'create' => Pages\CreateLaporanPengumpulan::route('/create'),
            // 'edit' => Pages\EditLaporanPengumpulan::route('/{record}/edit'),
        ];
    }
}
