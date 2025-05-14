<?php

namespace App\Filament\Resources;

use App\Filament\Resources\MuzzakiResource\Pages;
use App\Filament\Resources\MuzzakiResource\RelationManagers;
use App\Models\Muzzaki;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class MuzzakiResource extends Resource
{
    protected static ?string $model = Muzzaki::class;

    protected static ?string $navigationIcon = 'heroicon-o-user-group';
    
    protected static ?string $navigationLabel = 'Data Muzzaki';
    
    protected static ?string $pluralModelLabel = 'Data Muzzaki';
    
    protected static ?string $modelLabel = 'Muzzaki';
    
    protected static ?int $navigationSort = 1;
    
    protected static ?string $navigationGroup = 'Master Data';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('nama_muzzaki')
                    ->required()
                    ->maxLength(255)
                    ->label('Nama Muzzaki'),
                Forms\Components\TextInput::make('jumlah_tanggungan')
                    ->required()
                    ->numeric()
                    ->label('Jumlah Tanggungan'),
                Forms\Components\TextInput::make('keterangan')
                    ->maxLength(255)
                    ->label('Keterangan'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('nama_muzzaki')
                    ->searchable()
                    ->sortable()
                    ->label('Nama Muzzaki'),
                Tables\Columns\TextColumn::make('jumlah_tanggungan')
                    ->numeric()
                    ->sortable()
                    ->label('Jumlah Tanggungan'),
                Tables\Columns\TextColumn::make('keterangan')
                    ->searchable()
                    ->label('Keterangan'),
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
            'index' => Pages\ListMuzzaki::route('/'),
            'create' => Pages\CreateMuzzaki::route('/create'),
            'edit' => Pages\EditMuzzaki::route('/{record}/edit'),
        ];
    }
}
