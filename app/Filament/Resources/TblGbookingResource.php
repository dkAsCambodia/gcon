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
    public static function getNavigationGroup(): ?string{
        return __('message.Booking Management');
    }
    public static function getModelLabel(): string{
        return __('message.GBooking');
    }
    protected static ?string $modelLabel = 'GBooking';
    protected static ?int $navigationSort = 0;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('recognize')
                    ->label(__('message.Recognize'))
                            ->options([
                                'GEntertainment' => 'GEntertainment',
                                'GBooking' => 'GBooking',
                                'GService' => 'GService',
                            ])
                            ->prefixIcon('heroicon-o-rectangle-stack')
                            ->required(),
                Forms\Components\TextInput::make('BookingType')
                    ->label(__('message.BookingType slug'))
                    ->rule(function ($record) {
                        return $record ? 'unique:tbl_gbookings,BookingType,' . $record->id : 'unique:tbl_gbookings,BookingType';
                    })
                    ->required()
                    ->prefix('https://')
                    ->maxLength(255),
                Forms\Components\TextInput::make('discount')
                    ->label(__('message.Discount in %'))
                    ->prefixIcon('heroicon-m-receipt-percent')
                    ->numeric(),
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
                Forms\Components\FileUpload::make('image')
                    ->label(__('message.Image'))
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
                ExportAction::make()->label(__('message.Export'))->exports([
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
                    ->label(__('message.Serial number'))
                    ->badge()
                    ->state(fn($column) => $column->getRowLoop()->iteration),
                Tables\Columns\TextColumn::make('BookingType')
                    ->label(__('message.BookingType slug'))
                    ->searchable(),
                Tables\Columns\ImageColumn::make('image')
                    ->label(__('message.Image'))
                    ->square(),
                Tables\Columns\TextColumn::make('recognize')
                    ->label(__('message.Recognize'))
                    ->searchable(),
                Tables\Columns\TextColumn::make('discount')
                    ->label(__('message.Discount in %'))
                    ->searchable(),
                Tables\Columns\IconColumn::make('status')
                    ->label(__('message.Status'))
                    ->boolean(),
                Tables\Columns\TextColumn::make('order')
                    ->label(__('message.Order'))
                    ->numeric()
                    ->sortable(),
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
                Tables\Actions\EditAction::make()->label(__('message.Edit'))->modalButton(__('message.Save changes')),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                    ExportBulkAction::make()->label(__('message.Export'))->exports([
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
