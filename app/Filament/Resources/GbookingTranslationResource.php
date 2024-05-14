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
    protected static ?string $navigationGroup = 'Booking Management';
    
    protected static ?int $navigationSort = 1;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('tbl_gbooking_id')
                    ->label('Recognize')
                    ->options(TblGbooking::where('status', 1)->pluck('BookingType', 'id')) 
                    ->prefixIcon('heroicon-o-rectangle-stack')
                    ->searchable()
                    ->required(),
                Forms\Components\Select::make('language_id')
                    ->label('Select language')
                    ->options(Language::where('status', 1)->pluck('name', 'id')) 
                    ->prefixIcon('heroicon-o-flag')
                    ->searchable()
                    ->required(),
                Forms\Components\TextInput::make('GBookingname')
                    ->label('Name')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('title')
                    ->required()
                    ->maxLength(255),
                Forms\Components\Textarea::make('desc')
                    ->label('Description')
                    ->columnSpanFull(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('Serial_number')
                    ->badge()
                    ->state(fn($column) => $column->getRowLoop()->iteration),
                Tables\Columns\TextColumn::make('gbookingdata.BookingType')
                    ->label('Gbooking slug')
                    ->searchable(),
                Tables\Columns\TextColumn::make('gbookingdata.recognize')
                    ->label('Recognize')
                    ->searchable(),
                Tables\Columns\TextColumn::make('languages.name')
                    ->label('Language')
                    ->searchable(),
                Tables\Columns\TextColumn::make('GBookingname')
                    ->label('Name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('title')
                    ->searchable(),
                Tables\Columns\TextColumn::make('desc')
                    ->label('Description')
                    ->searchable(),
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
                //
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
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
