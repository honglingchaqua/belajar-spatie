<?php  

namespace App\Models;  

use Illuminate\Database\Eloquent\Model;  
use Illuminate\Database\Eloquent\Relations\BelongsTo;  
use Illuminate\Database\Eloquent\Relations\HasMany;  
use Illuminate\Database\Eloquent\SoftDeletes;  

class Produk extends Model  
{  
    use SoftDeletes;

    protected $fillable = [  
        'category_id',   
        'nama_produk',   
        'stock_produk',   
        'gambar',   
        'deskripsi',  
    ];  

    public function category(): BelongsTo  
    {  
        return $this->belongsTo(Category::class);  
    }  

    public function orderItems(): HasMany  
    {  
        return $this->hasMany(OrderItem::class);  
    }  
}
