<?php

namespace App\Filament\Resources;

use App\Filament\Resources\DivisiResource\Pages;
use App\Filament\Resources\DivisiResource\RelationManagers;
use App\Models\Divisi;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;

class DivisiResource extends Resource
{
    protected static ?string $model = Divisi::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([

                // Nama Divisi
                TextInput::make('nama_divisi')
                    ->label('Nama Divisi')
                    ->unique() // Pastikan nama divisi unik
                    ->maxLength(100)
                    ->required(),

              
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
              

                // Kolom Nama Divisi
                Tables\Columns\TextColumn::make('nama_divisi')
                    ->label('Nama Divisi')
                    ->searchable()
                    ->sortable(),

               
            ])
            ->filters([
                Tables\Filters\TrashedFilter::make(), // Filter untuk data soft-deleted
            ])
            ->actions([
                Tables\Actions\EditAction::make(), // Tombol edit untuk setiap baris
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(), // Aksi hapus massal
                    Tables\Actions\ForceDeleteBulkAction::make(), // Aksi hapus permanen massal
                    Tables\Actions\RestoreBulkAction::make(), // Aksi mengembalikan data yang dihapus
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            // Jika ada relasi, tambahkan di sini
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListDivisis::route('/'),
            'create' => Pages\CreateDivisi::route('/create'),
            'edit' => Pages\EditDivisi::route('/{record}/edit'),
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
