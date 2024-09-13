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
    public static function getNavigationGroup(): ?string{
        return __('message.Category Management');
    }
    public static function getModelLabel(): string{
        return __('message.Food Category Translation');
    }
    protected static ?int $navigationSort = 2;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('restaurant_category_id')
                    ->label(__('message.Select Restaurant Category'))
                    ->options(RestaurantCategory::getRestaurantCategoryOptions())
                    ->prefixIcon('heroicon-o-rectangle-stack')
                    ->required()
                    ->reactive(),
                Forms\Components\Select::make('language_id')
                    ->label(__('message.Select language'))
                    ->options(Language::where('status', 1)->pluck('name', 'id')) 
                    ->required()
                    ->prefixIcon('heroicon-o-flag')
                    ->required(),
                Forms\Components\TextInput::make('cat_translation_name')
                    ->label(__('message.Category Translation Name'))
                    // ->rule(function ($record) {
                    //     return $record ? 'unique:restaurant_category_translations,cat_translation_name,' . $record->id : 'unique:restaurant_category_translations,cat_translation_name';
                    // })
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
                    ->label(__('message.Restaurant Category'))
                    ->numeric()
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('languages.name')
                    ->label(__('message.Language'))
                    ->searchable(),
                Tables\Columns\TextColumn::make('cat_translation_name')
                    ->label(__('message.Category Translation Name'))
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
            ->defaultSort('id', 'DESC')
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
            'index' => Pages\ListRestaurantCategoryTranslations::route('/'),
            // 'create' => Pages\CreateRestaurantCategoryTranslation::route('/create'),
            // 'edit' => Pages\EditRestaurantCategoryTranslation::route('/{record}/edit'),
        ];
    }
}
