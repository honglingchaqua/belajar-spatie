<?php  

namespace App\Filament\Resources;  

use App\Filament\Resources\OrderItemResource\Pages;  
use App\Models\OrderItem;  
use App\Models\Produk;  
use App\Models\Divisi;  
use Filament\Forms;  
use Filament\Forms\Form;  
use Filament\Resources\Resource;  
use Filament\Tables;  
use Filament\Tables\Table;  

class OrderItemResource extends Resource  
{  
    protected static ?string $model = OrderItem::class;  

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';  

    public static function form(Form $form): Form  
    {  
        return $form  
            ->schema([  
                // Nama Lengkap  
                Forms\Components\TextInput::make('nama_lengkap')  
                    ->label('Nama Lengkap')  
                    ->required()  
                    ->maxLength(255),  

                // Pilihan Divisi dari resource Divisi  
                Forms\Components\Select::make('divisi')  
                    ->label('Divisi')  
                    ->options(Divisi::all()->pluck('nama_divisi', 'nama_divisi'))  
                    ->required()  
                    ->searchable(),  

                // Pilihan produk  
                Forms\Components\Select::make('produk_id')  
                    ->label('Produk')  
                    ->relationship('produk', 'nama_produk')  
                    ->required()  
                    ->reactive() // Jadikan reaktif untuk memperbarui stok  
                    ->afterStateUpdated(function (callable $set, $state) {  
                        $produk = Produk::find($state);  
                        $set('current_stock', $produk ? $produk->stock_produk : 'Tidak diketahui');  
                    }),  

                // Menampilkan stok produk yang dipilih  
                Forms\Components\TextInput::make('current_stock')  
                    ->label('Stok Tersedia')  
                    ->disabled()  
                    ->dehydrated(false), // Tidak perlu menyimpan ke database  

                // Kuantitas produk  
                Forms\Components\TextInput::make('quantity')  
                    ->label('Kuantitas')  
                    ->numeric()  
                    ->required()  
                    ->minValue(1)  
                    ->maxValue(function (callable $get) {  
                        $produkId = $get('produk_id');  
                        $produk = Produk::find($produkId);  
                        return $produk ? $produk->stock_produk : 0;  
                    }),  
            ]);  
    }  

    public static function table(Table $table): Table  
    {  
        return $table  
            ->columns([  
                // Nama Lengkap  
                Tables\Columns\TextColumn::make('nama_lengkap')  
                    ->label('Nama Lengkap')  
                    ->searchable(),  

                // Nama Divisi  
                Tables\Columns\TextColumn::make('divisi')  
                    ->label('Divisi')  
                    ->searchable(),  

                // Gambar produk  
                Tables\Columns\ImageColumn::make('produk.gambar')  
                    ->label('Gambar Produk')  
                    ->url(fn ($record) => $record->produk->gambar ? asset('storage/' . $record->produk->gambar) : null)  
                    ->height(50),  

                // Nama produk  
                Tables\Columns\TextColumn::make('produk.nama_produk')  
                    ->label('Nama Produk'),  

                // Kuantitas  
                Tables\Columns\TextColumn::make('quantity')  
                    ->label('Kuantitas'),  
            ])  
            ->filters([  
                // Filter berdasarkan divisi  
                Tables\Filters\SelectFilter::make('divisi')  
                    ->label('Filter Divisi')  
                    ->options(Divisi::all()->pluck('nama_divisi', 'nama_divisi'))  
            ])  
            ->actions([  
                Tables\Actions\EditAction::make(),  
            ])  
            ->bulkActions([  
                Tables\Actions\DeleteBulkAction::make(),  
            ]);  
    }  

    public static function getRelations(): array  
    {  
        return [];  
    }  

    public static function getPages(): array  
    {  
        return [  
            'index' => Pages\ListOrderItems::route('/'),  
            'create' => Pages\CreateOrderItem::route('/create'),  
            'edit' => Pages\EditOrderItem::route('/{record}/edit'),  
        ];  
    }  
}