<?php

namespace App\Filament\Resources;

use App\Filament\Resources\MustahikLainnyaResource\Pages;
use App\Filament\Resources\MustahikLainnyaResource\RelationManagers;
use App\Models\MustahikLainnya;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class MustahikLainnyaResource extends Resource
{
    protected static ?string $model = MustahikLainnya::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    
    protected static ?string $navigationLabel = 'Mustahik Lainnya';
    
    protected static ?string $pluralModelLabel = 'Mustahik Lainnya';
    
    protected static ?string $modelLabel = 'Mustahik Lainnya';
    
    protected static ?int $navigationSort = 2;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('nama_mustahik')
                    ->required()
                    ->maxLength(255)
                    ->label('Nama Mustahik'),
                Forms\Components\Select::make('kategori')
                    ->required()
                    ->options([
                        'fakir' => 'Fakir',
                        'miskin' => 'Miskin',
                        'amil' => 'Amil',
                        'muallaf' => 'Muallaf',
                        'riqab' => 'Riqab',
                        'gharim' => 'Gharim',
                        'fisabilillah' => 'Fisabilillah',
                        'ibnu sabil' => 'Ibnu Sabil',
                    ])
                    ->label('Kategori'),
                Forms\Components\TextInput::make('hak')
                    ->required()
                    ->numeric()
                    ->label('Hak'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('nama_mustahik')
                    ->searchable()
                    ->sortable()
                    ->label('Nama Mustahik'),
                Tables\Columns\TextColumn::make('kategori')
                    ->searchable()
                    ->sortable()
                    ->label('Kategori'),
                Tables\Columns\TextColumn::make('hak')
                    ->numeric()
                    ->sortable()
                    ->label('Hak'),
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
            'index' => Pages\ListMustahikLainnya::route('/'),
            'create' => Pages\CreateMustahikLainnya::route('/create'),
            'edit' => Pages\EditMustahikLainnya::route('/{record}/edit'),
        ];
    }
}
