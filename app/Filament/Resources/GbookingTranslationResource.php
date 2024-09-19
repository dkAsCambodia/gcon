<?php

namespace App\Filament\Resources;

use App\Filament\Resources\GbookingTranslationResource\Pages;
use App\Filament\Resources\GbookingTranslationResource\RelationManagers;
use App\Models\GbookingTranslation;
use App\Models\TblGbooking;
use App\Models\Language;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

use Filament\Forms\Components\Select;

class GbookingTranslationResource extends Resource
{
    protected static ?string $model = GbookingTranslation::class;
    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    public static function getNavigationGroup(): ?string{
        return __('message.Booking Management');
    }
    public static function getModelLabel(): string{
        return __('message.Gbooking Translation');
    }
    
    protected static ?int $navigationSort = 1;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('tbl_gbooking_id')
                    ->label(__('message.Recognize'))
                    ->options(TblGbooking::where('status', 1)->pluck('BookingType', 'id')) 
                    ->prefixIcon('heroicon-o-rectangle-stack')
                    ->searchable()
                    ->required(),
                Forms\Components\Select::make('language_id')
                    ->label(__('message.Select language'))
                    ->options(Language::where('status', 1)->pluck('name', 'id')) 
                    ->prefixIcon('heroicon-o-flag')
                    ->searchable()
                    ->required(),
                Forms\Components\TextInput::make('GBookingname')
                    ->label(__('message.Name'))
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('title')
                    ->label(__('message.Title'))
                    ->required()
                    ->maxLength(255),
                Forms\Components\Textarea::make('desc')
                    ->label(__('message.Description'))
                    ->columnSpanFull(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('Serial_number')
                    ->label(__('message.Serial number'))
                    ->badge()
                    ->state(fn($column) => $column->getRowLoop()->iteration),
                Tables\Columns\TextColumn::make('gbookingdata.BookingType')
                    ->label(__('message.BookingType slug'))
                    ->searchable(),
                Tables\Columns\TextColumn::make('gbookingdata.recognize')
                    ->label(__('message.Recognize'))
                    ->searchable(),
                Tables\Columns\TextColumn::make('languages.name')
                    ->label(__('message.Language'))
                    ->searchable(),
                Tables\Columns\TextColumn::make('GBookingname')
                    ->label(__('message.Name'))
                    ->searchable(),
                Tables\Columns\TextColumn::make('title')
                    ->label(__('message.Title'))
                    ->searchable(),
                Tables\Columns\TextColumn::make('desc')
                    ->label(__('message.Description'))
                    ->searchable(),
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
            'index' => Pages\ListGbookingTranslations::route('/'),
            // 'create' => Pages\CreateGbookingTranslation::route('/create'),
            // 'view' => Pages\ViewGbookingTranslation::route('/{record}'),
            // 'edit' => Pages\EditGbookingTranslation::route('/{record}/edit'),
        ];
    }    
}
