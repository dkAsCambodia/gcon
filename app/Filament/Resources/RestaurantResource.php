<?php

namespace App\Filament\Resources;

use App\Filament\Resources\RestaurantResource\Pages;
use App\Filament\Resources\RestaurantResource\RelationManagers;
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

class RestaurantResource extends Resource
{
    protected static ?string $model = Restaurant::class;
    protected static ?string $navigationIcon = 'heroicon-o-building-office';
    public static function getNavigationGroup(): ?string{
        return __('message.Restaurant Management');
    }
    public static function getModelLabel(): string{
        return __('message.Restaurant');
    }
    protected static ?int $navigationSort = 2;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make(__('message.Shop information'))
                    ->schema([
                        Forms\Components\Select::make('sellerId')
                            ->label(__('message.Select seller'))
                            // ->options(Seller::pluck('firstName', 'lastName', 'id')) 
                            ->options(Seller::all()->mapWithKeys(function ($seller) {
                                return [$seller->id => ucfirst($seller->firstName) . ' ' . $seller->lastName];
                            })->toArray())
                            ->prefixIcon('heroicon-o-tag')
                            ->searchable()
                            ->required(),
                        Forms\Components\Select::make('GBookingId')
                            ->label(__('message.GBooking Type'))
                            ->options(TblGbooking::where('status', 1)->pluck('BookingType', 'id')) 
                            ->prefixIcon('heroicon-o-rectangle-stack')
                            ->default('2')
                            ->reactive(),
                        Forms\Components\TextInput::make('restaurantName')
                            ->label(__('message.Restaurant Name'))
                            ->required()
                            ->rule(function ($record) {
                                return $record ? 'unique:restaurants,restaurantName,' . $record->id : 'unique:restaurants,restaurantName';
                            })
                            ->maxLength(255),
                    ])->columns(2),
                Forms\Components\Section::make(__('message.Shop Timing'))
                    ->schema([
                        Forms\Components\TimePicker::make('openTime')
                            ->label(__('message.Shop opening time'))
                            ->required()
                            ->prefixIcon('heroicon-m-play'),
                        Forms\Components\TimePicker::make('closedtime')
                            ->label(__('message.Shop closed time'))
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
                            ->maxLength(255),
                        Forms\Components\TextInput::make('lat')
                            ->label(__('message.Lat'))
                            ->maxLength(255),
                        Forms\Components\TextInput::make('long')
                            ->label(__('message.Long'))
                            ->maxLength(255),
                        Forms\Components\Textarea::make('address')
                            ->label(__('message.Address'))
                            ->required(),
                        Forms\Components\FileUpload::make('imgRestaurant')
                            ->label(__('message.Restaurant Image'))
                            ->required()
                            ->directory('images/restaurant')
                            ->image(),
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
            ->columns([
                Tables\Columns\TextColumn::make('getsellerData.firstName')
                    ->label(__('message.Seller'))
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
                Tables\Columns\TextColumn::make('deleted_at')
                    ->label(__('message.Deleted at'))
                    ->dateTime('d-M-Y')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
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
            'index' => Pages\ListRestaurants::route('/'),
            'create' => Pages\CreateRestaurant::route('/create'),
            'view' => Pages\ViewRestaurant::route('/{record}'),
            'edit' => Pages\EditRestaurant::route('/{record}/edit'),
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
