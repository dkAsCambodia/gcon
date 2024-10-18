<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SittingLayoutResource\Pages;
use App\Filament\Resources\SittingLayoutResource\RelationManagers;
use App\Models\SittingLayout;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

use App\Models\SittingTableType;

class SittingLayoutResource extends Resource
{
    protected static ?string $model = SittingLayout::class;
    protected static ?string $navigationIcon = 'heroicon-o-table-cells';
    public static function getNavigationGroup(): ?string{
        return __('message.Events & Booking Restaurant');
    }
    public static function getModelLabel(): string{
        return __('message.Seating Layout');
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('sitting_table_type_id')
                    ->label(__('message.Table Type'))
                    ->options(
                        SittingTableType::where('status', 1)->orderBy('id','desc')
                            ->get()
                            ->mapWithKeys(function($item) {
                                return [$item->id => $item->sitting_table_name . ' for ' . ucfirst($item->sitting_for)];
                            })
                    )
                    ->prefixIcon('heroicon-o-rectangle-stack')
                    ->searchable()
                    ->required(),
                Forms\Components\TextInput::make('table_name')
                    ->label(__('message.Table Name'))
                    ->prefixIcon('heroicon-m-arrows-pointing-in')
                    ->required()
                    ->maxLength(255),
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
                Tables\Columns\TextColumn::make('Serial_number')
                    ->label(__('message.Serial number'))
                    ->badge()
                    ->state(fn($column) => $column->getRowLoop()->iteration),
                Tables\Columns\TextColumn::make('getSittingTabledata.sitting_for')
                    ->label(__('message.Sitting for'))
                    ->searchable(),
                Tables\Columns\TextColumn::make('getSittingTabledata.sitting_table_name')
                    ->label(__('message.Table Type'))
                    ->searchable(),
                Tables\Columns\TextColumn::make('table_name')
                    ->label(__('message.Table Name'))
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
            ->defaultSort('created_at', 'desc')
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
            'index' => Pages\ListSittingLayouts::route('/'),
            // 'create' => Pages\CreateSittingLayout::route('/create'),
            // 'view' => Pages\ViewSittingLayout::route('/{record}'),
            // 'edit' => Pages\EditSittingLayout::route('/{record}/edit'),
        ];
    }
}
