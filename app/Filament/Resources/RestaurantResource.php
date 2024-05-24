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

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('sellerId')
                    ->label('Select seller')
                    // ->options(Seller::pluck('firstName', 'lastName', 'id')) 
                    ->options(Seller::all()->mapWithKeys(function ($seller) {
                        return [$seller->id => ucfirst($seller->firstName) . ' ' . $seller->lastName];
                    })->toArray())
                    ->prefixIcon('heroicon-o-tag')
                    ->searchable()
                    ->required(),
                Forms\Components\Select::make('GBookingId')
                    ->label('GBookingtype')
                    ->options(TblGbooking::where('status', 1)->pluck('BookingType', 'id')) 
                    ->prefixIcon('heroicon-o-rectangle-stack')
                    ->default('2')
                    ->reactive()
                    ->disabled(true),
                Forms\Components\TextInput::make('heading')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('title')
                    ->required()
                    ->maxLength(255),
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
                Forms\Components\Textarea::make('Discount')
                    ->columnSpanFull(),
                Forms\Components\Textarea::make('lat')
                    ->required()
                    ->columnSpanFull(),
                Forms\Components\Textarea::make('long')
                    ->required()
                    ->columnSpanFull(),
                Forms\Components\Textarea::make('address')
                    ->required()
                    ->columnSpanFull(),
                Forms\Components\FileUpload::make('imgRestaurant')
                    ->label('Restaurant Image')
                    ->required()
                    ->directory('images/restaurant')
                    ->image(),
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
            ->columns([
                Tables\Columns\TextColumn::make('sellerId')
                    ->searchable(),
                Tables\Columns\TextColumn::make('GBookingId')
                    ->searchable(),
                Tables\Columns\TextColumn::make('heading')
                    ->searchable(),
                Tables\Columns\TextColumn::make('title')
                    ->searchable(),
                Tables\Columns\TextColumn::make('imgRestaurant')
                    ->searchable(),
                Tables\Columns\TextColumn::make('openTime')
                    ->searchable(),
                Tables\Columns\TextColumn::make('closedtime')
                    ->searchable(),
                Tables\Columns\TextColumn::make('openingDay')
                    ->searchable(),
                Tables\Columns\TextColumn::make('closingday')
                    ->searchable(),
                Tables\Columns\TextColumn::make('openStatus')
                    ->searchable(),
                Tables\Columns\TextColumn::make('status')
                    ->searchable(),
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
