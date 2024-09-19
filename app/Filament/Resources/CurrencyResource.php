<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CurrencyResource\Pages;
use App\Filament\Resources\CurrencyResource\RelationManagers;
use App\Models\Currency;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class CurrencyResource extends Resource
{
    protected static ?string $model = Currency::class;
    protected static ?string $navigationIcon = 'heroicon-o-currency-dollar';

    public static function getModelLabel(): string{
        return __('message.Currency');
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->label(__('message.Currency name'))
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('currency_code')
                    ->label(__('message.Currency code'))
                    ->required()
                    ->rule(function ($record) {
                        return $record ? 'unique:currencies,currency_code,' . $record->id : 'unique:currencies,currency_code';
                    })
                    ->maxLength(255),
                Forms\Components\TextInput::make('currency_symbol')
                    ->label(__('message.Currency symbol'))
                    ->required()
                    ->maxLength(255),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->label(__('message.Currency name'))
                    ->searchable(),
                Tables\Columns\TextColumn::make('currency_code')
                    ->label(__('message.Currency code'))
                    ->searchable(),
                Tables\Columns\TextColumn::make('currency_symbol')
                    ->label(__('message.Currency symbol'))
                    ->searchable(),
                Tables\Columns\TextColumn::make('deleted_at')
                    ->label(__('message.Deleted at'))
                    ->dateTime('d-M-Y')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
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
                Tables\Filters\TrashedFilter::make(),
            ])
            ->actions([
                Tables\Actions\EditAction::make()->label(__('message.Edit'))->modalButton(__('message.Save changes')),
                Tables\Actions\DeleteAction::make()->label(__('message.Delete')),
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
            'index' => Pages\ListCurrencies::route('/'),
            // 'create' => Pages\CreateCurrency::route('/create'),
            // 'edit' => Pages\EditCurrency::route('/{record}/edit'),
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
