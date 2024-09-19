<?php

namespace App\Filament\Resources;

use App\Filament\Resources\AuthorizedByeResource\Pages;
use App\Filament\Resources\AuthorizedByeResource\RelationManagers;
use App\Models\AuthorizedBye;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class AuthorizedByeResource extends Resource
{
    protected static ?string $model = AuthorizedBye::class;

    protected static ?string $navigationIcon = 'heroicon-o-user';
    public static function getNavigationGroup(): ?string{
        return __('message.Member Management');
    }
    public static function getModelLabel(): string{
        return __('message.Issue By');
    }
    protected static ?string $slug = 'issue-by';
    protected static ?int $navigationSort = 1;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('authorized_by')
                    ->label(__('message.Issue By'))
                    ->required()
                    ->rule(function ($record) {
                        return $record ? 'unique:authorized_byes,authorized_by,' . $record->id : 'unique:authorized_byes,authorized_by';
                    })
                    ->prefixIcon('heroicon-m-user')
                    ->maxLength(255),
                Forms\Components\Toggle::make('status')
                    ->label(__('message.Status'))
                    ->default('1')
                    ->onIcon('heroicon-m-bolt')
                    ->offIcon('heroicon-m-user')
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
                Tables\Columns\TextColumn::make('authorized_by')
                    ->label(__('message.Issue By'))
                    ->searchable(),
                Tables\Columns\IconColumn::make('status')
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
            ->defaultSort('created_at', 'desc')
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make()->label(__('message.Edit'))->modalButton(__('message.Save changes')),
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
            'index' => Pages\ListAuthorizedByes::route('/'),
            // 'create' => Pages\CreateAuthorizedBye::route('/create'),
            // 'edit' => Pages\EditAuthorizedBye::route('/{record}/edit'),
        ];
    }    
}
