<?php

namespace App\Filament\Resources;

use App\Filament\Resources\TableCategoryResource\Pages;
use App\Filament\Resources\TableCategoryResource\RelationManagers;
use App\Models\TableCategory;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

use Filament\Forms\Components\Select;
use App\Models\TblGbooking;

class TableCategoryResource extends Resource
{
    protected static ?string $model = TableCategory::class;
    protected static ?string $navigationIcon = 'heroicon-o-tag';

    protected static ?string $navigationLabel = 'Concert Category';
    protected static ?string $navigationGroup = 'Concert Booking';
    protected static ?string $modelLabel = 'Concert categories';
    protected static ?string $slug = 'concert-category';
    protected static ?int $navigationSort = 0;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('GBooking_id')
                    ->label('Select Gbooking Name')
                    ->options(TblGbooking::where('status', 1)->pluck('BookingType', 'id')) 
                    ->prefixIcon('heroicon-o-rectangle-stack')
                    ->searchable()
                    ->required(),
                Forms\Components\TextInput::make('order')
                    ->required()
                    ->prefixIcon('heroicon-m-list-bullet')
                    ->numeric(),
                Forms\Components\Toggle::make('status')
                    ->default('0')
                    ->onIcon('heroicon-m-bolt')
                    ->onColor('success')
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('Serial_number')
                    ->badge()
                    ->state(fn($column) => $column->getRowLoop()->iteration),
                Tables\Columns\TextColumn::make('catgbookingData.BookingType')
                    ->label('Gbooking Name')
                    ->sortable(),
                Tables\Columns\TextColumn::make('GBooking_id')
                    ->label('Category ID')
                    ->getStateUsing(fn ($record)=> 'cat_'.$record->id)
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('order')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\IconColumn::make('status')
                    ->boolean(),
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
            'index' => Pages\ListTableCategories::route('/'),
            // 'create' => Pages\CreateTableCategory::route('/create'),
            // 'edit' => Pages\EditTableCategory::route('/{record}/edit'),
        ];
    }    
}
