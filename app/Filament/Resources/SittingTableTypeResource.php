<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SittingTableTypeResource\Pages;
use App\Filament\Resources\SittingTableTypeResource\RelationManagers;
use App\Models\SittingTableType;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

use App\Models\Currency;

class SittingTableTypeResource extends Resource
{
    protected static ?string $model = SittingTableType::class;
    protected static ?string $navigationIcon = 'heroicon-o-table-cells';
    public static function getNavigationGroup(): ?string{
        return __('message.Events & Booking Restaurant');
    }
    public static function getModelLabel(): string{
        return __('message.Sitting Table Type');
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('sitting_for')
                    ->label(__('message.Sitting for'))
                    ->options([
                        'events' => 'Events',
                        'Saikou' => 'Saikou',
                        'thaihouse' => 'Thai house',
                    ])
                    ->default('events')
                    ->prefixIcon('heroicon-m-academic-cap')
                    ->searchable()
                    ->required(),
                Forms\Components\TextInput::make('sitting_table_name')
                    ->label(__('message.Table Type'))
                    ->prefixIcon('heroicon-m-arrows-pointing-in')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('price')
                    ->label(__('message.Price'))
                    ->required()
                    ->prefix('$')
                    ->maxLength(255),
                Forms\Components\Select::make('currency_id')
                    ->label(__('message.Currency'))
                    ->options(Currency::where('deleted_at', NULL)->pluck('name', 'id')) 
                    ->prefixIcon('heroicon-o-rectangle-stack')
                    ->default('3')
                    ->required(),
                Forms\Components\TextInput::make('order')
                    ->label(__('message.Order'))
                    ->required()
                    ->prefixIcon('heroicon-m-list-bullet')
                    ->numeric(),
                Forms\Components\Toggle::make('status')
                    ->label(__('message.Status'))
                    ->default('1')
                    ->onIcon('heroicon-m-bolt')
                    ->onColor('success')
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('sitting_for')
                    ->label(__('message.Sitting for'))
                    ->searchable(),
                Tables\Columns\TextColumn::make('sitting_table_name')
                    ->label(__('message.Table Type'))
                    ->searchable(),
                Tables\Columns\TextColumn::make('price')
                    ->label(__('message.Price'))
                    ->searchable(),
                Tables\Columns\TextColumn::make('order')
                    ->label(__('message.Order'))
                    ->numeric()
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
                Tables\Actions\ViewAction::make()->label(__('message.View'))->modalHeading(__('message.View')),
                Tables\Actions\EditAction::make()->label(__('message.Edit'))->modalHeading(__('message.Edit'))->modalButton(__('message.Save changes')),
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
            'index' => Pages\ListSittingTableTypes::route('/'),
            // 'create' => Pages\CreateSittingTableType::route('/create'),
            // 'view' => Pages\ViewSittingTableType::route('/{record}'),
            // 'edit' => Pages\EditSittingTableType::route('/{record}/edit'),
        ];
    }
}
