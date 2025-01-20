<?php  

namespace App\Models;  

use Illuminate\Database\Eloquent\Model;  
use Illuminate\Database\Eloquent\Relations\BelongsTo;  
use Illuminate\Database\Eloquent\Relations\HasMany;  
use Illuminate\Database\Eloquent\SoftDeletes;  
use Illuminate\Support\Str;  
use Auth;  

class Order extends Model  
{  
    use SoftDeletes;  
    
    protected $fillable = [  
        'pelanggan_id',   
        'order_date',   
        'status',  
        'order_number'  
    ];  

    // Boot method untuk generate order number secara otomatis  
    protected static function booted()  
    {  
        static::creating(function ($order) {  
            // Ambil user yang sedang login  
            $order->pelanggan_id = Auth::id();  
            
            // Set tanggal order ke tanggal pembuatan  
            $order->order_date = now();  
            
            // Generate order number unik  
            $order->order_number = self::generateOrderNumber();  
            
            // Default status  
            if (empty($order->status)) {  
                $order->status = 'Pending';  
            }  
        });  
    }  

    // Method untuk generate nomor order unik  
    protected static function generateOrderNumber()  
    {  
        // Format: ORD-YYYYMMDD-RANDOMSTRING  
        $prefix = 'ORD-' . date('Ymd') . '-';  
        
        // Cari order terakhir pada hari ini  
        $lastOrder = static::whereDate('created_at', today())  
            ->orderBy('id', 'desc')  
            ->first();  
        
        // Jika belum ada order hari ini, mulai dari 0001  
        if (!$lastOrder) {  
            return $prefix . '0001';  
        }  
        
        // Ambil nomor terakhir dan increment  
        $lastNumber = substr($lastOrder->order_number, -4);  
        $newNumber = str_pad((int)$lastNumber + 1, 4, '0', STR_PAD_LEFT);  
        
        return $prefix . $newNumber;  
    }  

    public function pelanggan(): BelongsTo  
    {  
        return $this->belongsTo(User::class, 'pelanggan_id');  
    }  

    public function orderItems(): HasMany  
    {  
        return $this->hasMany(OrderItem::class);  
    }  

    public function statusPesanans(): HasMany  
    {  
        return $this->hasMany(StatusPesanan::class);  
    }  
}