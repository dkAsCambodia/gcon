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
    protected static ?string $slug = 'Gcon-Member';
    
    public static function getNavigationGroup(): ?string{
        return __('message.Member Management');
    }
    public static function getModelLabel(): string{
        return __('message.Customers');
    }
    protected static ?int $navigationSort = 0;
   

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make(__('message.Customer Information'))
                    // ->description('vbjhvb hjvmhjyv ngvjnhv')
                    ->schema([
                        Forms\Components\TextInput::make( name: 'card_number')
                            ->label('G-CONId')
                            ->prefixIcon('heroicon-m-credit-card')
                            ->alphaNum()
                            ->maxLength(6)
                            ->minLength(6)
                            ->required(),
                        Forms\Components\TextInput::make('name')
                            ->label(__('message.Name'))
                            ->prefixIcon('heroicon-m-user')
                            ->required(),
                        Forms\Components\TextInput::make('email')
                            ->label(__('message.Email'))
                            ->regex('/^.+@.+$/i')
                            ->email()
                            ->rule(function ($record) {
                                return $record ? 'unique:customers,email,' . $record->id : 'unique:customers,email';
                            })
                            // ->validationMessages([
                            //     'unique' => 'The :attribute has already been registered.',
                            // ])
                            ->prefixIcon('heroicon-m-envelope')
                            ->required(),
                        Forms\Components\TextInput::make('phone')
                            ->label(__('message.Phone Number'))
                            ->tel()
                            ->prefixIcon('heroicon-m-phone')
                            ->rule(function ($record) {
                                return $record ? 'unique:customers,phone,' . $record->id : 'unique:customers,phone';
                            })
                            ->maxLength(10)
                            // ->validationMessages([
                            //     'unique' => 'The :attribute has already been registered.',
                            // ])
                            ->required(),
                        Forms\Components\Select::make('member_type')
                            ->label(__('message.Member Type'))
                            ->prefixIcon('heroicon-m-queue-list')
                            ->options(MemberType::all()->pluck('member_type_name', 'id')) 
                            // ->relationship('memberType', 'member_type_name')
                            ->searchable()
                            ->required(),
                        Forms\Components\Select::make('issue_by')
                            ->label(__('message.Approved By'))
                            ->prefixIcon('heroicon-m-users')
                            ->options(AuthorizedBye::all()->pluck('authorized_by', 'id')) 
                            ->searchable()
                            ->required(),
                    ])->columns(3),
                Forms\Components\Section::make(__('message.Address Information'))
                    ->schema([
                        Forms\Components\TextInput::make('address')
                            ->label(__('message.Address'))
                            ->prefixIcon('heroicon-m-map-pin')
                            ->maxLength(255),
                        Forms\Components\TextInput::make('city')
                            ->label(__('message.City'))
                            ->prefixIcon('heroicon-m-map-pin')
                            ->required(),
                        Forms\Components\TextInput::make('state')
                            ->label(__('message.State'))
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
                Forms\Components\Section::make(__('message.Social Information'))
                    ->schema([
                        // Forms\Components\TextInput::make('password')
                            //     ->password()
                            //     ->maxLength(255),
                        Forms\Components\TextInput::make('line_id')
                            ->label(__('message.Enter line id'))
                            ->prefix('https://')
                            // ->suffix('.com')
                            ->maxLength(255),
                        Forms\Components\TextInput::make('facebook_id')
                            ->label(__('message.Enter Facebook link'))
                            ->prefix('https://')
                            ->maxLength(255),
                        Forms\Components\TextInput::make('instagram')
                            ->label(__('message.Enter Instagram link'))
                            ->prefix('https://')
                            ->maxLength(255),
                        Forms\Components\Toggle::make('status')
                            ->label(__('message.Status'))
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
                ExportAction::make()->label(__('message.Export'))->exports([
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
                    ->label(__('message.Serial number'))
                    ->badge()
                    ->state(fn($column) => $column->getRowLoop()->iteration),
                Tables\Columns\TextColumn::make('card_number')
                    ->label('G-CONId')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('name')
                    ->label(__('message.Name'))
                    ->searchable(),
                Tables\Columns\TextColumn::make('email')
                    ->label(__('message.Email'))
                    ->searchable(),
                Tables\Columns\TextColumn::make('phone')
                    ->label(__('message.Phone Number'))
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('members.member_type_name')
                    ->label(__('message.Member Type'))
                    ->searchable(),
                Tables\Columns\TextColumn::make('assignby.authorized_by')
                    ->label(__('message.Approved By'))
                    ->searchable(),
                // Tables\Columns\TextColumn::make('address')
                //     ->searchable(),
                // Tables\Columns\TextColumn::make('city')
                //     ->searchable(),
                // Tables\Columns\TextColumn::make('state')
                //     ->searchable(),
                // Tables\Columns\TextColumn::make('country')
                //     ->searchable(),
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
                Tables\Actions\ViewAction::make()->label(__('message.View'))->modalHeading(__('message.View')),
                Tables\Actions\EditAction::make()->label(__('message.Edit'))->modalButton(__('message.Save changes')),
                Tables\Actions\DeleteAction::make()->label(__('message.Delete')),
                Tables\Actions\Action::make('Custom Action')->label(__('message.Link'))->url('https://heroicons.com/outline')->icon('heroicon-m-link')->color('success')->openUrlInNewTab(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    // ExportBulkAction::make()
                    ExportBulkAction::make()->label(__('message.Export'))->exports([
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
    
}
