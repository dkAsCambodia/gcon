<?php

namespace App\Filament\Resources;

use App\Filament\Resources\UserResource\Pages;
use App\Filament\Resources\UserResource\RelationManagers;
use App\Models\User;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class UserResource extends Resource
{
    protected static ?string $model = User::class;
    protected static ?string $navigationIcon = 'heroicon-o-academic-cap';
    protected static ?string $navigationGroup = 'Admin Management';
    public static function getNavigationLabel(): string
    {
        return __( key: 'Admin User');
    }


    public static function form(Form $form): Form
    {
        return $form
        ->schema([

                Forms\Components\TextInput::make('name')
                    ->prefixIcon('heroicon-o-user')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('email')
                    ->prefixIcon('heroicon-m-envelope')
                    ->email()
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('phoneNumber')
                            ->tel()
                            ->prefixIcon('heroicon-m-phone')
                            ->required()
                            // ->unique(ignorable: fn ($record) => $record)
                            // ->disabled(fn ($context) => $context === 'edit')
                            // ->reactive()
                            ->maxLength(12),
                // Forms\Components\TextInput::make('email_verified_at')
                //     ->prefixIcon('heroicon-m-calendar-days'),
                Forms\Components\TextInput::make('password')
                    ->password()
                    ->revealable()
                    // ->unique(ignorable: fn ($record) => $record)
                    // ->disabled(fn ($context) => $context === 'edit')
                    // ->reactive()
                    ->prefixIcon('heroicon-m-lock-closed')
                    ->maxLength(255),
                Forms\Components\Select::make('role')
                    ->options([
                        'admin' => 'admin',
                        'seller' => 'seller',
                    ])
                    ->default('admin')
                    ->prefixIcon('heroicon-m-flag')
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
                Tables\Columns\TextColumn::make('name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('email')
                    ->searchable(),
                Tables\Columns\TextColumn::make('phoneNumber')
                    ->searchable(),
                Tables\Columns\TextColumn::make('role')
                    ->searchable()
                    ->formatStateUsing(fn (string $state): string => ucfirst($state))
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        // 'admin' => 'warning',
                        'admin' => 'success',
                        'seller' => 'danger',
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
            ->defaultSort('created_at', 'desc')
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
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
            'index' => Pages\ListUsers::route('/'),
            // 'create' => Pages\CreateUser::route('/create'),
            // 'view' => Pages\ViewUser::route('/{record}'),
            // 'edit' => Pages\EditUser::route('/{record}/edit'),
        ];
    }    
}
