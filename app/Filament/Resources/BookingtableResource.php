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
 
    public static function getNavigationGroup(): ?string{
        return __('message.Daily Concert Booking');
    }
    public static function getModelLabel(): string{
        return __('message.Concert Tables');
    }
    protected static ?string $slug = 'concertTable';
    protected static ?int $navigationSort = 2;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('cat_id')
                    ->label(__('message.Select Category'))
                    ->options(TableCategoryTranslation::where('language_id', 1)->pluck('cat_name', 'table_category_id')) 
                    ->prefixIcon('heroicon-o-tag')
                    ->searchable()
                    ->required(),
                Forms\Components\Select::make('GBooking_id')
                    ->label(__('message.Select Gbooking Name'))
                    ->options(TblGbooking::where('status', 1)->pluck('BookingType', 'id')) 
                    ->prefixIcon('heroicon-o-rectangle-stack')
                    ->default('1')
                    ->required(),
                Forms\Components\TextInput::make('tbl_price')
                    ->label(__('message.Price'))
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
                    ->label(__('message.Currency'))
                    ->options(Currency::where('deleted_at', NULL)->pluck('name', 'id')) 
                    ->prefixIcon('heroicon-o-rectangle-stack')
                    ->default('3')
                    ->required(),
                Forms\Components\TextInput::make('discount')
                    ->label(__('message.Discount in %'))
                    ->prefixIcon('heroicon-m-receipt-percent')
                    ->numeric(),
                Forms\Components\TextInput::make('orderby')
                    ->label(__('message.Order'))
                    ->required()
                    ->prefixIcon('heroicon-m-list-bullet')
                    ->numeric(),
                Forms\Components\FileUpload::make('tbl_img')
                    ->label(__('message.Table Image'))
                    ->required()
                    ->directory('images/concertTable')
                    ->image(),
                Forms\Components\Toggle::make('tbl_status')
                    ->label(__('message.Status'))
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
                    ->label(__('message.Serial number'))
                    ->badge()
                    ->state(fn($column) => $column->getRowLoop()->iteration),
                Tables\Columns\TextColumn::make('categories.cat_name')
                    ->label(__('message.Category name'))
                    ->searchable(),
                Tables\Columns\TextColumn::make('gbookingdata.BookingType')
                    ->label(__('message.Gbooking Name'))
                    ->searchable(),
                Tables\Columns\ImageColumn::make('tbl_img')
                    ->label(__('message.Table Image'))
                    ->square(),
                Tables\Columns\TextColumn::make('id')
                    ->label(__('message.Table number'))
                    ->getStateUsing(fn ($record)=> 'concertTbl_'.$record->id)
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('tbl_price')
                    ->label(__('message.Price'))
                    ->searchable(),
                Tables\Columns\TextColumn::make('currencydata.name')
                    ->label(__('message.Currency'))
                    ->searchable(),
                // Tables\Columns\TextColumn::make('currency_symbol')
                //     ->label('CurrencySymbol')
                //     ->searchable(),
                Tables\Columns\TextColumn::make('discount')
                    ->label(__('message.Discount in %'))
                    ->searchable(),
                Tables\Columns\TextColumn::make('orderby')
                    ->label(__('message.Order'))
                    ->numeric()
                    ->sortable(),
                Tables\Columns\IconColumn::make('tbl_status')
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
            ->defaultSort('orderby', 'DESC')
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make()->label(__('message.Edit'))->modalButton(__('message.Save changes'))
                ->mutateFormDataUsing(function (array $data): array {
                    if($data['currency'] == 'USD'){
                        $cu = '$';
                    }else{
                        $cu = '฿';
                    }
                    $data['currency_symbol'] =$cu;
                    return $data;
                })
                ->after(function ($record) {  // Runs after the edit action is successful

                    $roles = ['seller', 'admin'];
                    $users = \App\Models\User::whereIn('role', $roles)->get();
        
                    foreach ($users as $user) {
                        Notification::make()
                            ->success()
                            ->icon('heroicon-o-ticket')
                            ->title(__('message.Concert Tables Updated'))
                            ->body(__('message.Concert Tables has been updated successfully!'))
                            ->sendToDatabase($user);  // Send notification to each user
                    }
                }),
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
            'index' => Pages\ListBookingtables::route('/'),
            'create' => Pages\CreateBookingtable::route('/create'),
            // 'edit' => Pages\EditBookingtable::route('/{record}/edit'),
        ];
    }    
}
