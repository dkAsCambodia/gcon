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
    protected static ?string $navigationGroup = 'Booking Management';
    protected static ?int $navigationSort = 2;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                    TimePicker::make('time')
                    ->required()
                    ->seconds(false)
                    ->prefixIcon('heroicon-m-clock'),
                Forms\Components\Select::make('interval')
                    ->options([
                        'AM' => 'AM',
                        'PM' => 'PM',
                    ])
                    ->prefixIcon('heroicon-m-arrow-path-rounded-square')
                    ->required(),
                Forms\Components\TextInput::make('orderby')
                    ->prefixIcon('heroicon-m-list-bullet')
                    ->numeric(),
                Forms\Components\Toggle::make('status')
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
                Tables\Columns\TextColumn::make('time')
                    ->searchable(),
                Tables\Columns\TextColumn::make('interval')
                    ->searchable(),
                Tables\Columns\TextColumn::make('orderby')
                    ->numeric()
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
            'index' => Pages\ListTimeslots::route('/'),
            // 'create' => Pages\CreateTimeslot::route('/create'),
            // 'edit' => Pages\EditTimeslot::route('/{record}/edit'),
        ];
    }    
}
