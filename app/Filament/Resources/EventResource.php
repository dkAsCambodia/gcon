<?php

namespace App\Filament\Resources;

use App\Filament\Resources\EventResource\Pages;
use App\Filament\Resources\EventResource\RelationManagers;
use App\Models\Event;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

use App\Models\TblGbooking;
use Filament\Forms\Components\DatePicker;

class EventResource extends Resource
{
    protected static ?string $model = Event::class;
    protected static ?string $navigationIcon = 'heroicon-o-star';

    public static function getNavigationGroup(): ?string{
        return __('message.Events & Booking Restaurant');
    }
    public static function getModelLabel(): string{
        return __('message.Special Events');
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('GBooking_id')
                    ->label(__('message.Select Gbooking Name'))
                    ->options(TblGbooking::where('status', 1)->pluck('BookingType', 'id')) 
                    ->prefixIcon('heroicon-o-rectangle-stack')
                    ->default('1')
                    ->disabled()
                    ->required(),
                Forms\Components\DatePicker::make('event_date')
                    ->required()
                    ->label(__('message.Event date'))
                    ->prefixIcon('heroicon-m-calendar')
                    ->native(false)
                    ->displayFormat('d-m-Y'),
                Forms\Components\TextInput::make('event_address')
                    ->label(__('message.Address'))
                    ->prefixIcon('heroicon-m-map-pin')
                    ->maxLength(255),
                Forms\Components\TextInput::make('discount')
                    ->label(__('message.Discount'))
                    ->prefixIcon('heroicon-m-receipt-percent')
                    ->numeric(),
                Forms\Components\Toggle::make('status')
                    ->label(__('message.Status'))
                    ->default('1')
                    ->onIcon('heroicon-m-bolt')
                    ->onColor('success')
                    ->required(),
                Forms\Components\FileUpload::make('event_img')
                    ->label(__('message.Event Image'))
                    ->required()
                    ->directory('images/concertTable/events')
                    ->image(),
                // Forms\Components\TextInput::make('event_img_url')
                //     ->maxLength(255),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make(ucfirst('gbookingdata.BookingType'))
                    ->label(__('message.GBooking Type'))
                    ->searchable(),
                Tables\Columns\ImageColumn::make('event_img')
                    ->label(__('message.Event Image'))
                    ->square(),
                Tables\Columns\TextColumn::make('event_date')
                    ->label(__('message.Event date'))
                    ->dateTime('d-M-Y')
                    ->searchable(),
                Tables\Columns\TextColumn::make('event_address')
                    ->label(__('message.Address'))
                    ->searchable(),
                Tables\Columns\TextColumn::make('discount')
                    ->label(__('message.Discount'))
                    ->searchable(),
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
            'index' => Pages\ListEvents::route('/'),
            // 'create' => Pages\CreateEvent::route('/create'),
            // 'view' => Pages\ViewEvent::route('/{record}'),
            // 'edit' => Pages\EditEvent::route('/{record}/edit'),
        ];
    }
}
