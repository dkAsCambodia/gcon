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
    public static function getNavigationGroup(): ?string{
        return __('message.Daily Concert Booking');
    }
    public static function getModelLabel(): string{
        return __('message.Concert Table translations');
    }
    protected static ?string $slug = 'concertTableTranslation';
    protected static ?int $navigationSort = 3;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('bookingtable_id')
                    ->label(__('message.Select ConcertTable ID'))
                    ->options(Bookingtable::where('tbl_status', 1)->pluck('id', 'id')) 
                    ->prefix('concertTbl_')
                    ->searchable()
                    ->required(),
                Forms\Components\Select::make('language_id')
                    ->label(__('message.Select language'))
                    ->options(Language::where('status', 1)->pluck('name', 'id')) 
                    ->prefixIcon('heroicon-o-flag')
                    ->searchable()
                    ->required(),
                Forms\Components\TextInput::make('tbl_name')
                    ->label(__('message.ConcertTable Name'))
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('tbl_title')
                    ->label(__('message.No of people'))
                    ->numeric()
                    ->maxLength(255),
                Forms\Components\TextInput::make('tbl_address')
                    ->label(__('message.Enter address'))
                    ->maxLength(255),
                Forms\Components\TextInput::make('tbl_desc')
                    ->label(__('message.Description'))
                    ->maxLength(255),
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
                Tables\Columns\ImageColumn::make('concerttableData.tbl_img')
                    ->label(__('message.Table Image'))
                    ->square(),
                Tables\Columns\TextColumn::make('bookingtable_id')
                    ->label(__('message.Table number'))
                    ->prefix('concertTbl_')
                    ->searchable(),
                Tables\Columns\TextColumn::make('languages.name')
                    ->label(__('message.Language'))
                    ->searchable(),
                Tables\Columns\TextColumn::make('tbl_name')
                    ->label(__('message.ConcertTable Name'))
                    ->searchable(),
                Tables\Columns\TextColumn::make('tbl_title')
                    ->label(__('message.No of people'))
                    ->searchable(),
                Tables\Columns\TextColumn::make('tbl_address')
                    ->label(__('message.Enter address'))
                    ->searchable(),
                Tables\Columns\TextColumn::make('tbl_desc')
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
            ->defaultSort('bookingtable_id', 'DESC')
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
            'index' => Pages\ListBookingtableTranslations::route('/'),
            // 'create' => Pages\CreateBookingtableTranslation::route('/create'),
            // 'edit' => Pages\EditBookingtableTranslation::route('/{record}/edit'),
        ];
    }    
}
