<?php  

namespace App\Models;  

use Illuminate\Database\Eloquent\Model;  
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;  

class StatusPesanan extends Model  
{  
    use SoftDeletes;
    protected $fillable = [  
        'order_id',   
        'status_pesanan',   
        'tanggal_perubahan'  
    ];  

    public function order(): BelongsTo  
    {  
        return $this->belongsTo(Order::class);  
    }  
}