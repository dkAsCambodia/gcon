<?php

namespace App\Filament\Resources;

use App\Filament\Resources\TableCategoryTranslationResource\Pages;
use App\Filament\Resources\TableCategoryTranslationResource\RelationManagers;
use App\Models\TableCategoryTranslation;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Models\Language;
use App\Models\TableCategory;

class TableCategoryTranslationResource extends Resource
{
    protected static ?string $model = TableCategoryTranslation::class;
    protected static ?string $navigationIcon = 'heroicon-o-tag';

    protected static ?string $navigationLabel = 'Concert Category Transalation';
    protected static ?string $navigationGroup = 'Concert Booking';
    protected static ?string $modelLabel = 'Concert categories transalations';
    protected static ?string $slug = 'concert-category-transalation';
    protected static ?int $navigationSort = 1;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('table_category_id')
                    ->label('Category ID')
                    ->options(TableCategory::where('status', 1)->pluck('id', 'id')) 
                    ->prefix('cat_')
                    ->searchable()
                    ->required(),
                Forms\Components\Select::make('language_id')
                    ->label('Select language')
                    ->options(Language::where('status', 1)->pluck('name', 'id')) 
                    ->prefixIcon('heroicon-o-flag')
                    ->searchable()
                    ->required(),
                Forms\Components\TextInput::make('cat_name')
                    ->prefixIcon('heroicon-m-arrow-long-right')
                    ->rule(function ($record) {
                        return $record ? 'unique:table_category_translations,cat_name,' . $record->id : 'unique:table_category_translations,cat_name';
                    })
                    ->required()
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
                Tables\Columns\TextColumn::make('catdata.GBooking_id')
                    ->label('Gbooking Name')
                    ->sortable(),
                
                Tables\Columns\TextColumn::make('catdata.order')
                    ->getStateUsing(fn ($record)=> 'cat_'.$record->table_category_id)
                    ->label('Category ID')
                    ->searchable(),
                Tables\Columns\TextColumn::make('languages.name')
                    ->label('Language')
                    ->searchable(),
                Tables\Columns\TextColumn::make('cat_name')
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
            'index' => Pages\ListTableCategoryTranslations::route('/'),
            // 'create' => Pages\CreateTableCategoryTranslation::route('/create'),
            // 'edit' => Pages\EditTableCategoryTranslation::route('/{record}/edit'),
        ];
    }    
}
