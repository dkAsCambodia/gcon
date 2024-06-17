<?php

namespace App\Filament\Seller\Resources;

use App\Filament\Seller\Resources\RestaurantResource\Pages;
use App\Filament\Seller\Resources\RestaurantResource\RelationManagers;
use App\Models\Restaurant;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

use App\Models\TblGbooking;
use App\Models\Seller;
use Filament\Forms\Components\TimePicker;
use Dotswan\MapPicker\Fields\Map;
use Filament\Forms\Set;

class RestaurantResource extends Resource
{
    protected static ?string $model = Restaurant::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
        ->schema([
            Forms\Components\Section::make('Shop information')
                ->schema([
                    Forms\Components\Select::make('sellerId')
                        ->label('Select seller')
                        ->options(Seller::where('sellerLoginId', auth()->id())->pluck('firstName', 'id')) 
                        ->prefixIcon('heroicon-o-tag')
                        ->required(),
                    Forms\Components\Select::make('GBookingId')
                        ->label('GBookingtype')
                        ->options(TblGbooking::where(['status'=> 1, 'id'=> '2'])->pluck('BookingType', 'id')) 
                        ->prefixIcon('heroicon-o-rectangle-stack')
                        ->default('2')
                        ->reactive(),
                    Forms\Components\TextInput::make('restaurantName')
                        ->required()
                        ->maxLength(255),
                ])->columns(2),
            Forms\Components\Section::make('Shop Timing')
                ->schema([
                    Forms\Components\TimePicker::make('openTime')
                        ->label('Shop opening time')
                        ->required()
                        ->prefixIcon('heroicon-m-play'),
                    Forms\Components\TimePicker::make('closedtime')
                        ->label('Shop closed time')
                        ->required()
                        ->prefixIcon('heroicon-m-play'),
                    Forms\Components\Select::make('openingDay')
                        ->options([
                            'sunday' => 'sunday',
                            'monday' => 'monday',
                            'tuesday' => 'tuesday',
                            'wednesday' => 'wednesday',
                            'thursday' => 'thursday',
                            'friday' => 'friday',
                            'saturday' => 'saturday',
                        ])
                        ->prefixIcon('heroicon-m-calendar')
                        ->required(),
                    Forms\Components\Select::make('closingday')
                        ->label('Closing day')
                        ->options([
                            'sunday' => 'sunday',
                            'monday' => 'monday',
                            'tuesday' => 'tuesday',
                            'wednesday' => 'wednesday',
                            'thursday' => 'thursday',
                            'friday' => 'friday',
                            'saturday' => 'saturday',
                        ])
                        ->prefixIcon('heroicon-m-calendar')
                        ->required(),
                ])->columns(2),
            Forms\Components\Section::make('Shop information')
                ->schema([
                    Forms\Components\TextInput::make('Discount')
                        ->maxLength(255),
                    Forms\Components\TextInput::make('lat')
                        ->readOnly()
                        ->maxLength(255),
                    Forms\Components\TextInput::make('long')
                        ->readOnly()
                        ->maxLength(255),
                    Forms\Components\TextInput::make('address')
                        ->required(),
                    Forms\Components\FileUpload::make('imgRestaurant')
                        ->label('Restaurant Image')
                        ->required()
                        ->directory('images/restaurant')
                        ->image(),
                    Map::make('address')
                        ->label('Location')
                        ->columnSpanFull()
                        ->default([
                            'lat' => 13.650658,
                            'lng' => 102.56424
                        ])
                        ->afterStateUpdated(function (\Filament\Forms\Set $set, ?array $state): void {
                            $set('latitude', $state['lat']);
                            $set('longitude', $state['lng']);
                        })
                        ->afterStateHydrated(function ($state, $record, \Filament\Forms\Set $set): void {
                            $set('location', ['lat' => $record->lat, 'lng' => $record->long]);
                        })
                        ->extraStyles([
                            'min-height: 60v',
                            'width: 500px',
                            'border-radius: 10px'
                        ])
                        ->liveLocation()
                        ->showMarker()
                        ->markerColor("#22c55eff")
                        ->showFullscreenControl()
                        ->showZoomControl()
                        ->draggable()
                        ->tilesUrl("https://tile.openstreetmap.de/{z}/{x}/{y}.png")
                        ->zoom(15)
                        ->detectRetina()
                        ->showMyLocationButton()
                        ->extraTileControl([])
                        ->extraControl([
                            'zoomDelta'           => 1,
                            'zoomSnap'            => 2,
                        ]),
                    
                ])->columns(3),
            Forms\Components\Toggle::make('openStatus')
                ->default('1')
                ->onColor('success'),
            Forms\Components\Toggle::make('status')
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
                Tables\Columns\TextColumn::make('getsellerData.firstName')
                    ->label('Seller')
                    ->searchable(),
                Tables\Columns\TextColumn::make(ucfirst('gbookingdata.BookingType'))
                    ->label('GBooking Type')
                    ->searchable(),
                Tables\Columns\TextColumn::make('restaurantName')
                    ->searchable(),
                Tables\Columns\ImageColumn::make('imgRestaurant')
                    ->square(),
                Tables\Columns\TextColumn::make('openTime')
                    ->searchable(),
                Tables\Columns\TextColumn::make('closedtime')
                    ->searchable(),
                Tables\Columns\TextColumn::make('openingDay')
                    ->searchable(),
                Tables\Columns\TextColumn::make('closingday')
                    ->searchable(),
                Tables\Columns\TextColumn::make('openStatus')
                    ->searchable()
                    ->formatStateUsing(fn (string $state): string => $state === '1' ? 'Open' : 'Closed')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        '0' => 'danger',
                        '1' => 'success',
                    }),
                Tables\Columns\IconColumn::make('status')
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
            ->defaultSort('created_at', 'desc')
           
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
            'index' => Pages\ListRestaurants::route('/'),
            'create' => Pages\CreateRestaurant::route('/create'),
            // 'view' => Pages\ViewRestaurant::route('/{record}'),
            // 'edit' => Pages\EditRestaurant::route('/{record}/edit'),
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
