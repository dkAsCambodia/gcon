<?php

namespace App\Filament\DeliveryBoy\Resources;

use App\Filament\DeliveryBoy\Resources\RestaurantOrderResource\Pages;
use App\Filament\DeliveryBoy\Resources\RestaurantOrderResource\RelationManagers;
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
use App\Models\DeliveryBoy;
use App\Models\ShipAddresse;

class RestaurantOrderResource extends Resource
{
    protected static ?string $model = RestaurantOrder::class;

    protected static ?string $navigationIcon = 'heroicon-o-credit-card';
    // public static function getNavigationGroup(): ?string{
    //     return __('message.Foods Management');
    // }
    public static function getModelLabel(): string{
        return __('message.Ordered food transaction');
    }

    public static function form(Form $form): Form
    {
        return $form
        ->schema([
            
                Forms\Components\Section::make(__('message.Order details'))
                ->schema([
                    Forms\Components\Select::make('restaurant_id')
                        ->label(__('message.Restaurant Name'))
                        ->disabled()
                        ->options(Restaurant::pluck('restaurantName', 'id')) 
                        ->prefixIcon('heroicon-o-rectangle-stack')
                        ->required()
                        ->reactive(),
                    Forms\Components\Select::make('cust_id')
                        ->label(__('message.Username'))
                        ->disabled()
                        ->options(Customer::pluck('name', 'id')) 
                        ->prefixIcon('heroicon-m-user')
                        ->default('Guest')
                        ->required(),
                    Forms\Components\TextInput::make('order_key')
                        ->label(__('message.Order Key'))
                        ->prefixIcon('heroicon-o-tag')
                        ->readonly()
                        ->maxLength(255),
                    Forms\Components\TextInput::make('TransactionId')
                        ->prefixIcon('heroicon-o-tag')
                        ->readonly()
                        ->label(__('message.TransactionId'))
                        ->maxLength(255),
                    Forms\Components\TextInput::make('payment_type')
                        ->prefixIcon('heroicon-o-tag')
                        ->readonly()
                        ->label(__('message.Payment type'))
                        ->maxLength(255),
                    Forms\Components\Select::make('payment_status')
                        ->label(__('message.Payment Status'))
                        ->disabled()
                        ->options([
                            'pending' => 'pending',
                            'success' => 'success',
                            'failed' => 'failed',
                        ])
                        ->prefixIcon('heroicon-m-ticket'),
                    Forms\Components\TextInput::make('totalPayAmount')
                        ->prefixIcon('heroicon-o-currency-dollar')
                        ->label(__('message.Amount'))
                        ->readonly()
                        ->maxLength(255),
                    Forms\Components\TextInput::make('currency')
                        ->prefixIcon('heroicon-o-currency-dollar')
                        ->label(__('message.Currency'))
                        ->readonly()
                        ->maxLength(255),
                    Forms\Components\Select::make('deliveryBoyId')
                        ->label(__('message.Delivery Boy'))
                        ->searchable()
                        ->disabled()
                        ->options(DeliveryBoy::where('status', '1')->where('available_for_delivery', '1')->pluck('name', 'id')) 
                        ->prefixIcon('heroicon-m-user'),
                    Forms\Components\Select::make('order_status')
                        ->label(__('message.Order Status'))
                        ->disabled()
                        ->options([
                            'pending' => 'pending',
                            'ordered' => 'ordered',
                        ])
                        ->prefixIcon('heroicon-m-ticket'),
                    Forms\Components\Select::make('assign_status') 
                        ->label(__('message.Assign Status'))
                        ->options([
                            'pending' => 'pending',
                            'assigned' => 'assigned',
                            'accepted' => 'accepted',
                            'shipped' => 'shipped',
                            'rejected' => 'rejected',
                            'delivered' => 'delivered',
                            'cancelled' => 'cancelled',
                        ])
                        ->prefixIcon('heroicon-m-ticket'),
                    Forms\Components\Textarea::make('cancel_reason')
                        ->label(__('message.Cancellation reason')),
                    Forms\Components\TextInput::make('delivery_suggestion')
                        ->label(__('message.Delivery suggestion'))
                        ->readonly()
                        ->prefixIcon('heroicon-m-chevron-double-right')
                        ->maxLength(255),
                    // Forms\Components\TextInput::make('customer_name')
                    //     ->label(__('message.Customer Name'))
                    //     ->prefixIcon('heroicon-m-chevron-double-right')
                    //     ->maxLength(255),
                ])->columns(4),
        ]);
    }

    // public function mount($record)
    // {
    //     parent::mount($record);
        
    //     // Manually populate the customer name from the related model
    //     $this->form->fill([
    //         'customer_name' => $record->ShippingAddressData ? $record->ShippingAddressData->name : null,
    //     ]);
    // }


    public static function table(Table $table): Table
    {
        return $table
            ->modifyQueryUsing(fn ($query) => $query->owner())
            ->columns([
                Tables\Columns\TextColumn::make('Serial_number')
                    ->label(__('message.Serial number'))
                    ->badge()
                    ->state(fn($column) => $column->getRowLoop()->iteration),
                Tables\Columns\TextColumn::make('restaurantData.restaurantName')
                ->label(__('message.Restaurant Name'))
                    ->searchable(),
                Tables\Columns\ImageColumn::make('RestaurantFoodData.food_img')
                    ->label(__('message.Foods'))
                    ->square(),
                Tables\Columns\TextColumn::make('ShippingAddressData.name')
                    ->label(__('message.Customer Name'))
                    ->searchable(),
                Tables\Columns\TextColumn::make('order_key')
                    ->label(__('message.Order Key'))
                    ->searchable(),
                Tables\Columns\TextColumn::make('TransactionId')
                    ->label(__('message.TransactionId'))
                    ->searchable(),
                Tables\Columns\TextColumn::make('payment_type')
                    ->label(__('message.Payment type'))
                    ->searchable(),
                Tables\Columns\TextColumn::make('totalPayAmount')
                    ->label(__('message.Amount'))
                    ->searchable(),
                Tables\Columns\TextColumn::make('currency')
                    ->label(__('message.Currency'))
                    ->searchable(),
                Tables\Columns\TextColumn::make('deliveryBoydata.name')
                    ->label(__('message.Delivery Boy'))
                    ->searchable(),
                Tables\Columns\TextColumn::make('payment_status')
                    ->label(__('message.Payment Status'))
                    ->searchable()
                    ->formatStateUsing(fn (string $state): string => ucfirst($state))
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'pending' => 'danger',
                        'success' => 'success',
                    }),
                Tables\Columns\TextColumn::make('order_status')
                    ->searchable()
                    ->label(__('message.Order Status'))
                    ->formatStateUsing(fn (string $state): string => ucfirst($state))
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'pending' => 'danger',
                        'ordered' => 'success',
                    }),
                Tables\Columns\TextColumn::make('assign_status')
                    ->searchable()
                    ->label(__('message.Assign Status'))
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
                    ->label(__('message.Order Date'))
                    ->dateTime('d-M-Y')
                    ->searchable(),
            ])
            ->defaultSort('created_at', 'desc')
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
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
            RelationManagers\ShippingAddressDataRelationManager::class
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListRestaurantOrders::route('/'),
            // 'create' => Pages\CreateRestaurantOrder::route('/create'),
            'view' => Pages\ViewRestaurantOrder::route('/{record}'),
            'edit' => Pages\EditRestaurantOrder::route('/{record}/edit'),
        ];
    }
}
