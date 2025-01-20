<?php

namespace App\Filament\Resources;

use App\Filament\Resources\OrderResource\Pages;
use App\Models\Order;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class OrderResource extends Resource
{
    protected static ?string $model = Order::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                // Nomor Pesanan
                Forms\Components\TextInput::make('order_number')
                    ->label('Nomor Pesanan')
                    ->disabled() // Nonaktifkan input agar otomatis
                    ->dehydrated(false), // Jangan simpan ulang
                // Tanggal Pesanan
                Forms\Components\DatePicker::make('order_date')
                    ->label('Tanggal Pesanan')
                    ->required(),
                // Pelanggan
                Forms\Components\Select::make('pelanggan_id')
                    ->label('Pelanggan')
                    ->relationship('pelanggan', 'nama') // Relasi dengan model Pelanggan
                    ->required(),
                // Status
                Forms\Components\TextInput::make('status')
                    ->label('Status')
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                // Nomor Pesanan
                Tables\Columns\TextColumn::make('order_number')
                    ->label('Nomor Pesanan')
                    ->sortable()
                    ->searchable(),
                // Tanggal Pesanan
                Tables\Columns\TextColumn::make('order_date')
                    ->label('Tanggal Pesanan')
                    ->sortable(),
                // Nama Pelanggan
                Tables\Columns\TextColumn::make('pelanggan.nama')
                    ->label('Nama Pelanggan'),
                // Status
                Tables\Columns\TextColumn::make('status')
                    ->label('Status'),
            ])
            ->filters([
                Tables\Filters\TrashedFilter::make(),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                    Tables\Actions\ForceDeleteBulkAction::make(),
                    Tables\Actions\RestoreBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListOrders::route('/'),
            'create' => Pages\CreateOrder::route('/create'),
            'edit' => Pages\EditOrder::route('/{record}/edit'),
        ];
    }
}
