<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ShipAddresseResource\Pages;
use App\Filament\Resources\ShipAddresseResource\RelationManagers;
use App\Models\ShipAddresse;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

use App\Models\Customer;

class ShipAddresseResource extends Resource
{
    protected static ?string $model = ShipAddresse::class;

    protected static ?string $navigationIcon = 'heroicon-o-map-pin';
   
    protected static ?string $slug = 'shipping-Address';
    public static function getNavigationGroup(): ?string{
        return __('message.Member Management');
    }
    public static function getModelLabel(): string{
        return __('message.Shipping Address');
    }
    protected static ?int $navigationSort = 4;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('cust_id')
                    ->label(__('message.Username'))
                    ->options(Customer::pluck('name', 'id')) 
                    ->prefixIcon('heroicon-m-user')
                    ->default('Guest')
                    ->disabled()
                    ->required(),
                Forms\Components\TextInput::make('name')
                    ->label(__('message.Name'))
                    ->prefixIcon('heroicon-m-user')
                    ->required(),
                Forms\Components\TextInput::make('mobile')
                    ->label(__('message.Enter phone number'))
                    ->tel()
                    ->prefixIcon('heroicon-m-phone')
                    ->rule(function ($record) {
                        return $record ? 'unique:ship_addresses,mobile,' . $record->id : 'unique:ship_addresses,mobile';
                    })
                    ->maxLength(10)
                    ->required(),
                Forms\Components\TextInput::make('address')
                    ->label(__('message.Enter address'))
                    ->prefixIcon('heroicon-m-map-pin')
                    ->required(),
                Forms\Components\TextInput::make('city')
                    ->label(__('message.Enter city'))
                    ->prefixIcon('heroicon-m-map-pin')
                    ->required(),
                Forms\Components\TextInput::make('zip')
                    ->label(__('message.Enter zip'))
                    ->prefixIcon('heroicon-m-map-pin')
                    ->required(),
                Forms\Components\TextInput::make('state')
                    ->label(__('message.Enter state'))
                    ->prefixIcon('heroicon-m-map-pin')
                    ->required(),
                Forms\Components\Select::make('country')
                    ->label(__('message.Country'))
                    ->options([
                        'Cambodia' => 'Cambodia',
                        'Thailand' => 'Thailand',
                    ])
                    ->default('Cambodia')
                    ->prefixIcon('heroicon-m-flag')
                    ->required(),
                Forms\Components\TextInput::make('landmark')
                    ->label(__('message.landmark'))
                    ->prefixIcon('heroicon-m-map-pin')
                    ->maxLength(255),
                Forms\Components\TextInput::make('location')
                    ->label(__('message.Location'))
                    ->prefixIcon('heroicon-m-map-pin')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('lat')
                    ->label(__('message.Lat'))
                    ->prefixIcon('heroicon-m-map-pin')
                    ->maxLength(255),
                Forms\Components\TextInput::make('long')
                    ->label(__('message.Long'))
                ->prefixIcon('heroicon-m-map-pin')
                    ->maxLength(255),
                Forms\Components\Toggle::make('ship_status')
                    ->label(__('message.Status'))
                    ->default('0')
                    ->onIcon('heroicon-m-bolt')
                    ->onColor('success')
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('Customerdata.name')
                    ->label(__('message.Username'))
                    ->searchable(),
                Tables\Columns\TextColumn::make('name')
                    ->label(__('message.Name'))
                    ->formatStateUsing(fn ($state) => ucfirst($state))
                    ->searchable(),
                Tables\Columns\TextColumn::make('mobile')
                    ->label(__('message.Phone Number'))
                    ->searchable(),
                Tables\Columns\TextColumn::make('address')
                    ->label(__('message.Address'))
                    ->formatStateUsing(fn ($state) => ucfirst($state))
                    ->searchable(),
                Tables\Columns\TextColumn::make('city')
                    ->label(__('message.City'))
                    ->formatStateUsing(fn ($state) => ucfirst($state))
                    ->searchable(),
                Tables\Columns\TextColumn::make('zip')
                    ->label(__('message.zip'))
                    ->searchable(),
                Tables\Columns\TextColumn::make('state')
                    ->label(__('message.State'))
                    ->formatStateUsing(fn ($state) => ucfirst($state))
                    ->searchable(),
                Tables\Columns\TextColumn::make('country')
                    ->label(__('message.Country'))
                    ->searchable(),
                Tables\Columns\TextColumn::make('landmark')
                    ->label(__('message.landmark'))
                    ->formatStateUsing(fn ($state) => ucfirst($state))
                    ->searchable(),
                Tables\Columns\IconColumn::make('ship_status')
                    ->label(__('message.Status'))
                    ->boolean(),
                Tables\Columns\TextColumn::make(__('message.created_at'))
                    ->dateTime('d-M-Y')
                    ->sortable(),
                Tables\Columns\TextColumn::make(__('message.deleted_at'))
                    ->dateTime('d-M-Y')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make(__('message.updated_at'))
                    ->dateTime('d-M-Y')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),

            ])
            ->filters([
                Tables\Filters\TrashedFilter::make(),
            ])
            ->actions([
                Tables\Actions\ViewAction::make()->label(__('message.View'))->modalHeading(__('message.View')),
                Tables\Actions\EditAction::make()->label(__('message.Edit'))->modalButton(__('message.Save changes')),
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
            'index' => Pages\ListShipAddresses::route('/'),
            // 'create' => Pages\CreateShipAddresse::route('/create'),
            // 'view' => Pages\ViewShipAddresse::route('/{record}'),
            // 'edit' => Pages\EditShipAddresse::route('/{record}/edit'),
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
