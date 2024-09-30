<?php

namespace App\Filament\DeliveryBoy\Resources;

use App\Filament\DeliveryBoy\Resources\DeliveryBoyResource\Pages;
use App\Filament\DeliveryBoy\Resources\DeliveryBoyResource\RelationManagers;
use App\Models\DeliveryBoy;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Models\TblGbooking;

class DeliveryBoyResource extends Resource
{
    protected static ?string $model = DeliveryBoy::class;
    protected static ?string $navigationIcon = 'heroicon-o-user';
    public static function getModelLabel(): string{
        return __('message.View profile');
    }

    public static function form(Form $form): Form
    {
        return $form
        ->schema([
            Forms\Components\Select::make('BookingType')
                ->label(__('message.GBooking Type'))
                ->options(TblGbooking::where('status', 1)->pluck('BookingType', 'id')) 
                ->prefixIcon('heroicon-o-rectangle-stack')
                ->default('2')
                ->disabled()
                ->reactive(),
            Forms\Components\TextInput::make('DeliveryBoyId')
                ->label(__('message.DeliveryBoyId'))
                ->readonly()
                ->maxLength(255),
            Forms\Components\TextInput::make('name')
                ->prefixIcon('heroicon-m-user')
                ->label(__('message.Name'))
                ->maxLength(255),
            Forms\Components\TextInput::make('mobile')
                ->label(__('message.Phone Number'))
                ->prefixIcon('heroicon-m-phone')
                ->maxLength(255),
            Forms\Components\TextInput::make('address')
                ->label(__('message.Address'))
                ->prefixIcon('heroicon-m-map-pin')
                ->maxLength(255),
            Forms\Components\TextInput::make('city')
                ->label(__('message.City'))
                ->prefixIcon('heroicon-m-map-pin')
                ->maxLength(255),
            Forms\Components\TextInput::make('zip')
                ->label(__('message.zip'))
                ->prefixIcon('heroicon-m-map-pin')
                ->maxLength(255),
            Forms\Components\TextInput::make('state')
                ->label(__('message.State'))
                ->prefixIcon('heroicon-m-map-pin')
                ->maxLength(255),
            Forms\Components\Select::make('country')
                ->label(__('message.Country'))
                ->options([
                    'KH' => 'Cambodia',
                    'TH' => 'Thailand',
                    'VN' => 'Vietnam',
                    'MY' => 'Malaysia',
                    'ID' => 'Indonesia',
                    'US' => 'United States',
                    'PH' => 'Philippines',
                    'IN' => 'India',
                    'CN' => 'China',
                ])
                ->default('KH')
                ->prefixIcon('heroicon-m-flag')
                ->searchable()
                ->required(),
            Forms\Components\TextInput::make('landmark')
                ->label(__('message.landmark'))
                ->prefixIcon('heroicon-m-map-pin')
                ->maxLength(255),
            Forms\Components\TextInput::make('location')
                ->label(__('message.Location'))
                ->prefixIcon('heroicon-m-map-pin')
                ->maxLength(255),
            Forms\Components\TextInput::make('lat')
                ->label(__('message.Lat'))
                ->maxLength(255),
            Forms\Components\TextInput::make('long')
                ->label(__('message.Long'))
                ->maxLength(255),
            Forms\Components\Toggle::make('available_for_delivery')
                ->label(__('message.Available for delivery'))
                ->default('0')
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
                Tables\Columns\TextColumn::make(ucfirst('gbookingdata.BookingType'))
                    ->label(__('message.Business Type'))
                    ->searchable(),
                Tables\Columns\TextColumn::make('DeliveryBoyId')
                    ->searchable(),
                Tables\Columns\TextColumn::make('name')
                    ->label(__('message.Name'))
                    ->searchable(),
                Tables\Columns\TextColumn::make('mobile')
                    ->label(__('message.Phone Number'))
                    ->searchable(),
                Tables\Columns\TextColumn::make('deliverBoyLoginData.email')
                    ->label(__('message.Email'))
                    ->searchable(),
                Tables\Columns\TextColumn::make('address')
                    ->label(__('message.Address'))
                    ->searchable(),
                Tables\Columns\TextColumn::make('city')
                    ->label(__('message.City'))
                    ->searchable(),
                Tables\Columns\TextColumn::make('zip')
                    ->label(__('message.zip'))
                    ->searchable(),
                Tables\Columns\TextColumn::make('state')
                    ->label(__('message.State'))
                    ->searchable(),
                Tables\Columns\TextColumn::make('country')
                    ->label(__('message.Country'))
                    ->searchable(),
                Tables\Columns\TextColumn::make('landmark')
                    ->label(__('message.landmark'))
                    ->searchable(),
                Tables\Columns\IconColumn::make('status')
                    ->label(__('message.Status'))
                    ->boolean(),
                Tables\Columns\IconColumn::make('available_for_delivery')
                    ->label(__('message.Available for delivery'))
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
            ->defaultSort('created_at', 'desc')
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\ViewAction::make()->label(__('message.View'))->modalHeading(__('message.View')),
                Tables\Actions\EditAction::make()->label(__('message.Edit'))->modalButton(__('message.Save changes')),
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
            'index' => Pages\ListDeliveryBoys::route('/'),
            // 'create' => Pages\CreateDeliveryBoy::route('/create'),
            // 'view' => Pages\ViewDeliveryBoy::route('/{record}'),
            // 'edit' => Pages\EditDeliveryBoy::route('/{record}/edit'),
        ];
    }
}
