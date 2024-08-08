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
    protected static ?string $navigationGroup = 'Member Management';
    protected static ?string $slug = 'shipping-Address';
    protected static ?int $navigationSort = 4;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('cust_id')
                    ->label('Username')
                    ->options(Customer::pluck('name', 'id')) 
                    ->prefixIcon('heroicon-m-user')
                    ->default('Guest')
                    ->disabled()
                    ->required(),
                Forms\Components\TextInput::make('name')
                    ->prefixIcon('heroicon-m-user')
                    ->required(),
                Forms\Components\TextInput::make('mobile')
                    ->tel()
                    ->prefixIcon('heroicon-m-phone')
                    ->rule(function ($record) {
                        return $record ? 'unique:ship_addresses,mobile,' . $record->id : 'unique:ship_addresses,mobile';
                    })
                    ->maxLength(10)
                    ->required(),
                Forms\Components\TextInput::make('address')
                    ->prefixIcon('heroicon-m-map-pin')
                    ->required(),
                Forms\Components\TextInput::make('city')
                    ->prefixIcon('heroicon-m-map-pin')
                    ->required(),
                Forms\Components\TextInput::make('zip')
                    ->prefixIcon('heroicon-m-map-pin')
                    ->required(),
                Forms\Components\TextInput::make('state')
                    ->prefixIcon('heroicon-m-map-pin')
                    ->required(),
                Forms\Components\Select::make('country')
                    ->options([
                        'Cambodia' => 'Cambodia',
                        'Thailand' => 'Thailand',
                    ])
                    ->default('Cambodia')
                    ->prefixIcon('heroicon-m-flag')
                    ->required(),
                Forms\Components\TextInput::make('landmark')
                    ->prefixIcon('heroicon-m-map-pin')
                    ->maxLength(255),
                Forms\Components\TextInput::make('location')
                    ->prefixIcon('heroicon-m-map-pin')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('lat')
                    ->prefixIcon('heroicon-m-map-pin')
                    ->maxLength(255),
                Forms\Components\TextInput::make('long')
                ->prefixIcon('heroicon-m-map-pin')
                    ->maxLength(255),
                Forms\Components\Toggle::make('ship_status')
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
                    ->label('UserName')
                    ->searchable(),
                Tables\Columns\TextColumn::make('name')
                    ->formatStateUsing(fn ($state) => ucfirst($state))
                    ->searchable(),
                Tables\Columns\TextColumn::make('mobile')
                    ->searchable(),
                Tables\Columns\TextColumn::make('address')
                    ->formatStateUsing(fn ($state) => ucfirst($state))
                    ->searchable(),
                Tables\Columns\TextColumn::make('city')
                    ->formatStateUsing(fn ($state) => ucfirst($state))
                    ->searchable(),
                Tables\Columns\TextColumn::make('zip')
                    ->searchable(),
                Tables\Columns\TextColumn::make('state')
                    ->formatStateUsing(fn ($state) => ucfirst($state))
                    ->searchable(),
                Tables\Columns\TextColumn::make('country')
                    ->searchable(),
                Tables\Columns\TextColumn::make('landmark')
                    ->formatStateUsing(fn ($state) => ucfirst($state))
                    ->searchable(),
                Tables\Columns\IconColumn::make('ship_status')
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
