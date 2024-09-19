<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ConcertTblTransactionResource\Pages;
use App\Filament\Resources\ConcertTblTransactionResource\RelationManagers;
use App\Models\ConcertTblTransaction;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Tables\Columns\ImageColumn;
use App\Models\TblGbooking;
use App\Models\TableCategoryTranslation;
use App\Models\BookingtableTranslation;
use App\Models\Customer;

class ConcertTblTransactionResource extends Resource
{
    protected static ?string $model = ConcertTblTransaction::class;
    protected static ?string $navigationIcon = 'heroicon-o-ticket';
    public static function getNavigationGroup(): ?string{
        return __('message.Concert Booking');
    }
    public static function getModelLabel(): string{
        return __('message.Concert Booking Transactions');
    }
    protected static ?string $slug = 'concert-booking-transactions';
    protected static ?int $navigationSort = 4;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make(__('message.Customer Information'))
                    // ->description('vbjhvb hjvmhjyv ngvjnhv')
                    ->schema([
                        Forms\Components\Select::make('user_id')
                            ->label(__('message.Username'))
                            ->options(Customer::pluck('name', 'id')) 
                            ->prefixIcon('heroicon-m-user')
                            ->default('Guest')
                            ->required(),
                        Forms\Components\Select::make('user_id')
                            ->label(__('message.UserEmail'))
                            ->options(Customer::pluck('email', 'id')) 
                            ->prefixIcon('heroicon-m-envelope')
                            ->default('guest@gmail.com')
                            ->required(),
                    ])->columns(2),
                
                Forms\Components\Section::make(__('message.Concert Table information'))
                    ->schema([
                        Forms\Components\Select::make('GBooking_id')
                            ->label(__('message.Gbooking Name'))
                            ->options(TblGbooking::where('status', 1)->pluck('BookingType', 'id')) 
                            ->prefixIcon('heroicon-o-rectangle-stack')
                            ->searchable()
                            ->required(),
                        Forms\Components\Select::make('cat_id')
                            ->label(__('message.Category name'))
                            ->options(TableCategoryTranslation::where('language_id', 1)->pluck('cat_name', 'table_category_id')) 
                            ->searchable()
                            ->prefixIcon('heroicon-o-tag')
                            ->required(),
                        Forms\Components\Select::make('tableId')
                            ->label(__('message.ConcertTable Name'))
                            ->options(BookingtableTranslation::where('language_id', 1)->pluck('tbl_name', 'bookingtable_id')) 
                            ->searchable()
                            ->prefixIcon('heroicon-o-ticket')
                            ->required(),
                    ])->columns(3),

                Forms\Components\Section::make(__('message.Transaction Information'))
                    ->schema([
                        Forms\Components\TextInput::make('transaction_id')
                            ->label(__('message.TransactionId'))
                            ->maxLength(255),
                        Forms\Components\TextInput::make('quantity')
                            ->label(__('message.Quantity'))
                            ->maxLength(255),
                        Forms\Components\TextInput::make('total_amount')
                            ->label(__('message.Total amount'))
                            ->maxLength(255),
                        Forms\Components\TextInput::make('currency')
                            ->label(__('message.Currency'))
                            ->maxLength(255),
                        Forms\Components\TextInput::make('currency_symbol')
                            ->label(__('message.Currency symbol'))
                            ->maxLength(255),
                        Forms\Components\TextInput::make('paymentType')
                            ->label(__('message.Payment type'))
                            ->maxLength(255),
                        Forms\Components\TextInput::make('concert_booking_date')
                            ->label(__('message.Concert booking date'))
                            ->maxLength(255),
                        Forms\Components\TextInput::make('concert_arrival_time')
                            ->label(__('message.Concert arrival time'))
                            ->maxLength(255),
                        Forms\Components\TextInput::make('payment_timezone')
                            ->label(__('message.Payment timezone'))
                            ->maxLength(255),
                        Forms\Components\TextInput::make('payment_time')
                            ->label(__('message.Payment time'))
                            ->maxLength(255),
                        Forms\Components\TextInput::make('gateway_name')
                            ->label(__('message.Gateway name'))
                            ->maxLength(255),
                        Forms\Components\TextInput::make('status')
                            ->label(__('message.Status')),
                        Forms\Components\Textarea::make('message')
                            ->label(__('message.Message'))
                            ->columnSpanFull(),
                        Forms\Components\Textarea::make('receipt_url')
                            ->label(__('message.Receipt URL'))
                            ->columnSpanFull(),
                        Forms\Components\Textarea::make('response_all')
                            ->label(__('message.Response all'))
                            ->columnSpanFull(),
                    ])->columns(3),

                Forms\Components\Section::make(__('message.User information'))
                    ->schema([
                        Forms\Components\TextInput::make('name')
                            ->label(__('message.Name'))
                            ->maxLength(255),
                        Forms\Components\TextInput::make('phone')
                            ->label(__('message.Phone Number'))
                            ->tel()
                            ->maxLength(255),
                        Forms\Components\TextInput::make('email')
                            ->label(__('message.Email'))
                            ->email()
                            ->maxLength(255),
                        Forms\Components\TextInput::make('address')
                            ->label(__('message.Address'))
                            ->maxLength(255),
                        Forms\Components\TextInput::make('no_of_people')
                            ->label(__('message.No of people'))
                            ->maxLength(255),
                        Forms\Components\Select::make('preferredSeats')
                            ->label(__('message.Preferred seats'))
                            ->options([
                                'Seat near the restroom' => 'Seat near the restroom',
                                'Birthday surprise' => 'Birthday surprise',
                                'Child seats' => 'Child seats',
                                'Other' => 'Other',
                            ])
                            ->prefixIcon('heroicon-m-calendar'),
                        Forms\Components\TextInput::make('future_payment_custId')
                            ->label(__('message.futurePaymentCustId'))
                            ->maxLength(255),
                    ])->columns(3),
                Forms\Components\Toggle::make('cancelStatus')
                    ->label(__('message.Cancel Booking'))
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
                Tables\Columns\TextColumn::make('Customerdata.name')
                    ->label(__('message.Username'))
                    ->searchable(),
                Tables\Columns\TextColumn::make('gbookingdata.BookingType')
                    ->label(__('message.Gbooking Name'))
                    ->searchable(),
                Tables\Columns\TextColumn::make('categories.cat_name')
                    ->label(__('message.Category name'))
                    ->searchable(),
                Tables\Columns\ImageColumn::make('bookingTable.tbl_img')
                    ->label(__('message.Table Image'))
                    ->square(),
                Tables\Columns\TextColumn::make('transaction_id')
                    ->label(__('message.TransactionId'))
                    ->searchable(),
                Tables\Columns\TextColumn::make('quantity')
                    ->label(__('message.Quantity'))
                    ->searchable(),
                Tables\Columns\TextColumn::make('total_amount')
                    ->label(__('message.Total amount'))
                    ->searchable(),
                Tables\Columns\TextColumn::make('currency')
                    ->label(__('message.Currency'))
                    ->searchable(),
                Tables\Columns\TextColumn::make('paymentType')
                    ->label(__('message.Payment type'))
                    ->searchable(),
                Tables\Columns\TextColumn::make('concert_booking_date')
                    ->label(__('message.Concert booking date'))
                    ->dateTime('d-M-Y')
                    ->searchable(),
                Tables\Columns\TextColumn::make('concert_arrival_time')
                    ->label(__('message.Concert arrival time'))
                    ->searchable(),
                Tables\Columns\TextColumn::make('status')
                    ->label(__('message.Status'))
                    ->searchable()
                    ->formatStateUsing(fn (string $state): string => ucfirst($state))
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'pending' => 'danger',
                        'success' => 'success',
                    }),
                Tables\Columns\TextColumn::make('cancelStatus')
                        ->label(__('message.Cancel Booking'))
                        ->searchable()
                        ->formatStateUsing(fn (string $state): string => $state === '0' ? '' : 'Cancelled')
                        ->badge()
                        ->color(fn (string $state): string => match ($state) {
                            '0' => 'success',
                            '1' => 'danger',
                        }),
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
            // ->defaultGroup('status')
            ->defaultSort('id', 'DESC')
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\ViewAction::make()->label(__('message.View'))->modalHeading(__('message.View')),
                Tables\Actions\EditAction::make()->label(__('message.Edit'))->modalButton(__('message.Save changes')),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    // Tables\Actions\DeleteBulkAction::make(),
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
            'index' => Pages\ListConcertTblTransactions::route('/'),
            // 'create' => Pages\CreateConcertTblTransaction::route('/create'),
            // 'edit' => Pages\EditConcertTblTransaction::route('/{record}/edit'),
        ];
    }  
    
}
