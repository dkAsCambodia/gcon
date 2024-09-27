<?php

namespace App\Filament\Resources;

use App\Filament\Resources\DeliveryBoyResource\Pages;
use App\Filament\Resources\DeliveryBoyResource\RelationManagers;
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
    public static function getNavigationGroup(): ?string{
        return __('message.Restaurant Management');
    }
    public static function getModelLabel(): string{
        return __('message.Delivery Boy');
    }
    protected static ?int $navigationSort = 3;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('BookingType')
                    ->label(__('message.GBooking Type'))
                    ->options(TblGbooking::where('status', 1)->pluck('BookingType', 'id')) 
                    ->prefixIcon('heroicon-o-rectangle-stack')
                    ->default('2')
                    ->reactive(),
                Forms\Components\TextInput::make('DeliveryBoyId')
                    ->label(__('message.DeliveryBoyId'))
                    ->maxLength(255),
                Forms\Components\TextInput::make('name')
                    ->label(__('message.Name'))
                    ->maxLength(255),
                Forms\Components\TextInput::make('mobile')
                    ->label(__('message.Phone Number'))
                    ->maxLength(255),
                Forms\Components\TextInput::make('address')
                    ->label(__('message.Address'))
                    ->maxLength(255),
                Forms\Components\TextInput::make('city')
                    ->label(__('message.City'))
                    ->maxLength(255),
                Forms\Components\TextInput::make('zip')
                    ->label(__('message.zip'))
                    ->maxLength(255),
                Forms\Components\TextInput::make('state')
                    ->label(__('message.State'))
                    ->maxLength(255),
                Forms\Components\TextInput::make('country')
                    ->label(__('message.Country'))
                    ->maxLength(255),
                Forms\Components\TextInput::make('landmark')
                    ->label(__('message.landmark'))
                    ->maxLength(255),
                Forms\Components\TextInput::make('location')
                    ->label(__('message.Location'))
                    ->maxLength(255),
                Forms\Components\TextInput::make('lat')
                    ->label(__('message.Lat'))
                    ->maxLength(255),
                Forms\Components\TextInput::make('long')
                    ->label(__('message.Long'))
                    ->maxLength(255),
                Forms\Components\Toggle::make('status')
                    ->label(__('message.Status'))
                    ->default('0')
                    ->onIcon('heroicon-m-bolt')
                    ->offIcon('heroicon-m-user')
                    ->onColor('success'),
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
            ->columns([
                Tables\Columns\TextColumn::make(ucfirst('gbookingdata.BookingType'))
                    ->label('BookingType')
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
            'index' => Pages\ListDeliveryBoys::route('/'),
            // 'create' => Pages\CreateDeliveryBoy::route('/create'),
            // 'view' => Pages\ViewDeliveryBoy::route('/{record}'),
            // 'edit' => Pages\EditDeliveryBoy::route('/{record}/edit'),
        ];
    }
}
