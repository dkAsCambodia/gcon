<?php

namespace App\Filament\Seller\Resources;

use App\Filament\Seller\Resources\RestaurantFoodTranslationResource\Pages;
use App\Filament\Seller\Resources\RestaurantFoodTranslationResource\RelationManagers;
use App\Models\RestaurantFoodTranslation;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

use App\Models\RestaurantFood;
use App\Models\Language;

class RestaurantFoodTranslationResource extends Resource
{
    protected static ?string $model = RestaurantFoodTranslation::class;
    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $navigationGroup = 'Foods Management';
    protected static ?string $modelLabel = 'Foods translation';
    protected static ?int $navigationSort = 3;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('restaurant_food_id')
                    ->label('Select Food')
                    ->options(RestaurantFood::getFoodOptions()) 
                    ->prefixIcon('heroicon-o-tag')
                    ->required(),
                Forms\Components\Select::make('language_id')
                    ->label('Select language')
                    ->options(Language::where('status', 1)->pluck('name', 'id')) 
                    ->required()
                    ->prefixIcon('heroicon-o-flag')
                    ->required(),
                Forms\Components\TextInput::make('food_translation_name')
                    ->prefixIcon('heroicon-o-arrow-right-circle')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('translation_title')
                    ->prefixIcon('heroicon-o-arrow-right-circle')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('translation_desc')
                    ->prefixIcon('heroicon-o-arrow-right-circle')
                    ->maxLength(255),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('RestaurantFoodData.food_name')
                    ->label('Food Name')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('languages.name')
                    ->label('Language')
                    ->searchable(),
                Tables\Columns\TextColumn::make('food_translation_name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('translation_title')
                    ->searchable(),
                Tables\Columns\TextColumn::make('translation_desc')
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
            ->defaultSort('id', 'DESC')
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
            'index' => Pages\ListRestaurantFoodTranslations::route('/'),
            // 'create' => Pages\CreateRestaurantFoodTranslation::route('/create'),
            // 'edit' => Pages\EditRestaurantFoodTranslation::route('/{record}/edit'),
        ];
    }
}
