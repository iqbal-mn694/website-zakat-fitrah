<?php

namespace App\Filament\Resources;

use App\Filament\Resources\KategoriMustahikResource\Pages;
use App\Filament\Resources\KategoriMustahikResource\RelationManagers;
use App\Models\KategoriMustahik;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class KategoriMustahikResource extends Resource
{
    protected static ?string $model = KategoriMustahik::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    
    protected static ?string $navigationGroup = 'Master Data';

    protected static ?string $navigationLabel = 'Kategori Mustahik';
    
    protected static ?int $navigationSort = 1;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('nama_kategori')
                    ->required()
                    ->maxLength(255)
                    ->label('Nama Kategori'),
                Forms\Components\TextInput::make('jumlah_hak')
                    ->required()
                    ->numeric()
                    ->label('Jumlah Hak'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('nama_kategori')
                    ->searchable()
                    ->sortable()
                    ->label('Nama Kategori'),
                Tables\Columns\TextColumn::make('jumlah_hak')
                    ->numeric()
                    ->sortable()
                    ->label('Jumlah Hak'),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
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

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListKategoriMustahiks::route('/'),
            'create' => Pages\CreateKategoriMustahik::route('/create'),
            'edit' => Pages\EditKategoriMustahik::route('/{record}/edit'),
        ];
    }
}
