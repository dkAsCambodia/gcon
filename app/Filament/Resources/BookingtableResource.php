<?php

namespace App\Filament\Resources;

use App\Filament\Resources\BookingtableResource\Pages;
use App\Filament\Resources\BookingtableResource\RelationManagers;
use App\Models\Bookingtable;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Tables\Columns\ImageColumn;
use App\Models\TblGbooking;
use App\Models\Currency;
use App\Models\TableCategoryTranslation;
use Filament\Notifications\Notification;

// use Filament\Forms\Components\Select as FilamentSelect;
// use Filament\Forms\Components\TextInput;
// use Filament\Forms\Components;
// use Filament\Forms\ComponentContainer;



class BookingtableResource extends Resource
{
    protected static ?string $model = Bookingtable::class;
    protected static ?string $navigationIcon = 'heroicon-o-ticket';

    protected static ?string $navigationLabel = 'Concert Table';
    protected static ?string $navigationGroup = 'Concert Booking';
    protected static ?string $modelLabel = 'Concert Tables';
    protected static ?string $slug = 'concertTable';
    protected static ?int $navigationSort = 2;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('cat_id')
                    ->label('Select Category')
                    ->options(TableCategoryTranslation::where('language_id', 1)->pluck('cat_name', 'table_category_id')) 
                    ->prefixIcon('heroicon-o-tag')
                    ->searchable()
                    ->required(),
                Forms\Components\Select::make('GBooking_id')
                    ->label('GBookingtype')
                    ->options(TblGbooking::where('status', 1)->pluck('BookingType', 'id')) 
                    ->prefixIcon('heroicon-o-rectangle-stack')
                    ->default('1')
                    ->required(),
                Forms\Components\TextInput::make('tbl_price')
                    ->required()
                    ->prefix('$')
                    ->maxLength(255),
                // Forms\Components\Select::make('currency')
                //     ->options([
                //         'USD' => 'USD - United States Dollar',
                //         'THB' => 'THB - Thai Baht',
                //     ])
                //     ->default('USD')
                //     ->prefixIcon('heroicon-o-currency-dollar')
                //     ->required(),
                Forms\Components\Select::make('currency')
                    ->label('currency')
                    ->options(Currency::where('deleted_at', NULL)->pluck('name', 'id')) 
                    ->prefixIcon('heroicon-o-rectangle-stack')
                    ->default('1')
                    ->required(),
                Forms\Components\TextInput::make('discount')
                    ->label('Discount in %')
                    ->prefixIcon('heroicon-m-receipt-percent')
                    ->numeric(),
                Forms\Components\TextInput::make('orderby')
                    ->required()
                    ->prefixIcon('heroicon-m-list-bullet')
                    ->numeric(),
                Forms\Components\FileUpload::make('tbl_img')
                    ->label('Table Image')
                    ->required()
                    ->directory('images/concertTable')
                    ->image(),
                Forms\Components\Toggle::make('tbl_status')
                    ->onIcon('heroicon-m-bolt')
                    ->offIcon('heroicon-m-bolt')
                    ->onColor('success')
                ]);
                
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('Serial_number')
                    ->badge()
                    ->state(fn($column) => $column->getRowLoop()->iteration),
                Tables\Columns\TextColumn::make('categories.cat_name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('gbookingdata.BookingType')
                    ->label('GBookingtype')
                    ->searchable(),
                Tables\Columns\ImageColumn::make('tbl_img')
                    ->label('Images')
                    ->square(),
                Tables\Columns\TextColumn::make('id')
                    ->label('Table number')
                    ->getStateUsing(fn ($record)=> 'concertTbl_'.$record->id)
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('tbl_price')
                    ->label('Price')
                    ->searchable(),
                Tables\Columns\TextColumn::make('currencydata.name')
                    ->label('Currency')
                    ->searchable(),
                // Tables\Columns\TextColumn::make('currency_symbol')
                //     ->label('CurrencySymbol')
                //     ->searchable(),
                Tables\Columns\TextColumn::make('discount')
                    ->label('Discount in %')
                    ->searchable(),
                Tables\Columns\TextColumn::make('orderby')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\IconColumn::make('tbl_status')
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
            ->defaultSort('orderby', 'DESC')
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make()
                ->mutateFormDataUsing(function (array $data): array {
                    if($data['currency'] == 'USD'){
                        $cu = '$';
                    }else{
                        $cu = '฿';
                    }
                    $data['currency_symbol'] =$cu;
                    return $data;
                })
                ->successNotification(
                    Notification::make()
                         ->success()
                         ->icon('heroicon-o-ticket')
                         ->title('Concert Tables Updated')
                         ->body('Concert Tables has been updated successfully!'),
                        //  ->sendToDatabase(auth()->user()),
                ),
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
            'index' => Pages\ListBookingtables::route('/'),
            'create' => Pages\CreateBookingtable::route('/create'),
            'edit' => Pages\EditBookingtable::route('/{record}/edit'),
        ];
    }    
}
