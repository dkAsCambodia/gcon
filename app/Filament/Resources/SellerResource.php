<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SellerResource\Pages;
use App\Filament\Resources\SellerResource\RelationManagers;
use App\Models\Seller;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\Select;
use Filament\Tables\Columns\ImageColumn;

use Filament\Resources\Pages\EditRecord;
use Filament\Resources\Pages\CreateRecord;


class SellerResource extends Resource
{
    protected static ?string $model = Seller::class;
    protected static ?string $navigationIcon = 'heroicon-o-user';
    protected static ?string $navigationGroup = 'Restaurant Management';
    protected static ?int $navigationSort = 1;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Shop information')
                    ->schema([
                        Forms\Components\TextInput::make('shopName')
                            ->required()
                            ->maxLength(255),
                        Forms\Components\Select::make('businessType')
                            ->options([
                                'Restaurant' => 'Restaurant',
                                'Shop' => 'Shop',
                            ])
                            ->prefixIcon('heroicon-m-flag')
                            ->required(),
                        Forms\Components\TextInput::make('cuisine')
                            ->required()
                            ->maxLength(255),
                    ])->columns(3),
                Forms\Components\Section::make('Seller information')
                    ->schema([
                        Forms\Components\TextInput::make('firstName')
                            ->required()
                            ->maxLength(255),
                        Forms\Components\TextInput::make('lastName')
                            ->maxLength(255),
                        Forms\Components\TextInput::make('phoneNumber')
                            ->tel()
                            ->prefixIcon('heroicon-m-phone')
                            ->required()
                            ->maxLength(12)
                            ->unique(ignorable: fn ($record) => $record)
                            ->reactive()
                            ->disabled(fn ($context) => $context === 'edit'),
                        Forms\Components\TextInput::make('email')
                            ->label('Email')
                            ->prefixIcon('heroicon-m-envelope')
                            ->required()
                            ->unique(ignorable: fn ($record) => $record)
                            ->regex('/^.+@.+$/i')
                            ->email()
                            ->reactive()
                            ->disabled(fn ($context) => $context === 'edit'),
                        Forms\Components\TextInput::make('password')
                            ->prefixIcon('heroicon-m-lock-closed')
                            ->password()
                            ->required()
                            ->formatStateUsing(function ($state) {
                                return base64_decode($state);
                            })
                            ->revealable(),
                        Forms\Components\TextInput::make('address')
                            ->required()
                            ->prefixIcon('heroicon-m-map-pin')
                            ->maxLength(255),
                        Forms\Components\TextInput::make('city')
                            ->prefixIcon('heroicon-m-map-pin')
                            ->required(),
                        Forms\Components\Select::make('country')
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
                        Forms\Components\TextInput::make('additionalAddress')
                            ->prefixIcon('heroicon-m-map-pin')
                            ->maxLength(255),
                    ])->columns(3),
                Forms\Components\Section::make('Shop information')
                    ->schema([
                        Forms\Components\Select::make('contractStatus')
                            ->options([
                                'pending' => 'pending',
                                'approved' => 'approved',
                                'rejected' => 'rejected',
                            ])
                            ->default('pending')
                            ->prefixIcon('heroicon-m-flag')
                            ->required(),
                        Forms\Components\Toggle::make('status')
                            ->default('0')
                            ->onIcon('heroicon-m-bolt')
                            ->offIcon('heroicon-m-user')
                            ->onColor('success'),
                        Forms\Components\FileUpload::make('shopImage')
                            ->label('Table Image')
                            ->required()
                            ->directory('images/restaurant/shop')
                            ->image(),
                    ])->columns(3),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('shopName')
                    ->searchable(),
                Tables\Columns\TextColumn::make('businessType')
                    ->searchable(),
                Tables\Columns\TextColumn::make('cuisine')
                    ->searchable(),
                Tables\Columns\TextColumn::make('firstName')
                    ->getStateUsing(fn ($record)=> ucfirst($record->firstName.' '.$record->lastName))
                    ->searchable(),
                Tables\Columns\TextColumn::make('phoneNumber')
                    ->searchable(),
                Tables\Columns\TextColumn::make('email')
                    ->searchable(),
                Tables\Columns\ImageColumn::make('shopImage')
                    ->square(),
                Tables\Columns\TextColumn::make('address')
                    ->searchable(),
                Tables\Columns\TextColumn::make('city')
                    ->searchable(),
                Tables\Columns\TextColumn::make('country')
                    ->searchable(),
                Tables\Columns\TextColumn::make('contractStatus')
                    ->searchable()
                    ->formatStateUsing(fn (string $state): string => ucfirst($state))
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'pending' => 'warning',
                        'approved' => 'success',
                        'rejected' => 'danger',
                    }),
                Tables\Columns\IconColumn::make('status')
                    ->boolean(),
                Tables\Columns\TextColumn::make('deleted_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
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
                Tables\Filters\TrashedFilter::make(),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                    Tables\Actions\ForceDeleteBulkAction::make(),
                    Tables\Actions\RestoreBulkAction::make(),
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
            'edit' => Pages\EditSeller::route('/{record}/edit'),
        ];
    }

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()
            ->withoutGlobalScopes([
                SoftDeletingScope::class,
            ]);
    }
}
