<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CategoryResource\Pages;
use App\Filament\Resources\CategoryResource\RelationManagers;
use App\Models\Category;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class CategoryResource extends Resource
{
    protected static ?string $model = Category::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                // Menambahkan field untuk nama_category
                Forms\Components\TextInput::make('nama_category')
                    ->label('Nama Kategori')
                    ->required()
                    ->maxLength(255),

                // Menambahkan field untuk deskripsi
                Forms\Components\Textarea::make('deskripsi')
                    ->label('Deskripsi')
                    ->nullable()
                    ->maxLength(500),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                // Kolom untuk nama_category
                Tables\Columns\TextColumn::make('nama_category')
                    ->label('Nama Kategori')
                    ->searchable()
                    ->sortable(),

                // Kolom untuk deskripsi
                Tables\Columns\TextColumn::make('deskripsi')
                    ->label('Deskripsi')
                    ->limit(50), // Batasi panjang deskripsi yang tampil

                // Kolom untuk tanggal pembuatan
                Tables\Columns\TextColumn::make('created_at')
                    ->label('Dibuat pada')
                    ->dateTime(),
            ])
            ->filters([

                
                // Tables\Filters\SelectFilter::make('nama_category')
                // ->label('Nama Kategori') // Label untuk filter
                // ->options(function () {
                //     return \App\Models\Category::pluck('nama_category', 'id'); // Ambil data kategori dari database
                // })
                // ->placeholder('Semua Kategori'), // Placeholder untuk pilihan default (semua data) ==> menambahkan filter dengan nama category nya
            
                
                Tables\Filters\TrashedFilter::make(), // Filter untuk data yang dihapus
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
            // Jika ada relasi, Anda bisa menambahkannya di sini
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListCategories::route('/'),
            'create' => Pages\CreateCategory::route('/create'),
            'edit' => Pages\EditCategory::route('/{record}/edit'),
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
