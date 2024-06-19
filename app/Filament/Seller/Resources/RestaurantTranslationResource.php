<?php

namespace App\Filament\Seller\Resources;

use App\Filament\Seller\Resources\RestaurantTranslationResource\Pages;
use App\Filament\Seller\Resources\RestaurantTranslationResource\RelationManagers;
use App\Models\RestaurantTranslation;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

use App\Models\Language;
use App\Models\Restaurant;

class RestaurantTranslationResource extends Resource
{
    protected static ?string $model = RestaurantTranslation::class;
    protected static ?string $navigationIcon = 'heroicon-o-building-office';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('restaurant_id')
                    ->label('Restaurants')
                    ->options(Restaurant::getRestaurantOptions())
                    ->prefixIcon('heroicon-o-rectangle-stack')
                    ->required()
                    ->reactive(),
                Forms\Components\Select::make('language_id')
                    ->label('Select language')
                    ->options(Language::where('status', 1)->pluck('name', 'id')) 
                    ->required()
                    ->prefixIcon('heroicon-o-flag')
                    ->required(),
                Forms\Components\TextInput::make('heading')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('title')
                    ->maxLength(255),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->modifyQueryUsing(fn ($query) => $query->owner()) 
            ->columns([
                Tables\Columns\TextColumn::make('restaurantData.restaurantName')
                    ->label('Restaurant Name')
                    ->sortable(),
                Tables\Columns\TextColumn::make('languages.name')
                    ->label('Language')
                    ->searchable(),
                Tables\Columns\TextColumn::make('languages.name')
                    ->label('Language')
                    ->searchable(),
                Tables\Columns\TextColumn::make('heading')
                    ->searchable(),
                Tables\Columns\TextColumn::make('title')
                    ->searchable(),
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
            'index' => Pages\ListRestaurantTranslations::route('/'),
            // 'create' => Pages\CreateRestaurantTranslation::route('/create'),
            // 'edit' => Pages\EditRestaurantTranslation::route('/{record}/edit'),
        ];
    }
}
