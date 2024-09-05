<?php

namespace App\Filament\Resources;

use App\Filament\Resources\RestaurantOrderResource\Pages;
use App\Filament\Resources\RestaurantOrderResource\RelationManagers;
use App\Models\RestaurantOrder;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

use App\Models\Restaurant;
use App\Models\Customer;

class RestaurantOrderResource extends Resource
{
    protected static ?string $model = RestaurantOrder::class;
    protected static ?string $navigationIcon = 'heroicon-o-building-office';
    protected static ?string $navigationGroup = 'Restaurant Management';
    protected static ?string $modelLabel = 'Ordered food transaction';
    protected static ?string $slug = 'orderedfoods';
    protected static ?int $navigationSort = 5;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('restaurant_id')
                    ->label('Restaurants')
                    ->options(Restaurant::pluck('restaurantName', 'id')) 
                    ->prefixIcon('heroicon-o-rectangle-stack')
                    ->required()
                    ->reactive(),
                Forms\Components\Select::make('cust_id')
                    ->label('CustomerName')
                    ->options(Customer::pluck('name', 'id')) 
                    ->prefixIcon('heroicon-m-user')
                    ->default('Guest')
                    ->required(),
                Forms\Components\TextInput::make('order_key')
                    ->maxLength(255),
                Forms\Components\TextInput::make('TransactionId')
                    ->maxLength(255),
                Forms\Components\TextInput::make('payment_type')
                    ->maxLength(255),
                Forms\Components\TextInput::make('totalPayAmount')
                    ->label('Amount')
                    ->maxLength(255),
                Forms\Components\TextInput::make('currency')
                    ->maxLength(255),
                Forms\Components\Select::make('payment_status')
                    ->options([
                        'pending' => 'pending',
                        'success' => 'success',
                        'failed' => 'failed',
                    ])
                    ->prefixIcon('heroicon-m-calendar'),
                Forms\Components\Select::make('order_status')
                    ->options([
                        'pending' => 'pending',
                        'ordered' => 'ordered',
                    ])
                    ->prefixIcon('heroicon-m-calendar'),
                Forms\Components\Select::make('assign_status')
                    ->options([
                        'pending' => 'pending',
                        'assigned' => 'assigned',
                        'accepted' => 'accepted',
                        'shipped' => 'shipped',
                        'rejected' => 'rejected',
                        'delivered' => 'delivered',
                        'cancelled' => 'cancelled',
                    ])
                    ->prefixIcon('heroicon-m-calendar'),
                Forms\Components\TextInput::make('gateway_name')
                    ->maxLength(255),
                Forms\Components\TextInput::make('delivery_suggestion')
                    ->maxLength(255),
                Forms\Components\TextInput::make('cancel_reason')
                    ->maxLength(255),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('Serial_number')
                    ->badge()
                    ->state(fn($column) => $column->getRowLoop()->iteration),
                Tables\Columns\TextColumn::make('getsellerData.firstName')
                    ->label('Seller')
                    ->searchable(),
                Tables\Columns\TextColumn::make('restaurantData.restaurantName')
                    ->label('Restaurant Name')
                    ->searchable(),
                Tables\Columns\ImageColumn::make('RestaurantFoodData.food_img')
                    ->label('Foods')
                    ->square(),
                Tables\Columns\TextColumn::make('Customerdata.name')
                    ->label('CustomerName')
                    ->searchable(),
                Tables\Columns\TextColumn::make('order_key')
                    ->label('OrderKey')
                    ->searchable(),
                Tables\Columns\TextColumn::make('TransactionId')
                    ->searchable(),
                Tables\Columns\TextColumn::make('payment_type')
                    ->searchable(),
                Tables\Columns\TextColumn::make('totalPayAmount')
                    ->label('Amount')
                    ->searchable(),
                Tables\Columns\TextColumn::make('currency')
                    ->searchable(),
                Tables\Columns\TextColumn::make('payment_status')
                    ->label('Payment Status')
                    ->searchable()
                    ->formatStateUsing(fn (string $state): string => ucfirst($state))
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'pending' => 'danger',
                        'success' => 'success',
                    }),
                Tables\Columns\TextColumn::make('order_status')
                    ->searchable()
                    ->formatStateUsing(fn (string $state): string => ucfirst($state))
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'pending' => 'danger',
                        'ordered' => 'success',
                    }),
                Tables\Columns\TextColumn::make('assign_status')
                    ->searchable()
                    ->formatStateUsing(fn (string $state): string => ucfirst($state))
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'pending' => 'danger',
                        'assigned' => 'primary',
                        'accepted' => 'success',
                        'shipped' => 'warning',
                        'rejected' => 'danger',
                        'delivered' => 'success',
                        'cancelled' => 'danger',
                    }),
                Tables\Columns\TextColumn::make('order_date')
                    ->dateTime('d-M-Y')
                    ->searchable(),
            ])
            ->filters([
                Tables\Filters\TrashedFilter::make(),
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
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
            'index' => Pages\ListRestaurantOrders::route('/'),
            // 'create' => Pages\CreateRestaurantOrder::route('/create'),
            // 'view' => Pages\ViewRestaurantOrder::route('/{record}'),
            // 'edit' => Pages\EditRestaurantOrder::route('/{record}/edit'),
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
