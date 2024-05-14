<?php

namespace App\Filament\Resources;

use App\Filament\Resources\LanguageResource\Pages;
use App\Filament\Resources\LanguageResource\RelationManagers;
use App\Models\Language;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Tables\Columns\ImageColumn;



class LanguageResource extends Resource
{
    protected static ?string $model = Language::class;
    protected static ?string $navigationIcon = 'heroicon-o-flag';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->prefixIcon('heroicon-m-arrow-long-right')
                    ->maxLength(255),
                Forms\Components\TextInput::make('code')
                    ->prefixIcon('heroicon-m-flag')
                    ->maxLength(255),
                Forms\Components\TextInput::make('order')
                    ->integer()
                    ->prefixIcon('heroicon-m-list-bullet')
                    ->required(),
                Forms\Components\Toggle::make('status')
                            ->default('0')
                            ->onIcon('heroicon-m-bolt')
                            ->onColor('success')
                    ->required(),
                Forms\Components\FileUpload::make('icon')
                        ->required()
                        ->directory('images/flages')
                        ->image(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
        // ->headerActions([
        //     ExportAction::make()
        //         ->exporter(ProductExporter::class)
        // ])
            ->columns([
                Tables\Columns\TextColumn::make('Serial_number')
                    ->badge()
                    ->state(fn($column) => $column->getRowLoop()->iteration),
                Tables\Columns\TextColumn::make('name')
                    ->searchable(),
                Tables\Columns\ImageColumn::make('icon')
                    ->circular(),
                Tables\Columns\TextColumn::make('code')
                    ->searchable(),
                Tables\Columns\TextColumn::make('order')
                    ->searchable(),
                Tables\Columns\IconColumn::make('status')
                    ->boolean(),
            ])
            ->defaultSort('order', 'ASC')
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                    // Tables\Actions\ExportBulkAction::make(),
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
            'index' => Pages\ListLanguages::route('/'),
            // 'create' => Pages\CreateLanguage::route('/create'),
            // 'edit' => Pages\EditLanguage::route('/{record}/edit'),
        ];
    }    
}
