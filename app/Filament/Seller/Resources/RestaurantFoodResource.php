<?php

namespace App\Filament\Seller\Resources;

use App\Filament\Seller\Resources\RestaurantFoodResource\Pages;
use App\Filament\Seller\Resources\RestaurantFoodResource\RelationManagers;
use App\Models\RestaurantFood;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

use App\Models\Seller;
use App\Models\Restaurant;
use App\Models\RestaurantCategory;
use App\Models\Currency;

class RestaurantFoodResource extends Resource
{
    protected static ?string $model = RestaurantFood::class;
    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationGroup = 'Foods Management';
    protected static ?string $modelLabel = 'Foods';
    protected static ?int $navigationSort = 3;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('seller_id')
                    ->label('Select seller')
                    ->options(Seller::where('sellerLoginId', auth()->id())->pluck('firstName', 'id')) 
                    ->prefixIcon('heroicon-o-tag')
                    ->required(),
                Forms\Components\Select::make('restaurant_id')
                    ->label('Restaurants')
                    ->options(Restaurant::getRestaurantOptions())
                    ->prefixIcon('heroicon-o-rectangle-stack')
                    ->required()
                    ->reactive(),
                Forms\Components\Select::make('restaurant_cat_id')
                    ->label('Category Name')
                    ->options(RestaurantCategory::getRestaurantCategoryOptions())
                    ->prefixIcon('heroicon-o-rectangle-stack')
                    ->required()
                    ->reactive(),
                Forms\Components\TextInput::make('food_name')
                    ->maxLength(255),
                Forms\Components\Select::make('currency_id')
                    ->label('Currency')
                    ->options(Currency::where('deleted_at', NULL)->pluck('currency_code', 'id'))
                    ->prefixIcon('heroicon-o-rectangle-stack')
                    ->required()
                    ->reactive(),
                Forms\Components\TextInput::make('price')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('discount')
                    ->label('Discount in %')
                    ->prefixIcon('heroicon-m-receipt-percent')
                    ->numeric(),
                Forms\Components\TextInput::make('created_by')
                    ->default('seller')
                    ->prefixIcon('heroicon-o-user')
                    ->readOnly()
                    ->maxLength(255),
                Forms\Components\FileUpload::make('food_img')
                    ->label('Food Image')
                    ->required()
                    ->directory('images/restaurant/food')
                    ->image(),
                Forms\Components\Toggle::make('food_status')
                    ->default(1)
                    ->onIcon('heroicon-m-bolt')
                    ->offIcon('heroicon-m-user')
                    ->onColor('success'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->modifyQueryUsing(fn ($query) => $query->owner()) 
            ->columns([
                Tables\Columns\TextColumn::make('Seller Name')
                    ->getStateUsing(function ($record) {
                        return $record->getsellerData->firstName . ' ' . $record->getsellerData->lastName;
                    })
                    ->searchable(),
                Tables\Columns\TextColumn::make('restaurantData.restaurantName')
                    ->label('Restaurant Name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('getRestaurantCategory.cat_name')
                    ->label('Category Name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('food_name')
                    ->searchable(),
                Tables\Columns\ImageColumn::make('food_img')
                    ->square(),
                Tables\Columns\TextColumn::make('price')
                    ->searchable(),
                Tables\Columns\TextColumn::make('getcurrencyData.currency_code')
                    ->label('Currency')
                    ->searchable(),
                Tables\Columns\TextColumn::make('discount')
                    ->searchable(),
                Tables\Columns\IconColumn::make('food_status')
                    ->boolean(),
                Tables\Columns\TextColumn::make('deleted_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
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
                Tables\Filters\TrashedFilter::make(),
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                    Tables\Actions\ForceDeleteBulkAction::make(),
                    Tables\Actions\RestoreBulkAction::make(),
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
            'index' => Pages\ListRestaurantFood::route('/'),
            // 'create' => Pages\CreateRestaurantFood::route('/create'),
            // 'view' => Pages\ViewRestaurantFood::route('/{record}'),
            // 'edit' => Pages\EditRestaurantFood::route('/{record}/edit'),
        ];
    }

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()
            ->withoutGlobalScopes([
                SoftDeletingScope::class,
            ]);
    }
}
