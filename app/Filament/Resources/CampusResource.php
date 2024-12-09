<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CampusResource\Pages;
use App\Filament\Resources\CampusResource\RelationManagers;
use App\Models\Campus;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class CampusResource extends Resource
{
    protected static ?string $model = Campus::class;

    protected static ?string $navigationIcon = 'heroicon-o-building-office-2';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->label('Name')
                    ->required()->maxLength(255),
                Forms\Components\TextInput::make('address')
                    ->label('Address')
                    ->required()->maxLength(255),
                Forms\Components\TextInput::make('city')
                    ->label('City')
                    ->required()->maxLength(255),
                Forms\Components\TextInput::make('state')
                    ->label('State')
                    ->required()->maxLength(255),
                Forms\Components\Select::make('school_id')
                    ->relationship('school', 'name')
                    ->label('School')
                    ->searchable()
                    ->preload()
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->searchable()
                    ->sortable()
                    ->label('Name'),
                Tables\Columns\TextColumn::make('address')
                    ->searchable()
                    ->sortable()
                    ->label('Address'),
                Tables\Columns\TextColumn::make('city')
                    ->searchable()
                    ->sortable()
                    ->label('City'),
                Tables\Columns\TextColumn::make('state')
                    ->searchable()
                    ->sortable()
                    ->label('State'),
                Tables\Columns\TextColumn::make('school.name')
                    ->searchable()
                    ->sortable()
                    ->label('School'),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('school_id')
                    ->relationship('school', 'name')
                    ->label('School')
                    ->searchable()
                    ->preload()
                    ->multiple(),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
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
            'index' => Pages\ListCampuses::route('/'),
            'create' => Pages\CreateCampus::route('/create'),
            'edit' => Pages\EditCampus::route('/{record}/edit'),
        ];
    }
}
