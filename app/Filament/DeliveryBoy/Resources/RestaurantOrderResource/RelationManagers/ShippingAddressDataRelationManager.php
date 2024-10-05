<?php

namespace App\Filament\DeliveryBoy\Resources\RestaurantOrderResource\RelationManagers;

use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ShippingAddressDataRelationManager extends RelationManager
{
    protected static string $relationship = 'ShippingAddressData';

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('mobile')
                    ->required()
                    ->maxLength(255),
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('mobile')
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->label(__('message.Name'))
                    ->formatStateUsing(fn ($state) => ucfirst($state)),
                Tables\Columns\TextColumn::make('mobile')
                    ->label(__('message.Phone Number')),
                Tables\Columns\TextColumn::make('address')
                    ->label(__('message.Address'))
                    ->formatStateUsing(fn ($state) => ucfirst($state)),
                Tables\Columns\TextColumn::make('city')
                    ->label(__('message.City'))
                    ->formatStateUsing(fn ($state) => ucfirst($state)),
                Tables\Columns\TextColumn::make('zip')
                    ->label(__('message.zip')),
                Tables\Columns\TextColumn::make('state')
                    ->label(__('message.State'))
                    ->formatStateUsing(fn ($state) => ucfirst($state)),
                Tables\Columns\TextColumn::make('country')
                    ->label(__('message.Country')),
                Tables\Columns\TextColumn::make('landmark')
                    ->label(__('message.landmark'))
                    ->formatStateUsing(fn ($state) => ucfirst($state)),
            ])
            ->filters([
                //
            ])
            ->headerActions([
                // Tables\Actions\CreateAction::make(),
            ])
            ->actions([
                // Tables\Actions\EditAction::make(),
                // Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                // Tables\Actions\BulkActionGroup::make([
                //     Tables\Actions\DeleteBulkAction::make(),
                // ]),
            ]);
    }
}
