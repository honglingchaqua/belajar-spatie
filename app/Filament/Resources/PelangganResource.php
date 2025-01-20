<?php  

namespace App\Filament\Resources;  

use App\Filament\Resources\PelangganResource\Pages;  
use App\Models\User;  
use Filament\Forms;  
use Filament\Forms\Form;  
use Filament\Resources\Resource;  
use Filament\Tables;  
use Filament\Tables\Table;  
use Illuminate\Database\Eloquent\Builder;  
use Illuminate\Validation\Rules\Password;  

class PelangganResource extends Resource  
{  
    protected static ?string $model = User::class;  

    protected static ?string $navigationIcon = 'heroicon-o-users';  
    
    protected static ?string $navigationLabel = 'Pelanggan';  
    
    protected static ?string $modelLabel = 'Pelanggan';  
    
    protected static ?string $pluralModelLabel = 'Pelanggan';  

    public static function form(Form $form): Form  
    {  
        return $form  
            ->schema([  
                Forms\Components\Section::make('Informasi Pelanggan')  
                    ->schema([  
                        // Nama Pelanggan  
                        Forms\Components\TextInput::make('name')  
                            ->label('Nama Lengkap')  
                            ->required()  
                            ->maxLength(255),  

                        // Email Pelanggan  
                        Forms\Components\TextInput::make('email')  
                            ->label('Alamat Email')  
                            ->email()  
                            ->required()  
                            ->unique(table: 'users', column: 'email', ignoreRecord: true)  
                            ->maxLength(255),  

                        // Password Pelanggan  
                        Forms\Components\TextInput::make('password')  
                            ->label('Kata Sandi')  
                            ->password()  
                            ->required(fn ($record) => is_null($record))  
                            ->rule(Password::default())  
                            ->dehydrateStateUsing(fn ($state) => $state ? bcrypt($state) : null)  
                            ->visibleOn('create'),  

                        // Tambahkan field tambahan sesuai kebutuhan  
                        Forms\Components\Select::make('roles')  
                            ->label('Peran')  
                            ->multiple()  
                            ->relationship('roles', 'name')  
                            ->preload()  
                            ->searchable()  
                            ->placeholder('Pilih Peran Pelanggan'),  
                    ])->columns(2)  
            ]);  
    }  

    public static function table(Table $table): Table  
    {  
        return $table  
            ->columns([  
                // Nama Pelanggan  
                Tables\Columns\TextColumn::make('name')  
                    ->label('Nama')  
                    ->searchable()  
                    ->sortable(),  

                // Email Pelanggan  
                Tables\Columns\TextColumn::make('email')  
                    ->label('Email')  
                    ->searchable()  
                    ->sortable(),  

                // Peran Pelanggan  
                Tables\Columns\TextColumn::make('roles.name')  
                    ->label('Peran')  
                    ->badge()  
                    ->separator(','),  

                // Tanggal Bergabung  
                Tables\Columns\TextColumn::make('created_at')  
                    ->label('Bergabung Sejak')  
                    ->dateTime()  
                    ->sortable()  
                    ->toggleable(isToggledHiddenByDefault: true),  
            ])  
            ->filters([  
                // Filter berdasarkan peran  
                Tables\Filters\SelectFilter::make('roles')  
                    ->relationship('roles', 'name')  
                    ->label('Filter Peran'),  
            ])  
            ->actions([  
                Tables\Actions\EditAction::make(),  
                Tables\Actions\DeleteAction::make(),  
            ])  
            ->bulkActions([  
                Tables\Actions\BulkActionGroup::make([  
                    Tables\Actions\DeleteBulkAction::make(),  
                ]),  
            ]);  
    }  

    public static function getPages(): array  
    {  
        return [  
            'index' => Pages\ListPelanggans::route('/'),  
            'create' => Pages\CreatePelanggan::route('/create'),  
            'edit' => Pages\EditPelanggan::route('/{record}/edit'),  
        ];  
    }  

    // // Opsional: Untuk membatasi data yang ditampilkan  
    // public static function getEloquentQuery(): Builder  
    // {  
    //     return parent::getEloquentQuery()  
    //         // Contoh: Hanya tampilkan user dengan peran tertentu  
    //         // ->whereHas('roles', function ($query) {  
    //         //     $query->where('name', 'pelanggan');  
    //         // });  
    // }  
}