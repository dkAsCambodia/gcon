<?php

namespace App\Filament\Resources;

use App\Filament\Resources\TimeslotResource\Pages;
use App\Filament\Resources\TimeslotResource\RelationManagers;
use App\Models\Timeslot;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

use Filament\Forms\Components\TimePicker;

class TimeslotResource extends Resource
{
    protected static ?string $model = Timeslot::class;
    protected static ?string $navigationIcon = 'heroicon-o-clock';
    public static function getNavigationGroup(): ?string{
        return __('message.Booking Management');
    }
    public static function getModelLabel(): string{
        return __('message.Time slot');
    }
    protected static ?int $navigationSort = 2;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                    TimePicker::make('time')
                    ->label(__('message.Time'))
                    ->required()
                    ->seconds(false)
                    ->prefixIcon('heroicon-m-clock'),
                Forms\Components\Select::make('interval')
                    ->label(__('message.Interval'))
                    ->options([
                        'AM' => 'AM',
                        'PM' => 'PM',
                    ])
                    ->prefixIcon('heroicon-m-arrow-path-rounded-square')
                    ->required(),
                Forms\Components\TextInput::make('orderby')
                    ->label(__('message.Order'))
                    ->prefixIcon('heroicon-m-list-bullet')
                    ->numeric(),
                Forms\Components\Toggle::make('status')
                    ->label(__('message.Status'))
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
                Tables\Columns\TextColumn::make('time')
                    ->label(__('message.Time'))
                    ->searchable(),
                Tables\Columns\TextColumn::make('interval')
                    ->label(__('message.Interval'))
                    ->searchable(),
                Tables\Columns\TextColumn::make('orderby')
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
            'index' => Pages\ListTimeslots::route('/'),
            // 'create' => Pages\CreateTimeslot::route('/create'),
            // 'edit' => Pages\EditTimeslot::route('/{record}/edit'),
        ];
    }    
}
