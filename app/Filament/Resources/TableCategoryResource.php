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
    public static function getNavigationGroup(): ?string{
        return __('message.Concert Booking');
    }
    public static function getModelLabel(): string{
        return __('message.Concert categories');
    }
    protected static ?string $slug = 'concert-category';
    protected static ?int $navigationSort = 0;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('GBooking_id')
                    ->label(__('message.Select Gbooking Name'))
                    ->options(TblGbooking::where('status', 1)->pluck('BookingType', 'id')) 
                    ->prefixIcon('heroicon-o-rectangle-stack')
                    ->searchable()
                    ->required(),
                Forms\Components\TextInput::make('order')
                    ->label(__('message.Order'))
                    ->required()
                    ->prefixIcon('heroicon-m-list-bullet')
                    ->numeric(),
                Forms\Components\Toggle::make('status')
                    ->label(__('message.Status'))
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
                    ->label(__('message.Serial number'))
                    ->badge()
                    ->state(fn($column) => $column->getRowLoop()->iteration),
                Tables\Columns\TextColumn::make('catgbookingData.BookingType')
                    ->label(__('message.Gbooking Name'))
                    ->sortable(),
                Tables\Columns\TextColumn::make('GBooking_id')
                    ->label(__('message.Category ID'))
                    ->getStateUsing(fn ($record)=> 'cat_'.$record->id)
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('order')
                    ->label(__('message.Order'))
                    ->searchable()
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
            'index' => Pages\ListTableCategories::route('/'),
            // 'create' => Pages\CreateTableCategory::route('/create'),
            // 'edit' => Pages\EditTableCategory::route('/{record}/edit'),
        ];
    }    
}
