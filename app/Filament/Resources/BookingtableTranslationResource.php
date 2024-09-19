<?php

namespace App\Filament\Resources;

use App\Filament\Resources\BookingtableTranslationResource\Pages;
use App\Filament\Resources\BookingtableTranslationResource\RelationManagers;
use App\Models\BookingtableTranslation;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Tables\Columns\ImageColumn;
use App\Models\Language;
use App\Models\Bookingtable;

class BookingtableTranslationResource extends Resource
{
    protected static ?string $model = BookingtableTranslation::class;
    protected static ?string $navigationIcon = 'heroicon-o-ticket';

    protected static ?string $navigationLabel = 'Concert Table translation';
    protected static ?string $navigationGroup = 'Concert Booking';
    protected static ?string $modelLabel = 'Concert Table translations';
    protected static ?string $slug = 'concertTableTranslation';
    protected static ?int $navigationSort = 3;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('bookingtable_id')
                    ->label('ConcertTable ID')
                    ->options(Bookingtable::where('tbl_status', 1)->pluck('id', 'id')) 
                    ->prefix('concertTbl_')
                    ->searchable()
                    ->required(),
                Forms\Components\Select::make('language_id')
                    ->label('Select language')
                    ->options(Language::where('status', 1)->pluck('name', 'id')) 
                    ->prefixIcon('heroicon-o-flag')
                    ->searchable()
                    ->required(),
                Forms\Components\TextInput::make('tbl_name')
                    ->label('Name')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('tbl_title')
                    ->label('No of people')
                    ->numeric()
                    ->maxLength(255),
                Forms\Components\TextInput::make('tbl_address')
                    ->label('Address')
                    ->maxLength(255),
                Forms\Components\TextInput::make('tbl_desc')
                    ->label('description')
                    ->maxLength(255),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('Serial_number')
                    ->badge()
                    ->state(fn($column) => $column->getRowLoop()->iteration),
                Tables\Columns\ImageColumn::make('concerttableData.tbl_img')
                    ->label('Images')
                    ->square(),
                Tables\Columns\TextColumn::make('bookingtable_id')
                    ->label('ConcertTable number')
                    ->prefix('concertTbl_')
                    ->searchable(),
                Tables\Columns\TextColumn::make('languages.name')
                    ->label('Language')
                    ->searchable(),
                Tables\Columns\TextColumn::make('tbl_name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('tbl_title')
                    ->label('No of people')
                    ->searchable(),
                Tables\Columns\TextColumn::make('tbl_address')
                    ->searchable(),
                Tables\Columns\TextColumn::make('tbl_desc')
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
            ->defaultSort('bookingtable_id', 'DESC')
            ->filters([
                //
            ])
            ->actions([
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
            'index' => Pages\ListBookingtableTranslations::route('/'),
            // 'create' => Pages\CreateBookingtableTranslation::route('/create'),
            // 'edit' => Pages\EditBookingtableTranslation::route('/{record}/edit'),
        ];
    }    
}
