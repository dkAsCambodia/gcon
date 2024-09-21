<?php

namespace App\Filament\Seller\Resources;

use App\Filament\Seller\Resources\SellerResource\Pages;
use App\Filament\Seller\Resources\SellerResource\RelationManagers;
use App\Models\Seller;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class SellerResource extends Resource
{
    protected static ?string $model = Seller::class;
    protected static ?string $navigationIcon = 'heroicon-o-user';
    public static function getModelLabel(): string{
        return __('message.View profile');
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make(__('message.Seller information'))
                    ->schema([
                        Forms\Components\TextInput::make('firstName')
                            ->label(__('message.First/Given Name'))
                            ->required()
                            ->maxLength(255),
                        Forms\Components\TextInput::make('lastName')
                            ->label(__('message.Last/ Family Name'))
                            ->maxLength(255),
                        // Forms\Components\TextInput::make('phoneNumber')
                        //     ->tel()
                        //     ->prefixIcon('heroicon-m-phone')
                        //     ->required()
                        //     ->maxLength(12)
                        //     ->unique(ignorable: fn ($record) => $record)
                        //     ->reactive()
                        //     ->disabled(fn ($context) => $context === 'edit'),
                        // Forms\Components\TextInput::make('email')
                        //     ->label('Email')
                        //     ->prefixIcon('heroicon-m-envelope')
                        //     ->required()
                        //     ->unique(ignorable: fn ($record) => $record)
                        //     ->regex('/^.+@.+$/i')
                        //     ->email()
                        //     ->reactive()
                        //     ->disabled(fn ($context) => $context === 'edit'),
                        // Forms\Components\TextInput::make('password')
                        //     ->prefixIcon('heroicon-m-lock-closed')
                        //     ->password()
                        //     ->required()
                        //     ->formatStateUsing(function ($state) {
                        //         return base64_decode($state);
                        //     })
                        //     ->revealable(),
                        Forms\Components\TextInput::make('address')
                            ->label(__('message.Address'))
                            ->required()
                            ->prefixIcon('heroicon-m-map-pin')
                            ->maxLength(255),
                        Forms\Components\TextInput::make('city')
                            ->label(__('message.City'))
                            ->prefixIcon('heroicon-m-map-pin')
                            ->required(),
                        Forms\Components\Select::make('country')
                            ->label(__('message.Country'))
                            ->options([
                                'KH' => 'Cambodia',
                                'TH' => 'Thailand',
                                'VN' => 'Vietnam',
                                'MY' => 'Malaysia',
                                'ID' => 'Indonesia',
                                'US' => 'United States',
                                'PH' => 'Philippines',
                                'IN' => 'India',
                                'CN' => 'China',
                            ])
                            ->default('KH')
                            ->prefixIcon('heroicon-m-flag')
                            ->searchable()
                            ->required(),
                    ])->columns(3),
                Forms\Components\Section::make(__('message.Shop information'))
                    ->schema([
                        
                            Forms\Components\TextInput::make('shopName')
                                ->label(__('message.Restaurant/ Shop Name'))
                                ->required()
                                ->maxLength(255),
                            Forms\Components\Select::make('businessType')
                                ->label(__('message.Business Type'))
                                ->options([
                                    'Restaurant' => 'Restaurant',
                                    'Shop' => 'Shop',
                                ])
                                ->prefixIcon('heroicon-m-flag')
                                ->required(),
                            Forms\Components\TextInput::make('cuisine')
                                ->label(__('message.Cuisine'))
                                ->required()
                                ->maxLength(255),
                       
                        
                        Forms\Components\FileUpload::make('shopImage')
                            ->label(__('message.Shop Image'))
                            ->required()
                            ->directory('images/restaurant/shop')
                            ->image(),
                    ])->columns(3),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->modifyQueryUsing(fn ($query) => $query->owner()) 
            ->columns([
                Tables\Columns\TextColumn::make('shopName')
                    ->label(__('message.Restaurant/ Shop Name'))
                    ->searchable(),
                Tables\Columns\TextColumn::make('businessType')
                    ->label(__('message.Business Type'))
                    ->searchable(),
                Tables\Columns\TextColumn::make('cuisine')
                    ->label(__('message.Cuisine'))
                    ->searchable(),
                Tables\Columns\TextColumn::make('firstName')
                    ->label(__('message.First/Given Name'))
                    ->getStateUsing(fn ($record)=> ucfirst($record->firstName.' '.$record->lastName))
                    ->searchable(),
                Tables\Columns\TextColumn::make('sellerLoginData.phoneNumber')
                    ->label(__('message.Phone Number'))
                    ->searchable(),
                Tables\Columns\TextColumn::make('sellerLoginData.email')
                    ->label(__('message.Email'))
                    ->searchable(),
                Tables\Columns\ImageColumn::make('shopImage')
                    ->label(__('message.Shop Image'))
                    ->square(),
                Tables\Columns\TextColumn::make('address')
                    ->label(__('message.Address'))
                    ->searchable(),
                Tables\Columns\TextColumn::make('city')
                    ->label(__('message.City'))
                    ->searchable(),
                Tables\Columns\TextColumn::make('country')
                    ->label(__('message.Country'))
                    ->searchable(),
                Tables\Columns\TextColumn::make('contractStatus')
                    ->label(__('message.Contract Status'))
                    ->searchable()
                    ->formatStateUsing(fn (string $state): string => ucfirst($state))
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'pending' => 'warning',
                        'approved' => 'success',
                        'rejected' => 'danger',
                    }),
                Tables\Columns\IconColumn::make('status')
                    ->label(__('message.Status'))
                    ->boolean(),
                Tables\Columns\TextColumn::make('deleted_at')
                    ->label(__('message.Deleted at'))
                    ->dateTime('d-M-Y')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
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
            'index' => Pages\ListSellers::route('/'),
            // 'create' => Pages\CreateSeller::route('/create'),
            // 'view' => Pages\ViewSeller::route('/{record}'),
            // 'edit' => Pages\EditSeller::route('/{record}/edit'),
        ];
    }
}
