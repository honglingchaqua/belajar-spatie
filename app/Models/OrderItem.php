<?php  

namespace App\Models;  

use Illuminate\Database\Eloquent\Model;  
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class OrderItem extends Model  
{  
    protected $fillable = [  
        'nama_lengkap',
        'divisi',
        'produk_id',   
        'quantity',  
    ];  

    public function order(): BelongsTo  
    {  
        return $this->belongsTo(Order::class);  
    }  

    public function produk(): BelongsTo  
    {  
        return $this->belongsTo(Produk::class);  
    }  

    /**
     * Event untuk mengelola stok produk.
     */
    protected static function booted()
    {
        // Saat item pesanan dibuat, kurangi stok produk
        static::creating(function (OrderItem $orderItem) {
            $produk = $orderItem->produk;

            // Validasi apakah stok mencukupi
            if ($produk->stock_produk < $orderItem->quantity) {
                throw new \Exception('Stok produk tidak mencukupi.');
            }

            // Kurangi stok produk
            $produk->stock_produk -= $orderItem->quantity;
            $produk->save();
        });

        // Saat item pesanan dihapus, kembalikan stok produk
        static::deleting(function (OrderItem $orderItem) {
            $produk = $orderItem->produk;

            // Kembalikan stok produk
            $produk->stock_produk += $orderItem->quantity;
            $produk->save();
        });
    }
}
