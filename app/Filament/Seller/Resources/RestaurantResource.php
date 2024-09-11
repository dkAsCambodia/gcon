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
    protected static ?string $navigationGroup = '';
    public static function getNavigationGroup(): ?string{
        return __('message.Restaurant Management');
    }
    public static function getModelLabel(): string{
        return __('message.Restaurant');
    }
    protected static ?int $navigationSort = 1;
    protected static ?string $navigationIcon = 'heroicon-o-building-office';
    

    public static function form(Form $form): Form
    {
        return $form
        ->schema([
            Forms\Components\Section::make(__('message.Shop information'))
                ->schema([
                    Forms\Components\Select::make('sellerId')
                        ->label(__('message.Select seller'))
                        ->options(Seller::where('sellerLoginId', auth()->id())->pluck('firstName', 'id')) 
                        ->prefixIcon('heroicon-o-tag')
                        ->required(),
                    Forms\Components\Select::make('GBookingId')
                        ->label(__('message.GBooking Type'))
                        ->options(TblGbooking::where(['status'=> 1, 'id'=> '2'])->pluck('BookingType', 'id')) 
                        ->prefixIcon('heroicon-o-rectangle-stack')
                        ->default('2')
                        ->reactive(),
                    Forms\Components\TextInput::make('restaurantName')
                        ->label(__('message.Restaurant Name'))
                        ->rule(function ($record) {
                            return $record ? 'unique:restaurants,restaurantName,' . $record->id : 'unique:restaurants,restaurantName';
                        })
                        ->required()
                        ->maxLength(255),
                ])->columns(2),
            Forms\Components\Section::make(__('message.Shop Timing'))
                ->schema([
                    Forms\Components\TimePicker::make('openTime')
                        ->label(__('message.Shop opening time'))
                        ->default('08:00:00')
                        ->required()
                        ->prefixIcon('heroicon-m-play'),
                    Forms\Components\TimePicker::make('closedtime')
                        ->label(__('message.Shop closed time'))
                        ->default('23:00:00')
                        ->required()
                        ->prefixIcon('heroicon-m-play'),
                    Forms\Components\Select::make('openingDay')
                        ->label(__('message.Opening Day'))
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
                        ->label(__('message.Closing day'))
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
            Forms\Components\Section::make(__('message.Shop Address details'))
                ->schema([
                    Forms\Components\TextInput::make('Discount')
                        ->label(__('message.Discount in %'))
                        ->prefixIcon('heroicon-m-receipt-percent')
                        ->numeric(),
                    // Forms\Components\TextInput::make('lat')
                    //     ->maxLength(255),
                    // Forms\Components\TextInput::make('long')
                    //     // ->readOnly()
                    //     ->maxLength(255),
                    Forms\Components\TextInput::make('address')
                        ->label(__('message.Address'))
                        ->prefixIcon('heroicon-m-map-pin')
                        ->required(),
                    Forms\Components\FileUpload::make('imgRestaurant')
                        ->label(__('message.Restaurant Image'))
                        ->required()
                        ->directory('images/restaurant')
                        ->image(),
                    Map::make('lat')
                        ->label(__('message.Location'))
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
                            $set('location', ['lat' => $record->lat ?? '13.650658', 'lng' => $record->long ?? '102.56424']);
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
                ->label(__('message.Open Status'))
                ->default('1')
                ->onColor('success'),
            Forms\Components\Toggle::make('status')
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
                Tables\Columns\TextColumn::make('sellerId')
                    ->label(__('message.Seller'))
                    ->getStateUsing(function ($record) {
                        return $record->getsellerData->firstName . ' ' . $record->getsellerData->lastName;
                    })
                    ->searchable(),
                Tables\Columns\TextColumn::make(ucfirst('gbookingdata.BookingType'))
                    ->label(__('message.GBooking Type'))
                    ->searchable(),
                Tables\Columns\TextColumn::make('restaurantName')
                    ->label(__('message.Restaurant Name'))
                    ->searchable(),
                Tables\Columns\ImageColumn::make('imgRestaurant')
                    ->label(__('message.Restaurant Image'))
                    ->square(),
                Tables\Columns\TextColumn::make('openTime')
                    ->label(__('message.Shop opening time'))
                    ->searchable(),
                Tables\Columns\TextColumn::make('closedtime')
                    ->label(__('message.Shop closed time'))
                    ->searchable(),
                Tables\Columns\TextColumn::make('openingDay')
                    ->label(__('message.Opening Day'))
                    ->searchable(),
                Tables\Columns\TextColumn::make('closingday')
                    ->label(__('message.Closing day'))
                    ->searchable(),
                Tables\Columns\TextColumn::make('openStatus')
                    ->label(__('message.Open Status'))
                    ->searchable()
                    ->formatStateUsing(fn (string $state): string => $state === '1' ? 'Open' : 'Closed')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        '0' => 'danger',
                        '1' => 'success',
                    }),
                Tables\Columns\IconColumn::make('status')
                    ->label(__('message.Status'))
                    ->boolean(),
                Tables\Columns\TextColumn::make(__('message.deleted_at'))
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make(__('message.created_at'))
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make(__('message.updated_at'))
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->defaultSort('id', 'DESC')
            ->filters([
                Tables\Filters\TrashedFilter::make(),
            ])
            ->actions([
                Tables\Actions\ViewAction::make()
                    ->label(__('message.View'))
                    ->modalHeading(__('message.View'))
                    ->modalButton(__('message.Closedk')),
                Tables\Actions\EditAction::make()->label(__('message.Edit'))->modalButton(__('message.Save changes'))
                ->mutateFormDataUsing(function (array $data): array {
                    if($data['lat']){
                        $locationArray = $data['lat'];
                        // Create a new associative array to store the extracted values
                        $data['lat'] = $locationArray['lat'];
                        $data['long'] = $locationArray['lng'];
                    }
                    return $data;
                }),
                Tables\Actions\DeleteAction::make()->label(__('message.Delete')),
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
