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
    public static function getNavigationGroup(): ?string{
        return __('message.Menu Management');
    }
    public static function getModelLabel(): string{
        return __('message.Menu');
    }
    protected static ?int $navigationSort = 2;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('seller_id')
                    ->label(__('message.Select seller'))
                    ->options(Seller::where('sellerLoginId', auth()->id())->pluck('firstName', 'id')) 
                    ->prefixIcon('heroicon-o-tag')
                    ->required(),
                Forms\Components\Select::make('restaurant_id')
                    ->label(__('message.Select Restaurant'))
                    ->options(Restaurant::getRestaurantOptions())
                    ->prefixIcon('heroicon-o-rectangle-stack')
                    ->required()
                    ->reactive(),
                Forms\Components\TextInput::make('cat_name')
                    ->label(__('message.Category Name or Menu name'))
                    ->required()
                    ->prefixIcon('heroicon-o-tag')
                    // ->rule(function ($record) {
                    //     return $record ? 'unique:restaurant_categories,cat_name,' . $record->id : 'unique:restaurant_categories,cat_name';
                    // })
                    ->maxLength(255),
                Forms\Components\TextInput::make('created_by')
                    ->label(__('message.Created By'))
                    ->default('seller')
                    ->prefixIcon('heroicon-o-user')
                    ->readOnly()
                    ->maxLength(255),
                Forms\Components\Toggle::make('cat_status')
                    ->label(__('message.Status'))
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
                    ->label(__('message.Seller'))
                    ->getStateUsing(function ($record) {
                        return $record->getsellerData->firstName . ' ' . $record->getsellerData->lastName;
                    })
                    ->searchable(),
                Tables\Columns\TextColumn::make('restaurantData.restaurantName')
                    ->label(__('message.Restaurant Name'))
                    ->searchable(),
                Tables\Columns\TextColumn::make('cat_name')
                    ->label(__('message.Category Name or Menu name'))
                    ->searchable(),
                Tables\Columns\TextColumn::make('created_by')
                    ->label(__('message.Created By'))
                    ->searchable(),
                Tables\Columns\IconColumn::make('cat_status')
                    ->label(__('message.Status'))
                    ->boolean(),
                Tables\Columns\TextColumn::make('created_at')
                    ->label(__('message.Created at'))
                    ->dateTime('d-M-Y')
                    ->sortable(),
                Tables\Columns\TextColumn::make('updated_at')
                    ->label(__('message.Updated at'))
                    ->dateTime('d-M-Y')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->defaultSort('id', 'DESC')
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\ViewAction::make()->label(__('message.View'))->modalHeading(__('message.View')),
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
            'index' => Pages\ListRestaurantCategories::route('/'),
            // 'create' => Pages\CreateRestaurantCategory::route('/create'),
            // 'view' => Pages\ViewRestaurantCategory::route('/{record}'),
            // 'edit' => Pages\EditRestaurantCategory::route('/{record}/edit'),
        ];
    }
}
