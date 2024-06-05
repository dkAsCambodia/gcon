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

    protected static ?string $navigationLabel = 'Concert Booking Transactions';
    protected static ?string $navigationGroup = 'Concert Booking';
    protected static ?string $modelLabel = 'Concert Booking Transactions';
    protected static ?string $slug = 'concert-booking-transactions';
    protected static ?int $navigationSort = 4;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Customer information')
                    // ->description('vbjhvb hjvmhjyv ngvjnhv')
                    ->schema([
                        Forms\Components\Select::make('user_id')
                            ->label('Username')
                            ->options(Customer::pluck('name', 'id')) 
                            ->prefixIcon('heroicon-m-user')
                            ->default('Guest')
                            ->required(),
                        Forms\Components\Select::make('user_id')
                            ->label('UserEmail')
                            ->options(Customer::pluck('email', 'id')) 
                            ->prefixIcon('heroicon-m-envelope')
                            ->default('guest@gmail.com')
                            ->required(),
                    ])->columns(2),
                
                Forms\Components\Section::make('Concert Table information')
                    ->schema([
                        Forms\Components\Select::make('GBooking_id')
                            ->label('GBooking Name')
                            ->options(TblGbooking::where('status', 1)->pluck('BookingType', 'id')) 
                            ->prefixIcon('heroicon-o-rectangle-stack')
                            ->searchable()
                            ->required(),
                        Forms\Components\Select::make('cat_id')
                            ->label('Category Name')
                            ->options(TableCategoryTranslation::where('language_id', 1)->pluck('cat_name', 'table_category_id')) 
                            ->searchable()
                            ->prefixIcon('heroicon-o-tag')
                            ->required(),
                        Forms\Components\Select::make('tableId')
                            ->label('ConcertTable Name')
                            ->options(BookingtableTranslation::where('language_id', 1)->pluck('tbl_name', 'bookingtable_id')) 
                            ->searchable()
                            ->prefixIcon('heroicon-o-ticket')
                            ->required(),
                    ])->columns(3),

                Forms\Components\Section::make('Transaction information')
                    ->schema([
                        Forms\Components\TextInput::make('transaction_id')
                            ->maxLength(255),
                        Forms\Components\TextInput::make('quantity')
                            ->maxLength(255),
                        Forms\Components\TextInput::make('total_amount')
                            ->maxLength(255),
                        Forms\Components\TextInput::make('currency')
                            ->maxLength(255),
                        Forms\Components\TextInput::make('currency_symbol')
                            ->maxLength(255),
                        Forms\Components\TextInput::make('paymentType')
                            ->maxLength(255),
                        Forms\Components\TextInput::make('concert_booking_date')
                            ->maxLength(255),
                        Forms\Components\TextInput::make('concert_arrival_time')
                            ->maxLength(255),
                        Forms\Components\TextInput::make('payment_timezone')
                            ->maxLength(255),
                        Forms\Components\TextInput::make('payment_time')
                            ->maxLength(255),
                        Forms\Components\TextInput::make('gateway_name')
                            ->maxLength(255),
                        Forms\Components\TextInput::make('status'),
                        Forms\Components\Textarea::make('message')
                            ->columnSpanFull(),
                        Forms\Components\Textarea::make('receipt_url')
                            ->columnSpanFull(),
                        Forms\Components\Textarea::make('response_all')
                            ->columnSpanFull(),
                    ])->columns(3),

                Forms\Components\Section::make('User information')
                    ->schema([
                        Forms\Components\TextInput::make('name')
                            ->maxLength(255),
                        Forms\Components\TextInput::make('phone')
                            ->tel()
                            ->maxLength(255),
                        Forms\Components\TextInput::make('email')
                            ->email()
                            ->maxLength(255),
                        Forms\Components\TextInput::make('address')
                            ->maxLength(255),
                        Forms\Components\TextInput::make('no_of_people')
                            ->maxLength(255),
                        Forms\Components\Select::make('preferredSeats')
                            ->options([
                                'Seat near the restroom' => 'Seat near the restroom',
                                'Birthday surprise' => 'Birthday surprise',
                                'Child seats' => 'Child seats',
                                'Other' => 'Other',
                            ])
                            ->prefixIcon('heroicon-m-calendar'),
                        Forms\Components\TextInput::make('future_payment_custId')
                            ->maxLength(255),
                    ])->columns(3),
                Forms\Components\Toggle::make('cancelStatus')
                    ->label('Cancel Booking')
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
                    ->badge()
                    ->state(fn($column) => $column->getRowLoop()->iteration),
                Tables\Columns\TextColumn::make('Customerdata.name')
                    ->label('UserName')
                    ->searchable(),
                Tables\Columns\TextColumn::make('gbookingdata.BookingType')
                    ->label('GBooking Name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('categories.cat_name')
                    ->searchable(),
                Tables\Columns\ImageColumn::make('bookingTable.tbl_img')
                    ->label('Table Image')
                    ->square(),
                Tables\Columns\TextColumn::make('transaction_id')
                    ->searchable(),
                Tables\Columns\TextColumn::make('quantity')
                    ->searchable(),
                Tables\Columns\TextColumn::make('total_amount')
                    ->searchable(),
                Tables\Columns\TextColumn::make('currency')
                    ->searchable(),
                Tables\Columns\TextColumn::make('paymentType')
                    ->searchable(),
                Tables\Columns\TextColumn::make('concert_booking_date')
                    ->dateTime('d-M-Y')
                    ->searchable(),
                Tables\Columns\TextColumn::make('concert_arrival_time')
                    ->searchable(),
                Tables\Columns\TextColumn::make('status')
                    ->label('Payment Status')
                    ->searchable()
                    ->formatStateUsing(fn (string $state): string => ucfirst($state))
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'pending' => 'danger',
                        'success' => 'success',
                    }),
                Tables\Columns\TextColumn::make('cancelStatus')
                        ->searchable()
                        ->formatStateUsing(fn (string $state): string => $state === '0' ? '' : 'Cancelled')
                        ->badge()
                        ->color(fn (string $state): string => match ($state) {
                            '0' => 'success',
                            '1' => 'danger',
                        }),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            // ->defaultGroup('status')
            ->defaultSort('id', 'DESC')
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
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
