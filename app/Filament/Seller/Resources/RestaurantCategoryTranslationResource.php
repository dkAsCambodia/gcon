<?php

namespace App\Filament\Seller\Resources;

use App\Filament\Seller\Resources\RestaurantCategoryTranslationResource\Pages;
use App\Filament\Seller\Resources\RestaurantCategoryTranslationResource\RelationManagers;
use App\Models\RestaurantCategoryTranslation;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

use App\Models\Language;
use App\Models\RestaurantCategory;


class RestaurantCategoryTranslationResource extends Resource
{
    protected static ?string $model = RestaurantCategoryTranslation::class;
    protected static ?string $navigationIcon = 'heroicon-o-tag';
    protected static ?string $navigationGroup = 'Category Management';
    protected static ?string $modelLabel = 'Food Category Translation';
    protected static ?int $navigationSort = 2;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('restaurant_category_id')
                    ->label("Restaurant's Category")
                    ->options(RestaurantCategory::getRestaurantCategoryOptions())
                    ->prefixIcon('heroicon-o-rectangle-stack')
                    ->required()
                    ->reactive(),
                Forms\Components\Select::make('language_id')
                    ->label('Select language')
                    ->options(Language::where('status', 1)->pluck('name', 'id')) 
                    ->required()
                    ->prefixIcon('heroicon-o-flag')
                    ->required(),
                Forms\Components\TextInput::make('cat_translation_name')
                    ->label('Category Translation Name')
                    ->prefixIcon('heroicon-o-tag')
                    ->required()
                    ->maxLength(255),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->modifyQueryUsing(fn ($query) => $query->owner()) 
            ->columns([
                Tables\Columns\TextColumn::make('RestaurantCategoryData.cat_name')
                    ->label('RestaurantCategory')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('languages.name')
                    ->label('Language')
                    ->searchable(),
                Tables\Columns\TextColumn::make('cat_translation_name')
                    ->label('Category Translation Name')
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
            'index' => Pages\ListRestaurantCategoryTranslations::route('/'),
            // 'create' => Pages\CreateRestaurantCategoryTranslation::route('/create'),
            // 'edit' => Pages\EditRestaurantCategoryTranslation::route('/{record}/edit'),
        ];
    }
}
