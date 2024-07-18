<?php

namespace App\Filament\Seller\Resources;

use App\Filament\Seller\Resources\RestaurantCategoryResource\Pages;
use App\Filament\Seller\Resources\RestaurantCategoryResource\RelationManagers;
use App\Models\RestaurantCategory;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

use App\Models\Seller;
use App\Models\Restaurant;

class RestaurantCategoryResource extends Resource
{
    protected static ?string $model = RestaurantCategory::class;

    protected static ?string $navigationIcon = 'heroicon-o-tag';
    protected static ?string $navigationGroup = 'Category Management';
    protected static ?string $modelLabel = 'Food categories';
    protected static ?int $navigationSort = 2;


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
                Forms\Components\TextInput::make('cat_name')
                    ->required()
                    ->prefixIcon('heroicon-o-tag')
                    ->rule(function ($record) {
                        return $record ? 'unique:restaurant_categories,cat_name,' . $record->id : 'unique:restaurant_categories,cat_name';
                    })
                    ->maxLength(255),
                Forms\Components\TextInput::make('created_by')
                    ->default('seller')
                    ->prefixIcon('heroicon-o-user')
                    ->readOnly()
                    ->maxLength(255),
                Forms\Components\Toggle::make('cat_status')
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
                Tables\Columns\TextColumn::make('seller_id')
                    ->label('Seller Name')
                    ->getStateUsing(function ($record) {
                        return $record->getsellerData->firstName . ' ' . $record->getsellerData->lastName;
                    })
                    ->searchable(),
                Tables\Columns\TextColumn::make('restaurantData.restaurantName')
                    ->label('Restaurant Name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('cat_name')
                    ->label('Category Name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('created_by')
                    ->searchable(),
                Tables\Columns\IconColumn::make('cat_status')
                    ->label('Status')
                    ->boolean(),
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
                Tables\Actions\ViewAction::make(),
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
            'index' => Pages\ListRestaurantCategories::route('/'),
            // 'create' => Pages\CreateRestaurantCategory::route('/create'),
            // 'view' => Pages\ViewRestaurantCategory::route('/{record}'),
            // 'edit' => Pages\EditRestaurantCategory::route('/{record}/edit'),
        ];
    }
}
