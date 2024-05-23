<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CustomerResource\Pages;
use App\Filament\Resources\CustomerResource\RelationManagers;
use App\Models\Customer;
use App\Models\MemberType;
use App\Models\AuthorizedBye;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

use Filament\Forms\Components\Select;
use Filament\Resources\Tables\Actions\Action;
use pxlrbt\FilamentExcel\Actions\Tables\ExportBulkAction;
use pxlrbt\FilamentExcel\Actions\Tables\ExportAction;
use pxlrbt\FilamentExcel\Exports\ExcelExport;


class CustomerResource extends Resource
{
    protected static ?string $model = Customer::class;

    protected static ?string $navigationIcon = 'heroicon-o-users';
    // protected static ?string $navigationLabel = 'Customers';
    protected static ?string $navigationGroup = 'Member Management';
    protected static ?string $slug = 'Gcon-Member';
    protected static ?int $navigationSort = 0;
    // public static function getNavigationLabel(): string
    // {
    //     return __( key: 'Customers');
    // }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Customer information')
                    // ->description('vbjhvb hjvmhjyv ngvjnhv')
                    ->schema([
                        Forms\Components\TextInput::make( name: 'card_number')
                            ->label(__( key: 'G-CONId'))
                            ->prefixIcon('heroicon-m-credit-card')
                            ->alphaNum()
                            ->maxLength(6)
                            ->minLength(6)
                            ->required(),
                        Forms\Components\TextInput::make('name')
                            ->prefixIcon('heroicon-m-user')
                            ->required(),
                        Forms\Components\TextInput::make('email')
                            ->regex('/^.+@.+$/i')
                            ->email()
                            ->unique()
                            // ->validationMessages([
                            //     'unique' => 'The :attribute has already been registered.',
                            // ])
                            ->prefixIcon('heroicon-m-envelope')
                            ->required(),
                        Forms\Components\TextInput::make('phone')
                            ->tel()
                            ->prefixIcon('heroicon-m-phone')
                            ->unique()
                            ->maxLength(10)
                            // ->validationMessages([
                            //     'unique' => 'The :attribute has already been registered.',
                            // ])
                            ->required(),
                        Forms\Components\Select::make('member_type')
                            ->label('MemberType')
                            ->prefixIcon('heroicon-m-queue-list')
                            ->options(MemberType::all()->pluck('member_type_name', 'id')) 
                            // ->relationship('memberType', 'member_type_name')
                            ->searchable()
                            ->required(),
                        Forms\Components\Select::make('issue_by')
                            ->label('IssueBy')
                            ->prefixIcon('heroicon-m-users')
                            ->options(AuthorizedBye::all()->pluck('authorized_by', 'id')) 
                            ->searchable()
                            ->required(),
                    ])->columns(3),
                Forms\Components\Section::make('Address information')
                    ->schema([
                        Forms\Components\TextInput::make('address')
                            ->prefixIcon('heroicon-m-map-pin')
                            ->maxLength(255),
                        Forms\Components\TextInput::make('city')
                            ->prefixIcon('heroicon-m-map-pin')
                            ->required(),
                        Forms\Components\TextInput::make('state')
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
                    ])->columns(3),
                Forms\Components\Section::make('Social information')
                    ->schema([
                        // Forms\Components\TextInput::make('password')
                            //     ->password()
                            //     ->maxLength(255),
                        Forms\Components\TextInput::make('line_id')
                            ->prefix('https://')
                            // ->suffix('.com')
                            ->maxLength(255),
                        Forms\Components\TextInput::make('facebook_id')
                            ->prefix('https://')
                            ->maxLength(255),
                        Forms\Components\TextInput::make('instagram')
                            ->prefix('https://')
                            ->maxLength(255),
                        Forms\Components\Toggle::make('status')
                            ->default('1')
                            ->onIcon('heroicon-m-bolt')
                            ->offIcon('heroicon-m-user')
                            ->onColor('success')
                    ])->columns(3),
                
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->headerActions([
                // ExportAction::make()
                ExportAction::make()->exports([
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
                    ->badge()
                    ->state(fn($column) => $column->getRowLoop()->iteration),
                Tables\Columns\TextColumn::make('card_number')
                    ->label('G-CONId')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('email')
                    ->searchable(),
                Tables\Columns\TextColumn::make('phone')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('members.member_type_name')
                    ->label('MemberType')
                    ->searchable(),
                Tables\Columns\TextColumn::make('assignby.authorized_by')
                    ->searchable(),
                // Tables\Columns\TextColumn::make('address')
                //     ->searchable(),
                // Tables\Columns\TextColumn::make('city')
                //     ->searchable(),
                // Tables\Columns\TextColumn::make('state')
                //     ->searchable(),
                // Tables\Columns\TextColumn::make('country')
                //     ->searchable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime('d-M-Y')
                    ->sortable(),
                Tables\Columns\IconColumn::make('status')
                    ->boolean(),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime('d-M-Y')
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
                Tables\Actions\Action::make('Custom Action')->url('https://heroicons.com/outline')->icon('heroicon-m-link')->color('success')->openUrlInNewTab(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    // ExportBulkAction::make()
                    ExportBulkAction::make()->exports([
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
            'index' => Pages\ListCustomers::route('/'),
            // 'create' => Pages\CreateCustomer::route('/create'),
            // 'view' => Pages\ViewCustomer::route('/{record}'),
            // 'edit' => Pages\EditCustomer::route('/{record}/edit'),
        ];
    } 
    
    // for page
    public static function getModelLabel(): string
    {
        return __(key : 'Customer');
    }
    // for sidebar
    public static function getPluralModelLabel(): string
    {
        return __(key : 'Customers');
    }
}
