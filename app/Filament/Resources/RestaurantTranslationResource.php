<?php

namespace App\Filament\Resources;

use App\Filament\Resources\RestaurantTranslationResource\Pages;
use App\Filament\Resources\RestaurantTranslationResource\RelationManagers;
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
    public static function getNavigationGroup(): ?string{
        return __('message.Restaurant Management');
    }
    public static function getModelLabel(): string{
        return __('message.Restaurant Translation');
    }
    protected static ?int $navigationSort = 2;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('restaurant_id')
                    ->label(__('message.Select Restaurant'))
                    ->options(Restaurant::pluck('restaurantName', 'id')) 
                    ->prefixIcon('heroicon-o-rectangle-stack')
                    ->required()
                    ->reactive(),
                Forms\Components\Select::make('language_id')
                    ->label(__('message.Select language'))
                    ->options(Language::where('status', 1)->pluck('name', 'id')) 
                    ->required()
                    ->prefixIcon('heroicon-o-flag')
                    ->required(),
                Forms\Components\TextInput::make('heading')
                    ->label(__('message.Heading'))
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('title')
                    ->label(__('message.Title'))
                    ->maxLength(255),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('restaurantData.restaurantName')
                    ->label(__('message.Restaurant Name'))
                    ->sortable(),
                Tables\Columns\TextColumn::make('languages.name')
                    ->label(__('message.Language'))
                    ->searchable(),
                Tables\Columns\TextColumn::make('heading')
                    ->label(__('message.Heading'))
                    ->searchable(),
                Tables\Columns\TextColumn::make('title')
                    ->label(__('message.Title'))
                    ->searchable(),
                Tables\Columns\TextColumn::make(__('message.created_at'))
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make(__('message.updated_at'))
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make()->label(__('message.Edit'))->modalButton(__('message.Save changes')),
                Tables\Actions\DeleteAction::make()->label(__('message.Delete')),
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
