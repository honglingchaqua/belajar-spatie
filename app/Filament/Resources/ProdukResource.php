<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProdukResource\Pages;
use App\Filament\Resources\ProdukResource\RelationManagers;
use App\Models\Produk;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\FileUpload;

class ProdukResource extends Resource
{
    protected static ?string $model = Produk::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                // Nama Produk
                TextInput::make('nama_produk')
                    ->label('Nama Produk')
                    ->required()
                    ->maxLength(255),

                // Stock Produk
                TextInput::make('stock_produk')
                    ->label('Stok Produk')
                    ->required()
                    ->numeric()
                    ->minValue(0), // Pastikan nilai stok tidak bisa negatif

                // Category Produk (Dropdown)
                Select::make('category_id')
                    ->label('Kategori Produk')
                    ->relationship('category', 'nama_category')
                    ->required(),

                // Gambar Produk
                FileUpload::make('gambar')
                    ->label('Gambar Produk')
                    ->image()
                    ->directory('produk-images') // Menyimpan gambar di folder produk-images
                    ->nullable(),

                // Deskripsi Produk
                Textarea::make('deskripsi')
                    ->label('Deskripsi')
                    ->nullable()
                    ->maxLength(500),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                // Nama Produk
                Tables\Columns\TextColumn::make('nama_produk')
                    ->label('Nama Produk')
                    ->searchable()
                    ->sortable(),

                // Stok Produk
                Tables\Columns\TextColumn::make('stock_produk')
                    ->label('Stok Produk')
                    ->sortable(),

                // Kategori Produk
                Tables\Columns\TextColumn::make('category.nama_category')
                    ->label('Kategori')
                    ->sortable(),

                // Gambar Produk (tampilkan thumbnail gambar)
                Tables\Columns\ImageColumn::make('gambar')
                    ->label('Gambar')
                    ->url(fn (Produk $record) => $record->gambar ? asset('storage/' . $record->gambar) : null), // Menggunakan url()

                // Deskripsi Produk
                Tables\Columns\TextColumn::make('deskripsi')
                    ->label('Deskripsi')
                    ->limit(50),

                // Tanggal Pembuatan
                Tables\Columns\TextColumn::make('created_at')
                    ->label('Dibuat pada')
                    ->dateTime(),
            ])
            ->filters([
                Tables\Filters\TrashedFilter::make(), // Filter untuk data yang dihapus
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
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
            'index' => Pages\ListProduks::route('/'),
            'create' => Pages\CreateProduk::route('/create'),
            'edit' => Pages\EditProduk::route('/{record}/edit'),
        ];
    }

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()
            ->withoutGlobalScopes([SoftDeletingScope::class]);
    }
}
