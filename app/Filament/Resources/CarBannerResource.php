<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CarBannerResource\Pages;
use App\Filament\Resources\CarBannerResource\RelationManagers;
use App\Models\CarBanner;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

use App\Models\TblGbooking;

class CarBannerResource extends Resource
{
    protected static ?string $model = CarBanner::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    public static function getNavigationGroup(): ?string{
        return __('message.Car Wash Function');
    }
    public static function getModelLabel(): string{
        return __('message.Car Banners');
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('GBooking_id')
                    ->label(__('message.GBooking Type'))
                    ->options(TblGbooking::where('status', 1)->pluck('BookingType', 'id')) 
                    ->prefixIcon('heroicon-o-rectangle-stack')
                    ->default('5')
                    ->reactive(),
                Forms\Components\TextInput::make('title')
                    ->label(__('message.Title'))
                    ->prefixIcon('heroicon-o-arrow-right-circle')
                    ->maxLength(255),
                Forms\Components\TextInput::make('desc')
                    ->label(__('message.Description'))
                    ->prefixIcon('heroicon-o-arrow-right-circle')
                    ->maxLength(255),
                Forms\Components\TextInput::make('order')
                    ->prefixIcon('heroicon-m-chevron-double-right')
                    ->label(__('message.Order'))
                    ->numeric()
                    ->required(),
                Forms\Components\FileUpload::make('banner_img')
                    ->label(__('message.Image'))
                    ->required()
                    ->directory('images/carwash/')
                    ->image(),
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
                Tables\Columns\TextColumn::make(ucfirst('gbookingdata.BookingType'))
                    ->label(__('message.GBooking Type'))
                    ->searchable(),
                Tables\Columns\ImageColumn::make('banner_img')
                    ->label(__('message.Image'))
                    ->square(),
                Tables\Columns\TextColumn::make('title')
                    ->label(__('message.Title'))
                    ->searchable(),
                Tables\Columns\TextColumn::make('desc')
                    ->label(__('message.Description'))
                    ->searchable(),
                Tables\Columns\TextColumn::make('order')
                    ->label(__('message.Order'))
                    ->numeric()
                    ->sortable(),
                Tables\Columns\IconColumn::make('status')
                    ->label(__('message.Status'))
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
            ->filters([
                //
            ])
            ->actions([
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
            'index' => Pages\ListCarBanners::route('/'),
            // 'create' => Pages\CreateCarBanner::route('/create'),
            // 'edit' => Pages\EditCarBanner::route('/{record}/edit'),
        ];
    }
}
