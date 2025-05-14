<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PengumpulanZakatResource\Pages;
use App\Models\Bayar_Zakat;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class PengumpulanZakatResource extends Resource
{
    protected static ?string $model = Bayar_Zakat::class;

    protected static ?string $navigationIcon = 'heroicon-o-currency-dollar';
    
    protected static ?string $navigationGroup = 'Transaksi';

    protected static ?string $navigationLabel = 'Pengumpulan Zakat Fitrah';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('nama_kk')
                    ->required()
                    ->maxLength(255)
                    ->label('Nama Kepala Keluarga'),
                Forms\Components\TextInput::make('jumlah_tanggungan_keluarga')
                    ->required()
                    ->numeric()
                    ->label('Jumlah Tanggungan Keluarga'),
                Forms\Components\TextInput::make('jumlah_tanggungan_bayar')
                    ->required()
                    ->numeric()
                    ->label('Jumlah Tanggungan yang Dibayar'),
                Forms\Components\Select::make('jenis_bayar')
                    ->required()
                    ->options([
                        'beras' => 'Beras',
                        'uang' => 'Uang',
                    ])
                    ->label('Jenis Pembayaran'),
                Forms\Components\TextInput::make('bayar_beras')
                    ->label('Jumlah Beras (kg)')
                    ->visible(fn (Forms\Get $get) => $get('jenis_bayar') === 'beras')
                    ->required(fn (Forms\Get $get) => $get('jenis_bayar') === 'beras'),
                Forms\Components\TextInput::make('bayar_uang')
                    ->label('Jumlah Uang (Rp)')
                    ->visible(fn (Forms\Get $get) => $get('jenis_bayar') === 'uang')
                    ->required(fn (Forms\Get $get) => $get('jenis_bayar') === 'uang'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('nama_kk')
                    ->searchable()
                    ->sortable()
                    ->label('Nama Kepala Keluarga'),
                Tables\Columns\TextColumn::make('jumlah_tanggungan_keluarga')
                    ->sortable()
                    ->label('Jumlah Tanggungan'),
                Tables\Columns\TextColumn::make('jumlah_tanggungan_bayar')
                    ->sortable()
                    ->label('Jumlah Bayar'),
                Tables\Columns\TextColumn::make('jenis_bayar')
                    ->sortable()
                    ->label('Jenis Pembayaran'),
                Tables\Columns\TextColumn::make('bayar_beras')
                    ->label('Beras (kg)')
                    ->visible(fn ($record) => $record && $record->jenis_bayar === 'beras'),
                Tables\Columns\TextColumn::make('bayar_uang')
                    ->label('Uang (Rp)')
                    ->visible(fn ($record) => $record && $record->jenis_bayar === 'uang'),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListPengumpulanZakats::route('/'),
            'create' => Pages\CreatePengumpulanZakat::route('/create'),
            'edit' => Pages\EditPengumpulanZakat::route('/{record}/edit'),
        ];
    }
} 