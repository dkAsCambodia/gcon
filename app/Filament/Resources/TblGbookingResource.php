<?php

namespace App\Filament\Resources;

use App\Filament\Resources\TblGbookingResource\Pages;
use App\Filament\Resources\TblGbookingResource\RelationManagers;
use App\Models\TblGbooking;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

use Filament\Tables\Columns\ImageColumn;
use pxlrbt\FilamentExcel\Actions\Tables\ExportBulkAction;
use pxlrbt\FilamentExcel\Actions\Tables\ExportAction;
use pxlrbt\FilamentExcel\Exports\ExcelExport;

class TblGbookingResource extends Resource
{
    protected static ?string $model = TblGbooking::class;
    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $navigationGroup = 'Booking Management';
    protected static ?string $navigationLabel = 'GBooking';
    protected static ?string $modelLabel = 'GBooking';
    protected static ?int $navigationSort = 0;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('recognize')
                            ->options([
                                'GEntertainment' => 'GEntertainment',
                                'GBooking' => 'GBooking',
                                'GService' => 'GService',
                            ])
                            ->prefixIcon('heroicon-o-rectangle-stack')
                            ->required(),
                Forms\Components\TextInput::make('BookingType')
                    ->label('BookingType slug')
                    ->required()
                    ->prefix('https://')
                    ->maxLength(255),
                Forms\Components\TextInput::make('discount')
                    ->label('Discount in %')
                    ->prefixIcon('heroicon-m-receipt-percent')
                    ->numeric(),
                Forms\Components\TextInput::make('order')
                    ->required()
                    ->prefixIcon('heroicon-m-list-bullet')
                    ->numeric(),
                Forms\Components\Toggle::make('status')
                    ->default('0')
                    ->onIcon('heroicon-m-bolt')
                    ->onColor('success')
                    ->required(),
                Forms\Components\FileUpload::make('image')
                    ->required()
                    ->directory('images/services')
                    ->image(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->headerActions([
                // ExportAction::make()
                ExportAction::make()->exports([
                    ExcelExport::make()->fromTable()->except([
                        'Serial_number', 'updated_at',
                    ]),
                    // ExcelExport::make()->fromTable()->only([
                    //     'email', 'phone',
                    // ]),
                ])
            ])
            ->columns([
                Tables\Columns\TextColumn::make('Serial_number')
                    ->badge()
                    ->state(fn($column) => $column->getRowLoop()->iteration),
                Tables\Columns\TextColumn::make('BookingType')
                    ->label('BookingType slug')
                    ->searchable(),
                Tables\Columns\ImageColumn::make('image')
                    ->square(),
                Tables\Columns\TextColumn::make('recognize')
                    ->searchable(),
                Tables\Columns\TextColumn::make('discount')
                    ->label('Discount in %')
                    ->searchable(),
                Tables\Columns\IconColumn::make('status')
                    ->boolean(),
                Tables\Columns\TextColumn::make('order')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->defaultSort('created_at', 'desc')
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                    ExportBulkAction::make()->exports([
                        ExcelExport::make()->fromTable()->except([
                            'Serial_number', 'updated_at',
                        ]),
                        // ExcelExport::make()->fromTable()->only([
                        //     'email', 'phone',
                        // ]),
                    ])
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
            'index' => Pages\ListTblGbookings::route('/'),
            // 'create' => Pages\CreateTblGbooking::route('/create'),
            // 'view' => Pages\ViewTblGbooking::route('/{record}'),
            // 'edit' => Pages\EditTblGbooking::route('/{record}/edit'),
        ];
    }    
}
